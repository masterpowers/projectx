<!-- Side Nav Toggle Button -->
<a href="#!" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">view_headline</i></a>
<ul class="right">
<!-- Navbar Menu List -->

<li id="searchable"><a href="#!"><i class="material-icons">search</i></a></li>
<li><a href="#cartbtn" id="nav-cart" class="modal-trigger"><i class="material-icons">shopping_cart</i></a></li>
<li><a class="waves-effect modal-trigger" href="#account_modal" id="account_menu"><i class="material-icons">contacts</i></a></li>
<li><a class="waves-effect dropdown-button" href="#!" data-activates="dropdown-menu" data-beloworigin="true" data-constrainwidth="false"><i class="material-icons">more_vert</i></a></li>
</ul>
<!-- Dropdown Structure -->
<ul id="dropdown-menu" class="dropdown-content">
@if(\Auth::guest())
<li><a href="/login" id="navbar-login">Login</a></li>
@elseif(\Auth::user()->is('admin'))
<li><a href="/admin" id="navbar-login">Admin Panel</a></li>
<li class="divider"></li>
<li><a href="/dashboard" id="navbar-login">Dashboard</a></li>
<li class="divider"></li>
<li><a href="/logout" id="navbar-logout">Logout</a></li>
@else
<li><a href="/dashboard" id="navbar-login">Dashboard</a></li>
<li class="divider"></li>
<li><a href="#!">Profile</a></li>
<li class="divider"></li>
<li><a href="/logout" id="navbar-logout">Logout</a></li>
@endif
</ul>
