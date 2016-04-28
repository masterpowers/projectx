<div class="row">

@if($categorylist)
<div class="input-field offset-s1 col s10">
{!! Form::select('categorylist[]', $categorylist, $oldcategorylist, ['id' => 'categorylist', 'class' => '', 'multiple' => 'multiple', 'placeholder' => 'Choose Categories']) !!}

{!! Form::label('categorylist', 'Filter By Categories:', ['class' =>'font__label']) !!}
</div>
</div>
@endif

<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="pricing">
      <option value="" disabled {{ ((!$oldpriceorder) ? 'selected' : '') }}>Choose Preferred Price</option>
      <option value="desc" {{ (($oldpriceorder) == 'desc' ? 'selected' : '') }}>Expensive First</option>
      <option value="asc" {{ (($oldpriceorder) == 'asc' ? 'selected' : '') }}>Cheapest First</option>
    </select>
    <label class="font__label">Filter By Pricing:</label>
  </div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="reviewcount">
      <option value="" disabled {{ ((!$oldreviewcount) ? 'selected' : '') }}>Choose Critique</option>
      <option value="desc" {{ (($oldreviewcount) == 'desc' ? 'selected' : '') }}>Most Reviewed</option>
      <option value="asc" {{ (($oldreviewcount) == 'asc' ? 'selected' : '') }}>Least Reviewed</option>
    </select>
    <label class="font__label">Filter By Review Count:</label>
  </div>
</div>


<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="popular">
      <option value="" disabled {{ ((!$oldpopular) ? 'selected' : '') }}>Choose Popularity</option>
      <option value="desc" {{ (($oldpopular) == 'desc' ? 'selected' : '') }}>Most Visited</option>
      <option value="asc" {{ (($oldpopular) == 'asc' ? 'selected' : '') }}>Least Visited</option>
    </select>
    <label class="font__label">Filter By Popularity:</label>
  </div>
</div>

<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="starrating">
      <option value="" disabled {{ ((!$oldstarrating) ? 'selected' : '') }}>Choose Rating</option>
      <option value="5" {{ (($oldstarrating) == '5' ? 'selected' : '') }}>5 Stars</option>
      <option value="4" {{ (($oldstarrating) == '4' ? 'selected' : '') }}>4 Stars</option>
      <option value="3" {{ (($oldstarrating) == '3' ? 'selected' : '') }}>3 Stars</option>
      <option value="2" {{ (($oldstarrating) == '2' ? 'selected' : '') }}>2 Stars</option>
      <option value="1" {{ (($oldstarrating) == '1' ? 'selected' : '') }}>1 Star</option>
      <option value="0" {{ (($oldstarrating) == '0' ? 'selected' : '') }}>0 Star</option>
    </select>
    <label class="font__label">Filter By Star Rating:</label>
  </div>
</div>








