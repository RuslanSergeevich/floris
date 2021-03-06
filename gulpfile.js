var gulp      = require('gulp'),
    minifyCss = require('gulp-minify-css'),
    rename    = require('gulp-rename'),
    uglify    = require('gulp-uglify'),
    concat    = require('gulp-concat'),
    watch = require('gulp-watch'),
    concatCss = require('gulp-concat-css');

gulp.task('default',['watch']);

gulp.task('watch', function(){
    gulp.watch('frontend/web/css/*.css', ['css']);
    gulp.watch('frontend/web/js/lib/*.js', ['js']);
});


gulp.task('css', function () {
    return gulp.src('frontend/web/css/*.css')
        .pipe(concatCss('application.css'))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(rename('application.min.css'))
        .pipe(gulp.dest('frontend/web/min/'));
});

gulp.task('js', function() {
    return gulp.src('frontend/web/js/lib/*.js')
        .pipe(concat('application.js'))
        .pipe(uglify())
        .pipe(rename('application.min.js'))
        .pipe(gulp.dest('frontend/web/min/'));
});