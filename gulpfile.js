const { src, dest, watch, series, parallel } = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const replace = require('gulp-replace');
const cssnano = require('cssnano');
const cssVersion = new Date().getTime();
const sassFiles = 'src/sass/**/*.scss';
const jsFiles = 'src/js/**/*.js';

// Creates a browserSync server for all files in this directory.
// browserSync.init({
//     server: {
//         baseDir: "./"
//     }
// });

function scssTask() {
    return src(sassFiles)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer({
            overrideBrowserslist: ['last 2 versions']
        }), cssnano()]))
        .pipe(sourcemaps.write('.')) 
        .pipe(dest('build'))
        .pipe(browserSync.stream());
}

function jsTask() {
    return src(jsFiles)
        .pipe(concat('index.js'))
        .pipe(uglify()) 
        .pipe(dest('build'))
}

// function preventCachingTask() {
//     // Looks in the index.html file for any files that have a 'v=' tag,
//     // and updates the version number to prevent browsers from caching
//     // old versions of the file. 
//     return src(['index.html'])
//         .pipe(replace(/v=\d+/g, 'v=' + cssVersion))
//         .pipe(dest('.'));
// }

function watchTask() {
    watch(
        [sassFiles, jsFiles],
        series(
            parallel(scssTask, jsTask),
            // preventCachingTask
        )
    );
}

exports.default = series(
    parallel(scssTask, jsTask),
    // preventCachingTask,
    watchTask
);
