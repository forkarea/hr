var gulp = require('gulp');
var browserSync = require('browser-sync');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');

gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('serve', function () {
    browserSync({
        server: 'src',
        notify: false
    });

    gulp.watch('src/*.html', ['reload']);
    gulp.watch('src/*.css', ['reload']);
    gulp.watch('src/*.js', ['reload']);
});

gulp.task('default', ['serve']);

gulp.task('css', function() {
    return gulp.src('public/css/*.css')
    .pipe(cleanCSS({
        keepBreaks: true
    }))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('public/css/mini'));
});