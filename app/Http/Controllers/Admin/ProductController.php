<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;




class ProductController extends Controller
{

    /**
     * [index Return Paginated View of All Products Eager Load Relationship]
     * @return [view] [./resource/admin/product/index]
     */
    public function index()
    {
        $products = Product::all();
        $categorylist = Category::allLeaves()->lists('name','id');
        return view()->make('admin.product.index')->with(compact('products','categorylist'));
    }
    /**
     * [create New Product Form]
     * @return [view] [./resources/admin/product/create]
     */
    public function create()
    {
        $categorylist = Category::allLeaves()->lists('name','id');
        return view()->make('admin.product.create')->with(compact('categorylist'));
    }
    /**
     * [store a New Product]
     * @param  Request $request [Input Fields]
     * @return [redirect]           [./resources/admin/product/show]
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $product = new Product();
        $product->fill($request->all())->reSluggify();
        $this->uploadPicture($request, $product);
        $this->syncCategories($product,$request->input('categorylist'));
        return redirect()->route('admin::product@show', ['product' => $product->slug]);
    }
    /**
     * [show Individual Product]
     * @param  Product $product [slug]
     * @return [view]           [./resources/admin/product/show]
     */
    public function show(Product $product)
    {
        return view()->make('admin.product.show')->with(compact('product'));
    }
    /**
     * [edit Show Edit Form With Values of Product]
     * @param  Product $product [slug/edit]
     * @return [view]           [./resources/admin/product/edit]
     */
    public function edit(Product $product)
    {
        // $productCategories = $product->categories->lists('name','id');
        $categorylist = Category::allLeaves()->lists('name','id');
        return view()->make('admin.product.edit')->with(compact('product', 'categorylist'));
    }
    /**
     * [update Patch Request]
     * @param  Request $request [Input Fields]
     * @param  Product $product [slug]
     * @return [redirect]           [./resources/admin/product/show]
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, $this->rules1());
        $this->uploadPicture($request, $product);
        $product->update($request->all());
        $product->reSluggify()->save();
        $this->syncCategories($product,$request->input('categorylist'));
        return redirect()->route('admin::product@show', ['product' => $product->slug]);
    }
    /**
     * [destroy Product]
     * @param  Product $product [slug]
     * @return [redirect]           [./resources/admin/product/index]
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin::product@index');
    }
    /**
     * [rules Define Your Validation]
     * @return [Array] [All Rules to Be Applied on Fields]
     */
    protected function rules()
    {
        return $rules = 
        [
        'name' => 'required|max:255',
        'sku'  =>  'required|unique:products,sku|max:255',
        'price' => 'required|numeric',
        'description' => 'max:65,535',
        'caption' => 'max:255',
        'picture'   => 'image|max:3000',
        'options' => 'array'
        ];
    }
    protected function rules1()
    {
        return $rules = 
        [
        'name' => 'required|max:255',
        'sku'  =>  'required|max:255',
        'price' => 'required|numeric',
        'description' => 'max:65535',
        'caption' => 'max:255',
        'picture'   => 'image|max:3000',
        'options' => 'array'
        ];
    }
    /**
     * [Sync categories into the pivot table]
     * @param  Product $product [slug]
     * @param  [array]  $categorylist
     * @return [array] [category_product]
     * 
     */
    private function syncCategories(Product $product, $categorylist){
        if(!is_array($categorylist)){
            $categorylist = [];
        }
        $product->categories()->sync($this->processCategories($categorylist));
    }
    /**
     * [processCategories If a non numerical value is passed test if the Category exist ,if not create it and add the id to the Categories array]
     * @param  [array] $categorylist [array of categorylist in the form]
     * @return [array]               [currentCategories]
     */
    private function processCategories($categorylist){

        // extract the input into separate integer and string arrays
        $currentCategories = array_filter($categorylist, 'is_numeric');
        $newCategories = array_filter($categorylist, 'is_string');


        // Create a new Category for each string in the input and update the current Categories array
        foreach ($newCategories as $newCategory){

            //test if the current Category is not already in the currentCategories array
            if(in_array($newCategory, $currentCategories)){
                continue;
            }

            //check if the current Category exists
            $category = Category::where("name", "=", $newCategory)->first();
            //if it doesn't create it
            if(!$category){
                $category = Category::create(['name' => $newCategory]);
            }
                //add the id to the array
                $currentCategories[] = $category->id;
        }
        // return CategoryList
        return $currentCategories;
    }

    private function uploadPicture($request, $product)
    {
        $file = array_get($request->all(),'picture');
        if($file){
           // SET UPLOAD PATH
            $destinationPath = 'uploads';
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = rand(11111, 99999) . str_random(12). '.' . $extension;

            $productpic = $destinationPath.'/'.$fileName;
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $upload_success = $file->move($destinationPath, $fileName);
            $oldfile = $product->image;
            // Delete Old Image if There is
            if ($oldfile) {
                \File::delete($product->image);
            }
            $product->image = $productpic;
            $product->save();
        }
    }

}
