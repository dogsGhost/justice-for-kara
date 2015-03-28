var gulp        = require('gulp');

var prefix      = require('gulp-autoprefixer');
var sass        = require('gulp-ruby-sass');

var browserify  = require('browserify');
var watchify    = require('watchify');
var source      = require('vinyl-source-stream');
var gutil       = require('gulp-util');
// var buffer   = require('vinyl-buffer');

var connect     = require('gulp-connect-php');
var browserSync = require('browser-sync');

// Browsers we want to support with css prefixes.
var prefixBrowsers = [
    'last 2 versions',
    'ie 9'
];

// set debug to true for sourcemaps
watchify.args.debug = true;

var bundler = watchify(browserify('./src/js/main.js', watchify.args));

// add support for react
// bundler.transform(shim);

// to build the file and watch for changes
gulp.task('js', bundle);

// run the bundler on any dep update
bundler.on('update', bundle);

function bundle() {
  return bundler.bundle()
    // log errors if they happen
    .on('error', gutil.log.bind(gutil, 'Browserify Error'))
    .pipe(source('bundle.js'))
      // for sourcemaps
      // .pipe(buffer())
      // .pipe(sourcemaps.init({ loadMaps: true }))
      // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./js'));
}

// Compile sass files, add css prefixes with sourcemap.
gulp.task('sass', function () {
    return sass('src/sass/', { style: 'compact', precision: 3 })
        .on('error', function (err) { console.error('Error!', err.message); })
        .pipe(prefix({ browsers: prefixBrowsers }))
        .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
  gulp.watch('./src/sass/*.scss', ['sass']);    
});

 
gulp.task('connect', function() {
  connect.server({}, function (){
    browserSync({
      proxy: 'localhost:8000'
    });
  });
 
  gulp.watch(['*.php', 'js/bundle.js', 'css/style.css']).on('change', function () {
    browserSync.reload();
  });
});