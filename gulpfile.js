const gulp = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
const minifyImg = require('gulp-imagemin');
const minifyJS = require('gulp-uglify');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const del = require('del');
const runSequence = require('gulp4-run-sequence');
const fsCache = require('gulp-fs-cache');
var uglify = require('gulp-uglify');


// CSS Kodları
gulp.task('css', () => {
    return gulp.src('src/view/assets/scss/**/*.scss')
        .pipe(sass({
            outputStyle: 'nested',
            precision: 10,
            includePaths: ['.']
        }).on('error', sass.logError))
        .pipe(minifyCSS())
        .pipe(autoprefixer())
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('public/css'));
});

// JS Kodları
gulp.task('js', () => {
    return gulp.src([
        'src/view/assets/js/fw/jquery.min.js',
        'src/view/assets/js/*.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(minifyJS())
        .pipe(gulp.dest('public/js'));
});

// Cache sistemi
/*gulp.task('js', () => {
    let jsFsCache = fsCache('tmp/jscache');
    return gulp.src([
        'src/view/assets/js/fw/jquery.min.js',
        'src/view/assets/js/*.js'
    ])
        .pipe(jsFsCache)
        .pipe(uglify())
        .pipe(jsFsCache.restore)
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('public/js'));
});*/

// Temizleme metodu
gulp.task('delete', () => del(
    [
        'public/css',
        'public/js'
    ]
));


// Değişiklikleri izleme kodları
gulp.task('watch', () => {
    gulp.watch("src/view/assets/scss/**/*.scss", gulp.series('css'));
    gulp.watch("src/view/assets/js/**/*.js", gulp.series('js'));
});


// Gulp varsayılanları başlatma
gulp.task('default', () => {
    runSequence(
        'css',
        'js',
        'watch'
    );
});

