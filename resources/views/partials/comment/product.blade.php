{!! Form::model($product, ['route' => ['user::review@store',$product->slug], 'method' => 'POST', 'class' => '', 'id' => 'rateproduct']) !!}
<div class="row">
<h6 class="teal-text text-lighten-2">Rate this Product:</h6>
@if($errors->has('rating'))
<p class="red-text text-darken-4">{{ $errors->first('rating') }}</p>
@endif
<div id="star-rating" style="color: #FFD700;">

</div>
</div>
<!-- ADD COMMENT -->
<!-- Validated if StarRating is filled the Comment is Filled -->
<div class="row">
  
    <div class="row">
      <div class="input-field col s12">
      @if($errors->has('comment'))
      <p class="red-text text-darken-4">{{ $errors->first('comment') }}</p>
      @endif
        <textarea id="textarea1" class="materialize-textarea validate" required name="comment">
      </textarea>
        <label for="textarea1">Leave a Comment</label>
      </div>
      <button class="btn waves-effect waves-light right" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>
    </div>
  
</div>
{!! Form::close() !!}
<!-- SUBMITTED COMMENT -->
<!-- Add here an IF CHECK if there is a Review if None Show No Comment Yet -->
@if($product->reviews->count())
@foreach ($product->reviews as $review)
  

<ul class="collection">
    <li class="collection-item avatar">
    <!-- Use Here Laravolt if no Avatar -->
      <img src="/img/avatar.png" alt="" class="circle"> 
    <!-- If has Profile Pic Show it -->

      <p class="teal-text text-lighten-2" style="font-size: 18px">{{ $review->user->username }}</p>
      <!-- Show the Rate of the User How Many Star -->
      <div class="star-ratings-sprite"><span style="width:{{ $review->rating / 5 * 100 }}%" class="star-ratings-sprite-rating"></span>
      </div>
      <!-- End Show Rate of User On Product -->
      <div class="divider" style="margin-top: 20px;"></div>
      <!-- User Comment Section -->
      <div class="section">
      <p>
      {{ $review->comment }}
      </p>
      </div>
      <!-- End User Comment Section -->
    </li>
    <!-- Add here Pagination of all Comments-->
  </ul>
  @endforeach
@else
<h4 class="amber-text text-darken-2 center">Be the First to Rate this Product!</h4>
@endif

@section('customjs')
<script>
$(document).ready(function(){


      $('#star-rating').addRating({icon: 'star', fieldId : 'product_rating', fieldName: 'rating', max : 5, half: true});
      $('#star-rating').on('mouseover', function() {
        $(this).css('cursor','pointer');  
      });


    
    
  });
</script>
@endsection