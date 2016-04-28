<!-- Modal Structure -->
<div id="account_modal" class="modal bottom-sheet" style="min-height: 420px;">
  <div class="modal-content">
    <div class="row">
       @yield('accountModalCol1', view()->make('partials.btmsheet.account.col1')->render())
       @yield('accountModalCol2', view()->make('partials.btmsheet.account.col2')->render())
       @yield('accountModalCol3', view()->make('partials.btmsheet.account.col3')->render())
    </div>
  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat" style="position: absolute; top: 30px; right: 45px;">Close</a>
  </div>
</div>