var elixir = require('laravel-elixir');
var gutils = require('gulp-util');
var gulp = require('gulp');

require('laravel-elixir-vueify');

if(elixir.config.production == true){
    process.env.NODE_ENV = 'production';
}

if(gutils.env._.indexOf('watch') > -1 && elixir.config.production != true){
    elixir.config.js.browserify.plugins.push({
        name: "browserify-hmr",
        options : {}
    });
}
// this is the Default task run "gulp"
elixir(function(mix) {
    mix.sass(['app.scss'], './resources/assets/css/app.css');
    // List All CSS dependancy Here
    mix.styles([
        'normalize.css',
        'main.css',
        'app.css'
    ], 'public/css');
    // add here other js
    mix.browserify(['app.js']);
    // Bust the Cache with New Version of CSS and JS
    mix.version([
      'public/css/all.css',
      'public/css/uncss/*.css',
      'public/js/bundle.js']);
    
    if(gutils.env._.indexOf('watch') > -1 && elixir.config.production != true){
        mix.browserSync({
           files: [
               elixir.config.appPath + '/**/*.php',
               elixir.config.get('public.css.outputFolder') + '/**/*.css',
               elixir.config.get('public.versioning.buildFolder') + '/rev-manifest.json',
               'resources/views/**/*.php'
           ],
           // Edit this For Your Site Name
           proxy: 'royalflushnetwork.dev',
           // Specify Port
           port:2221,
           ui: {
              port:2222
           }
        });
    }
    // Use the Final Versioned Fill in Blade
    // {{ elixir('css/all.scss') }} / {{ elixir('js/app.js') }}
    // <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    // <script type="text/javascript" href="{{ elixir('js/app.js') }}"
});

// This Task is for Removing Uncessary Bloat CSS 
// This Will Removed Unused CSS From Your CSS Framework
// On Each URL You Specified

var uncss = require('gulp-uncss');
// var sass = require('gulp-sass');
// var concat = require('gulp-concat');
var nano = require('gulp-cssnano');

// Note You can use the all.css final output or 
// Use Sass then concat you vendor css 
gulp.task('uncss', function () {
    return gulp.src('./public/css/all.css') 
        // .pipe(sass())
        // .pipe(concat('./resources/assets/css/main.css'))
        .pipe(uncss({
          // List all Links On Your Site
            html: ['http://royalflushnetwork.dev/', 
            'http://royalflushnetwork.dev/login',
            'http://royalflushnetwork.dev/register'
            ]
        }))
        .pipe(nano())
        .pipe(gulp.dest('./public/css/uncss'));
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
        .pipe(critical({base: './storage/framework/views/', inline: true, css: ['public/css/all.css']}))
        .pipe(gulp.dest('./storage/framework/views/'));
});

// This Task is For Inlining CSS for Your Email
// Do not Use Blade include here coz it will not be process
// This Needs The Whole HTML DOC

mcInlineCss = require('gulp-mc-inline-css'),
gulp.task('inlinecss', function() {
  return gulp.src('./resources/views/email/*')
    .pipe(mcInlineCss('4fdab4a7805bca06bb0a988119c4f879-us13', false))
    .pipe(gulp.dest('./resources/views/email-inlinecss'));
});

