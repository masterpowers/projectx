<head>
@yield('meta', view()->make('partials.head.meta')->render())
@yield('seo', SEO::generate())
@yield('favicon',view()->make('partials.head.favicon')->render())
@yield('font', view()->make('partials.head.font')->render())
@yield('css', view()->make('partials.head.css')->render())
@yield('critical', view()->make('partials.head.critical')->render())
</head>