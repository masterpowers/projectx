@if($product)
<!-- Start Card -->
<div class="card">
    <!-- Card Image -->
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="/img/avatar.png">
    </div>
    <br>
    <!-- Products Rating Cache -->
    <div class="star-ratings-sprite"><span style="width:{{ $product->rating_cache / 5 * 100 }}%" class="star-ratings-sprite-rating"></span>
    </div>
    <div style="padding-top: 15px; padding-left: 20px;"><span class="left" style="font-size: 12px; color: #ffc107;">Ratings: {{ $product->rating_cache }}</span><span class="right" style="font-size: 12px; padding-right: 20px; color: #ef9a9a;">Reviews: {{ $product->rating_count }}</span></div>
    <!-- Card Content -->
    <div class="card-content">
      <span class="card-title  teal-text text-lighten-2 truncate">{{ $product->name }}</span>
      <a href="/products/{{ $product->slug }}"><i class="material-icons right indigo-text text-lighten-3">search</i></a>
      <a href="#addProduct{{ $product->id }}" class="modal-trigger modal-pagination"><i class="material-icons right red-text text-lighten-3">add_shopping_cart</i></a>
      <p class="green-text text-lighten-2">₱{{ $product->price }}</p>
    </div>
    <!-- Card Reveal -->
    <div class="card-reveal">
      <span class="card-title teal-text text-lighten-2">{{ $product->name }}<i class="material-icons right red-text text-lighten-2">close</i></span>
      <p>{{ $product->caption }}</p>
    </div>
</div> 
<!-- End Card Div -->
<!-- Add To Cart Modal -->
<div id="addProduct{{ $product->id }}" class="modal">
  <div class="modal-content">


    <blockquote class="center">
      <h5>Add to Cart?</h5>
    </blockquote>
      <div class="row">
        <div class ="col s6 offset-s3">
         <form action="addProduct" method="POST" id="form{{ $product->id }}">
         <input type="hidden" name="product_id" value="{{ $product->id }}"/>
         <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
         <input id="qty{{ $product->id }}" class="qtype" name="qty" type="text" value="1">
         <label for="qty{{ $product->id }}">No. Of {{ $product->name }}</label>
        </form>
        </div>
      </div>
  </div>
  <div class="modal-footer">
      <a href="#!" onclick="addProduct({{ $product->id }});" class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat">Add To Cart</a>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
  </div>
</div> 
<!-- END Add To Cart Modal -->
@endif
