var gulp        = require('gulp');

var prefix      = require('gulp-autoprefixer');
var sass        = require('gulp-ruby-sass');

var browserify  = require('browserify');
var watchify    = require('watchify');
var source      = require('vinyl-source-stream');
var gutil       = require('gulp-util');
var uglify      = require('gulp-uglify');
var transform = require('vinyl-transform');


var connect     = require('gulp-connect-php');
var browserSync = require('browser-sync');

var jade = require('gulp-jade');

var imagemin = require('gulp-imagemin');

// set debug to true for sourcemaps
watchify.args.debug = true;

var b = browserify('./src/js/main.js', watchify.args);
var bundler = watchify(b);

gulp.task('js', function () {
  // transform regular node stream to gulp (buffered vinyl) stream 
  var browserified = transform(function(filename) {
    var b = browserify({entries: filename, debug: true});
    return b.bundle();
  });

  return gulp.src('./src/js/main.js')
    .pipe(browserified)
    // .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));
});

// to build the file and watch for changes
gulp.task('js:watch', bundle);

// run the bundler on any dep update
bundler.on('update', bundle);

function bundle() {
  return b.bundle()
    // log errors if they happen
    .on('error', gutil.log.bind(gutil, 'Browserify Error'))
    .pipe(source('bundle.js'))
      // for sourcemaps
      // .pipe(buffer())
      // .pipe(sourcemaps.init({ loadMaps: true }))
      // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./public/js'));
}

// Compile sass files, add css prefixes with sourcemap.
gulp.task('sass', function () {
    return sass('src/sass/', { style: 'compressed', precision: 3 })
        .on('error', function (err) { console.error('Error!', err.message); })
        .pipe(prefix({
          browsers: ['last 2 versions'],
          cascade: false
        }))
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


gulp.task('html', function() {
  var YOUR_LOCALS = {};
 
  gulp.src('./src/jade/*.jade')
    .pipe(jade({
      pretty: true,
      locals: YOUR_LOCALS
    }))
    .pipe(gulp.dest('./public'))
});

gulp.task('host', function() {
  connect.server({}, function (){
    browserSync({
        server: {
            baseDir: "./public"
        }
    });
  });
 
  gulp.watch(['./public/index.html', './public/js/bundle.js', './public/css/style.css']).on('change', function () {
    browserSync.reload();
  });
});
 
gulp.task('images', function () {
    return gulp.src('src/img/*')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest('./public/img'));
});