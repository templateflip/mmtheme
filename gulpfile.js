// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');

const SASS_INCLUDE_PATHS = [
  './../../../../mmcss/src/'    //TODO: Change this to include from node_mdoules when mmcss is available via npm
];

gulp.task('sass', function() {
    gulp.src('./sass/*.scss')
        .pipe(sass({ includePaths: SASS_INCLUDE_PATHS }))
        .pipe(gulp.dest('./'))
});

gulp.task('default', ['sass'], function() {
    gulp.watch('sass/**/*', ['sass']);
})