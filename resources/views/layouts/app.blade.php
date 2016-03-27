<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body id="app-layout">
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
</body>
</html>
