@extends('layouts.material')

@section('content')
<div class="row">
	<div class="col s12 m4 l4"><!-- Left Div Column -->
	  <div class="card">
	    <div class="card-image">
	      <img src="/img/avatar.png" class="responsive-img">
	      <span class="card-title">{{ $product->name }}</span>
	    </div>
	    <div class="star-ratings-sprite"><span style="width:{{ $product->rating_cache / 5 * 100 }}%" class="star-ratings-sprite-rating"></span>
    </div>
    <div style="padding-top: 15px; padding-left: 20px;"><span class="left" style="font-size: 12px; color: #ffc107;">Ratings: {{ $product->rating_cache }}</span><span class="right" style="font-size: 12px; padding-right: 20px; color: #ef9a9a;">Reviews: {{ $product->rating_count }}</span></div>
    <div class="card-content">
      <p>{{ $product->caption }}</p>
    </div>
	    <div class="card-action">
	  <span class="green-text text-lighten-2 left">₱{{ $product->price }}</span> 
      <a href="#addProduct{{ $product->id }}" class="modal-trigger modal-pagination"><i class="material-icons right red-text text-lighten-3">add_shopping_cart</i></a>
	    </div>
	  </div>
	</div><!-- End of Left Div Column -->
<div class="col s12 m8 l8"><!-- Right Div Column -->
	
<div class="row">
		<ul class="collapsible" data-collapsible="expandable">

		    <li>
		      <div class="collapsible-header active"><i class="material-icons">list</i>Detailed Description</div>
		      <div class="collapsible-body"><p>{{ $product->description }}</p></div>
		    </li>
		    @if(!empty($product->options))
		    @foreach ($product->options as $key => $value)
		    <li>
		      <div class="collapsible-header"><i class="material-icons">radio_button_checked</i>{{ $key }}</div>
		      <div class="collapsible-body">
		      <ul class="collection">
		      @if(is_array($product->options[$key]))
		      @foreach ($product->options[$key] as $item)
		      	<li class="collection-item">{{ $item }}</li>
		      @endforeach
		      @else
		      <li class="collection-item">{{ $value }}</li>
		      @endif
		      </ul>
		      </div>
		    </li>
		    @endforeach
		    @endif
		</ul>
</div>
</div><!-- END of Right Div Col -->

</div>
<div class="divider"></div>
<div class="row section container">
    <h5>Rate this Product:</h5>
    
</div>

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
  <div class="modal-footer row">
      <a href="#!" onclick="addProduct({{ $product->id }});" class="col s6 pull-m1 m5 pull-l1 l5 teal lighten-3 btn-large modal-action modal-close waves-effect waves-light btn-flat">Add To Cart</a>
      <a href="#!" class="col s6 push-m1 m5 push-l1 l5 left red lighten-2 btn-large modal-action modal-close waves-effect waves-light btn-flat">Close</a>
  </div>
</div> 
<!-- END Add To Cart Modal -->


@endsection