@if(\Auth::guest())
<li><a href="/dashboard" class="btn-floating orange"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Dashboard">account_circle</i></a></li>
@elseif(\Auth::user()->is('admin'))
<li><a href="/admin" class="btn-floating orange"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Dashboard">account_circle</i></a></li>
@else
<li><a href="/dashboard" class="btn-floating orange"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Dashboard">account_circle</i></a></li>
@endif

<li><a href="/" class="btn-floating red lighten-1"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Home">home</i></a></li>

<li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="btn-floating blue"><i class="material-icons tooltipped" data-position="left" data-delay="50" data-tooltip="Share">share</i></a></li> 