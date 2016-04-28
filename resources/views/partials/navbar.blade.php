<div class="navbar-fixed">
<nav>
<div class="nav-wrapper">
@yield('header',view()->make('partials.header.default')->render())
@yield('menu', view()->make('partials.menu.default')->render())
@yield('sidebar', view()->make('partials.sidebar.default')->render())
</div>
</nav>
</div>

