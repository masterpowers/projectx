<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body id="app-layout">
    @include('partials.navbar')
    @include('partials.sidebar')
    @yield('content')
    @include('partials.footer')
    @yield('script')

</body>
</html>
