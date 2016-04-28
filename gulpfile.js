var elixir = require('laravel-elixir');
var gutils = require('gulp-util');
var gulp = require('gulp');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Make the Directory Writtable
 | chmod -R 777 resources
 | chmod -R 777 public
 |
 */

elixir(function(mix) {
	// Compile Materialize Sass , Change Output Point As Necessary
    mix.sass(['materialize.scss'], './resources/assets/css/app.css');
    // Comment Here Css You Wont Use!
    mix.styles([
        'app.css',
        'custom/materialize-tags.css',
        'custom/parsley.css',
        'custom/google-recaptcha.css',
        'custom/main.css', // This  Has our Own CSS
        'custom/input.css', // Materialize Form Custom CSS
        'custom/form.css', // Login , Register And Reset CSS
        'custom/jqueryui.css',
        'custom/star.css',
        'custom/nouislider.css'
    ], './public/css/all.css');
    // Comment Here JS You Wont Use!, Change Output Point As Necessary
    mix.scripts([
    	'jquery.js',
        'jquery-ui.min.js',
    	'parsley.js',
    	// 'typeahead.js',
        'materialize/initial.js',
		'materialize/jquery.easing.1.3.js',
		'materialize/animation.js',
		'materialize/velocity.min.js',
		'materialize/hammer.min.js',
		'materialize/jquery.hammer.js',
		'materialize/global.js',
		'materialize/collapsible.js',
		'materialize/dropdown.js',
		'materialize/leanModal.js',
		'materialize/materialbox.js',
		'materialize/parallax.js',
		'materialize/tabs.js',
		'materialize/tooltip.js',
		'materialize/waves.js',
		'materialize/toasts.js',
		'materialize/sideNav.js',
		'materialize/scrollspy.js',
		'materialize/forms.js',
		'materialize/slider.js',
		'materialize/cards.js',
		'materialize/chips.js',
		'materialize/pushpin.js',
		'materialize/buttons.js',
		'materialize/transitions.js',
		'materialize/scrollFire.js',
		'materialize/character_counter.js',
		'materialize/date_picker/picker.js',
		'materialize/date_picker/picker.date.js',
        'nouislider.js'
		// 'jquery.star.rating.js',
		// 'star.js'
		// 'materialize-tags.js',
		

    // ], './resources/assets/js/app.js');
    ], './public/js/all.js');
    // Copy Fonts
    // mix.copy('resources/assets/fonts/', 'public/fonts/');
    // This is For Cache Busting Enable this if Needed!
    // mix.version([
      // 'public/css/all.css',
      // 'public/css/page/uncss/*.css',
      // 'public/js/bundle.js']);

    

});
/**
 * THE FOLLOWING TASK IS FOR OPTIMIZING EACH PAGE
 */

// This Task is for Removing Uncessary Bloat CSS 
// This Will Removed Unused CSS From Your CSS Framework
// On Each URL You Specified

var uncss = require('gulp-uncss');
// var sass = require('gulp-sass');
// var concat = require('gulp-concat');
var nano = require('gulp-cssnano');

// Note You can use the all.css final output or 
// Use Sass then concat you vendor css 
// Change the Entry Point If you Will Use this!
gulp.task('uncss', function () {
    return gulp.src('./public/css/page/all.css') 
        // .pipe(sass())
        // .pipe(concat('./resources/assets/css/main.css'))
        .pipe(uncss({
          // List all Links On Your Site
          // Preprared Way is to Use 1 Link then Use UNCSS
          // then Override the @section('css') on that page.
          // Remove All Middleware Such as Auth!
            html: ['http://royalflushnetwork.dev/admin', 
            // 'http://royalflushnetwork.dev/login',
            // 'http://royalflushnetwork.dev/register'
            ]
        }))
        .pipe(nano())
        .pipe(gulp.dest('./public/css/page/uncss'));
});


// Compress The HTML in Your View
// Run after you use Uncss
var htmlmin = require('gulp-htmlmin');
var relurl = require('relateurl');
gulp.task('compress', function() {
    var opts = {
        collapseWhitespace:    true,
        removeAttributeQuotes: true,
        removeComments:        true,
        minifyJS:              true,
        removeComments:        true,
        minifyCSS:             true,
        removeTagWhitespace:   true,
        removeAttributeQuotes: true,
        minifyURLsminifyURLs:  relurl.output='shortest'
    };

    return gulp.src('./storage/framework/views/*')
               .pipe(htmlmin(opts))
               .pipe(gulp.dest('./storage/framework/views/'));
});

var critical = require('critical').stream;

// you can add css files in the array here...
// you should run critical before htmlmin
gulp.task('critical', function () {
    return gulp.src('./storage/framework/views/*')
        .pipe(critical({base: './storage/framework/views/', inline: true, css: ['public/css/uncss/all.css']}))
        .pipe(gulp.dest('./storage/framework/views/'));
});

// This Task is For Inlining CSS for Your Email
// Uses Mail Chimp API to Inline CSS
// Do not Use Blade include here coz it will not be process
// This Needs The Whole HTML DOC

mcInlineCss = require('gulp-mc-inline-css'),
gulp.task('inlinecss', function() {
  return gulp.src('./resources/views/email-inlinecss/*')
    .pipe(mcInlineCss('4fdab4a7805bca06bb0a988119c4f879-us13', false))
    .pipe(gulp.dest('./resources/views/email/'));
});
