<ul id="slide-out" class="side-nav teal lighten-5 leftside-navigation">
	@if(!\Auth::guest())
	<li class="user-details cyan darken-2">
        <div class="row">
            <div class="col col s4 m4 l4">
                <img src="/img/avatar.png" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col col s8 m8 l8">
                <ul id="profile-dropdown" class="dropdown-content">
                    <li><a href="#">Profile</a>
                    </li>
                    <li><a href="#">Settings</a>
                    </li>
                    <li><a href="#">Help</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Logout</a>
                    </li>
                </ul>
                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn center" href="#" data-activates="profile-dropdown">{{ \Auth::user()->username }}</a><span class="right" style="position: absolute; padding-left: 125px; top: 20px;"><i class="material-icons">expand_more</i></span>
                <p class="user-role">Administrator</p>
            </div>
        </div>
    </li>
    @endif

	<li><a href="/" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">home</i>Home</a></li>
	@if(\Auth::guest())
	<li><a href="/dashboard" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">dashboard</i>Dashboard</a></li>
	@elseif(\Auth::user()->is('admin'))
	<li><a href="/admin" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">dashboard</i>Dashboard</a></li>
	@else
	<li><a href="/dashboard" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">dashboard</i>Dashboard</a></li>
	@endif
	@if(\Auth::guest()) 
	<li><a href="/products" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">store_mall_directory</i>Products</a></li>
	@elseif(\Auth::user()->is('admin'))
	<li><a href="/admin/products" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">store_mall_directory</i>Products</a></li>
	@else
	<li><a href="/products" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">store_mall_directory</i>Products</a></li>
	@endif

	<li class="no-padding ">
	  <ul class="collapsible collapsible-accordion">
	    <li>
	      <a class="collapsible-header waves-effect waves-light waves-red lighten-5 teal-text "><i class="material-icons left">loyalty</i>Categories<i class="material-icons right">keyboard_arrow_down</i></a>
	      <div class="collapsible-body">
	        <ul class="teal lighten-5 accordion">
	        @foreach($categories as $node)
			{!! renderNode($node) !!}
			@endforeach
	        </ul>
	      </div>
	    </li>
	  </ul>
	</li>
	<li><a href="/reviews" class="waves-effect waves-light waves-red lighten-5 teal-text"><i class="material-icons left">rate_review</i>Reviews</a></li>

</ul>
