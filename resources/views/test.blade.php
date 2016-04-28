<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Blue Ocean - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <style>
  body {
    display: flex !important;
    min-height: 100vh !important;
    flex-direction: column !important;
  }

  main {
    flex: 1 0 auto !important;
  }

nav ul a,
nav .brand-logo {
  color: #444 !important;
}

p {
  line-height: 2rem !important;
}

.button-collapse {
  color: #26a69a !important;
}

.parallax-container {
  min-height: 380px !important;
  line-height: 0 !important;
  height: auto !important;
  color: rgba(255, 255, 255, .9) !important;
}

.parallax-container .section {
  width: 100% !important;
}

@media only screen and (max-width: 992px) {
  .parallax-container .section {
    position: absolute !important;
    top: 40% !important;
  }
  #index-banner .section {
    top: 10% !important;
  }
}

@media only screen and (max-width: 600px) {
  #index-banner .section {
    top: 0 !important;
  }
}

.icon-block {
  padding: 0 15px !important;
}

.icon-block .material-icons {
  font-size: inherit !important;
}

.page-footer {
  margin: 0 !important;
  padding: 0 !important;
}

.progress {
  margin: 0 !important;
}
  </style>
</head>
<body>
  <header>
    <nav id="main" class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo">Laravel MaterializeCSS</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#" id="toggle-search"><i class="material-icons">search</i></a></li>

          <!-- Dropdown Trigger -->
          <li><a class="waves-effect modal-trigger" href="#account_modal"><i class="material-icons">account_circle</i></a></li>
          <li><a class="waves-effect dropdown-button" href="#" data-activates="dropdown-menu"><i class="material-icons">more_vert</i></a></li>
        </ul>
        
        <!-- Modal Structure -->
        <div id="account_modal" class="modal bottom-sheet">
          <div class="modal-content">
            <div class="row">
              <div class="col s1">1</div>
              <div class="col s1">2</div>
              <div class="col s1">3</div>
            </div>
          </div>
        </div>

        <!-- Dropdown Structure -->
        <ul id="dropdown-menu" class="dropdown-content">
          <li><a href="#!">Account</a></li>
          <li class="divider"></li>
          <li><a href="#!">Uitloggen</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>

    <nav id="search" class="white" style="display: none;">
      <div class="nav-wrapper container">
        <form>
          <div class="input-field">
            <input id="search-input" type="search" placeholder="Search" required>
            <label for="search"><i class="material-icons">search</i></label>
          </div>
        </form>
      </div>
      <div class="progress">
        <div class="indeterminate"></div>
      </div>
    </nav>
  </header>

  
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
  
  <main>
    <div id="index-banner" class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br><br>
          <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
          <div class="row center">
            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
          </div>
          <div class="row center">
            <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
          </div>
          <br><br>

        </div>
      </div>
      <div class="parallax"><img src="http://materializecss.com/templates/parallax-template/background1.jpg" alt="Unsplashed background img 1"></div>
    </div>


    <div class="container">
      <div class="section">

        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
              <h5 class="center">Speeds up development</h5>

              <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">group</i></h2>
              <h5 class="center">User Experience Focused</h5>

              <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
              <h5 class="center">Easy to work with</h5>

              <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="row center">
            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="http://materializecss.com/templates/parallax-template/background2.jpg" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container">
      <div class="section">

        <div class="row">
          <div class="col s12 center">
            <h3><i class="mdi-content-send brown-text"></i></h3>
            <h4>Contact Us</h4>
            <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
          </div>
        </div>

      </div>
    </div>


    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="row center">
            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="http://materializecss.com/templates/parallax-template/background3.jpg" alt="Unsplashed background img 3"></div>
    </div>
  </main>

  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="white-text" href="http://samhoud.com">&amp;samhoud</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  <script>
    (function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.modal-trigger').leanModal()
    
    // Init search
    $('#toggle-search').click(function() {
      $('#main').hide();
      $('#search').show();
      
      $('#search-input').focus();
      $('#search-input').focusout(function() {
        $('#search').hide();
        $('#main').show();
      });
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
  </script>

  </body>
</html>
