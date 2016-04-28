@yield('filter_categorylist',view()->make('forms.filters.categorylist')->render())
@yield('filter_pricing', view()->make('forms.filters.pricing')->render())
@yield('filter_reviewcount', view()->make('forms.filters.reviewcount')->render())
@yield('filter_popular', view()->make('forms.filters.popular')->render())
@yield('filter_starrating', view()->make('forms.filters.starrating')->render())
@yield('filter_pricerange', view()->make('forms.filters.pricerange')->render())


