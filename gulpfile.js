var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy(
        'bower_components/bootstrap/fonts/*',
        'public/fonts/'
    );
    mix.copy(
        'bower_components/font-awesome/fonts/*',
        'public/fonts/'
    );
    mix.copy(
        'bower_components/respond/src/respond.js',
        'public/js/'
    );
    mix.copy(
        'bower_components/html5shiv/dist/html5shiv.js',
        'public/js/'
    );
    mix.styles([
        '../../../bower_components/bootstrap/dist/css/bootstrap.css',
        '../../../bower_components/font-awesome/css/font-awesome.css',
        '../../../bower_components/animate.css/animate.css',
        '../../../bower_components/owl/owl-carousel/owl.carousel.css',
        '../../../bower_components/owl/owl-carousel/owl.transitions.css',
        '../../../bower_components/prettyphoto/css/prettyPhoto.css',
        '../../../bower_components/sweetalert/dist/sweetalert.css',
        'main.css'
    ], 'public/css/app.css');
    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.js',
        '../../../bower_components/bootstrap/dist/js/bootstrap.js',
        '../../../bower_components/owl/owl-carousel/owl.carousel.js',
        'mousescroll.js',
        '../../../bower_components/smoothscroll/dist/smoothscroll.js',
        '../../../bower_components/prettyphoto/js/jquery.prettyPhoto.js',
        '../../../bower_components/isotope/dist/isotope.pkgd.js',
        '../../../bower_components/inview/inview.js',
        '../../../bower_components/wow/dist/wow.js',
        '../../../bower_components/sweetalert/dist/sweetalert-dev.js',
        'main.js'
    ], 'public/js/app.js');
});
