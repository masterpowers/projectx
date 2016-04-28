<!-- DO NOT LAYOUT -->
@extends('layouts.material')
<!-- DO NOT LAYOUT -->

@section('header')
<a id="logo-container" href="#" class="brand-logo center fixed hide-on-small-only">
<h5>Admin Dashboard</h5>
@endsection

@section('content')

@include('partials.panel.default')

@endsection

@section('customjs')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=233675073639111";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@endsection
<!--// END CUSTOM JS //-->

<!-- ### END SCRIPT INCLUDES ### -->
