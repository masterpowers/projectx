<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body id="app-layout">
<header>
<!-- Best to Add Session Flash Here -->
@include('partials.navbar')
@include('partials.search')
@include('partials.loader')
<!-- Toggle Loader During Ajax Call -->
</header>
@include('partials.float')
<!-- Btmsheet is Triggerred by Menu on Navbar -->
@include('partials.btmsheet')


<main>
@include('partials.breadcrumb')
@yield('content')
</main>

@include('partials.footer')
@include('partials.script')
</body>
</html>
