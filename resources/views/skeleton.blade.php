<!-- DO NOT LAYOUT -->
@extends('layouts.material')
<!-- DO NOT LAYOUT -->

<!-- ### START HEAD INCLUDES ### -->

<!--// START META //-->
@section('meta')
<!-- Default charset,http-equiv,viewport and csrf-token -->
<!-- OPTIONAL or ADD Additional Default META as Neccessary -->
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END META //-->

<!--// START SEO //-->
@section('seo')
<!-- CONFIG @ config/seotools.php -->
<!-- Declare In Your Controller to Automatically Return in a View -->
<!-- Default Uses SEO::generate() = All SEO Meta -->
<!-- OPTIONAL -->
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END SEO //-->

<!--// START FAVICON //-->
@section('favicon')
<!-- Generate Favicon and Upload to Public Folder -->
<!-- Default is Laravel ICON -->
<!-- Upload Favicon @ http://www.favicon-generator.org/ -->
<!-- Generate icons for Web, Android, Microsoft, and iOS -->
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END FAVICON //-->

<!--// START FONT //-->
@section('font')
<!-- Upload Your Font at public/font then Declare Your Custom Font Here! -->
<!-- Default is Google Font Material Icons -->
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END FONT //-->

<!--// START CSS //-->
@section('css')
<!-- Default Uses MaterializeCSS CDN -->
<!-- CSS Gulp Task = uncss , critical , inlinecss -->
{{-- {!! view()->make('partials.version.uncss') !!} --}}
{{-- {!! view()->make('partials.version.allcss') !!} --}}
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END CSS //-->

<!--// START CRITICAL //-->
@section('critical')
<!-- Above Fold Content -->
<!--Gulp Critical ./storage/views -->
<!-- If you dont want to use that , then Manually Declare it Here! -->
<!-- Check Your Critical CSS @ https://jonassebastianohlsson.com/criticalpathcssgenerator/ -->
<!-- OR CONFIGURE GULP CRITICAL TO PRODUCE THE CRITICAL in a FILE -->
<!-- Default is Material ICON and Fonts -->
<!-- Override this by Using <style></style> tag Here and Add Critical CSS -->
<!-- CAN BE REMOVED and USE THE DEFAULT VALUE -->
@endsection
<!--// END CRITICAL //-->

<!-- ### END HEAD INCLUDES ### -->


<!-- ### START NAVBAR INCLUDES ### -->

<!--// START HEADER //-->
@section('header')
<!-- Create/Edit Your Custom view at view/partials/header/*.blade.php -->
<!-- View Composer Passed Variable $title -->
<!-- THIS IS YOUR SITE PAGE TITLE -->
@endsection
<!--// END HEADER //-->

<!--// START SIDEBAR //-->
@section('sidebar')
<!-- Create/Edit Your Custom view at view/partials/sidebar/*.blade.php -->
<!-- INIATE SIDEBAR JQUERY -->
<!-- View Composer Passed Variable $categories -->
@endsection
<!--// END SIDEBAR //-->

<!--// START MENU //-->
@section('menu')
<!-- Create/Edit Your Custom view at view/partials/menu/*.blade.php -->
<!-- View Composer Passed Variable $user -->
@endsection
<!--// END MENU //-->

<!-- ### END NAVBAR INCLUDES ### -->
<!--// START BREADCRUMB //-->
@section('breadcrumb')
{{-- {!! Breadcrumbs::render('home') !!} --}}
<!-- By Default it Will Spit Out Breadcrumbs Defined in app/http/breadcrumbs -->
<!-- For more Info http://laravel-breadcrumbs.davejamesmiller.com/en/latest/defining.html -->
@endsection
<!--// START BREADCRUMB //-->

<!-- ### START CONTENT ### -->
<!--// START CONTENT //-->
@section('content')
<!-- YOUR MAIN PAGE CONTENT IS HERE!!! -->
<!-- TO ADD PAGINATION IN CONTENT USE THIS -->
{{-- @if($items->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-wrapper-inner">
            {!! (new App\Pagination($items))->render() !!}
        </div>
    </div>
@endif --}}
@endsection
<!--// END CONTENT //-->
<!-- ### END CONTENT ### -->


<!-- ### START FLOAT INCLUDES ### -->
<!--// START FLOAT //-->
@section('float')
<!-- Add Here list of Page Link You Want to Include in Your Float! -->
@endsection
<!--// END FLOAT //-->
<!-- ### END FLOAT INCLUDES ### -->

<!-- ### START BTMSHEET INCLUDES ### -->
<!-- ### START ACCOUNTMODEL INCLUDES ### -->
@section('accountModalCol1')
@endsection
@section('accountModalCol2')
@endsection
@section('accountModalCol3')
@endsection
<!-- ### END ACCOUNTMODEL INCLUDES ### -->
<!-- ### START CART INCLUDES ### -->
@section('cart')
@endsection
<!-- ### END CART INCLUDES ### -->
<!-- ### END BTMSHEET INCLUDES ### -->


<!-- ### START FOOTER INCLUDES ### -->

<!-- View Composer Passed Variable to Footer $auth -->
<!-- 3 Column Footer By Default -->

<!--// START ABOUT COL1 //-->
@section('about')
<!-- This is About US Column -->
<!-- View Composer Passed Variable $auth -->
@endsection
<!--// END ABOUT //-->

<!--// START SOCIAL COL2 //-->
@section('social')
<!-- SOCIAL MEDIA WIDGET -->
<!-- View Composer Passed Variable $auth->profile->social_media_links -->
@endsection
<!--// END SOCIAL //-->

<!--// START TOS COL3 //-->
@section('tos')
<!-- TERMS OF SERVICE AND POLICY HERE -->
<!-- INJECT HERE ALL THE PAGESLINK via Composer -->
<!-- View Composer Passed Variable $auth -->
@endsection
<!--// END TOS //-->

<!--// START COPYRIGHT //-->
@section('copyright')
<!-- COPYRIGHT AND ALLRIGHTS RESERVE HERE -->
<!-- View Composer Passed Variable $auth -->
@endsection
<!--// END COPYRIGHT //-->

<!-- ### END FOOTER INCLUDES ### -->


<!-- ### START SCRIPT INCLUDES ### -->

<!--// START BUNDLE JS //-->
@section('bundlejs')
<!-- DEFAULT IS MATERIALIZE AND JQUERY -->
<!-- USE THE VERSION BY ELIXIR -->
{{-- {{ elixir('js/bundle.js') }} --}}
@endsection
<!--// END BUNDLE JS //-->

<!--// START CUSTOM JS //-->
@section('customjs')
<!-- ADD HERE CUSTOM INLINE SCRIPT FOR EACH PAGE! -->
@endsection
<!--// END CUSTOM JS //-->

<!-- ### END SCRIPT INCLUDES ### -->
