@yield('bundlejs', view()->make('partials.js.vendor')->render())
@yield('jquery', view()->make('partials.js.jquery')->render())
@yield('customjs')