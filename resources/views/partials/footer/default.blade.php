<footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
        @yield('about', view()->make('partials.footer.about.default')->render())
        </div>
        <div class="col l3 s12">
        @yield('social', view()->make('partials.footer.social.default')->render())
        </div>
        <div class="col l3 s12">  
        @yield('tos', view()->make('partials.footer.tos.default')->render())
        </div>
      </div>
    </div>
    <div class="footer-copyright">
    <div class="container">
    @yield('copyright', view()->make('partials.footer.copyright.default')->render())
    </div>
    </div>
</footer>
  