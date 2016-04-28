<nav id="navsearch" style="background-color: white; display: none;">
    <div class="search-wrapper white">
       <form action="searchProduct" method="POST" id="search_form">
		{!! csrf_field() !!}
	        <div class="input-field overflow">
	          <input id="q" name="q" type="search" required style="color:#e57373; height: 50px;" placeholder="Search Product"
              >
	          <label for="search"><i class="material-icons" style="color:#9fa8da;">search</i></label>
	          <i class="material-icons" style="color:#e57373;">close</i>
	        </div>
		</form>
    </div>
</nav>
