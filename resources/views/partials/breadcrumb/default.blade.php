@if ($breadcrumbs)
<nav class="blue lighten-5 hide-on-small-only">
    <div class="nav-wrapper">
    
      <div class="col s12" id="breadcrumb">
      @foreach ($breadcrumbs as $breadcrumb)
      @if (!$breadcrumb->last)
       <a href="{{ $breadcrumb->url }}" class="breadcrumb teal-text">{{ $breadcrumb->title }}</a>
      @else
      <a class="active breadcrumb red-text text-lighten-3">{{ $breadcrumb->title }}</a>
      @endif

      @endforeach
      </div>
    
    </div>
</nav>
@endif