var gulp = require('gulp');
var elixir = require('laravel-elixir');
var newer = require('gulp-newer');
var uglify = require('gulp-uglify');

jsSrc = 'public/js/dynamism_pages/*.js';
jsDest = 'public/js/min';

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
    mix.sass('app.scss');
});

gulp.task('minify', function() {
    return gulp.src(jsSrc)
        .pipe(newer(jsDest))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});
