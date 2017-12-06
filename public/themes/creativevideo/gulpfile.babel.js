import path from 'path';
import gulp from 'gulp';
import bump from 'gulp-bump';
import sourcemaps from 'gulp-sourcemaps';
import sass from 'gulp-sass';
import rename from 'gulp-rename';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import cleanCss from 'gulp-clean-css';
import webpack from 'webpack-stream';
import { create as createBrowserSync } from 'browser-sync';

const browserSync = createBrowserSync();

const ROOT_DIR = '.';
const DIST_DIR = './dist';

gulp.task('bump:patch', () => {
  return gulp.src(path.resolve(ROOT_DIR, 'package.json'))
    .pipe(bump({ type: 'patch' }))
    .pipe(gulp.dest(ROOT_DIR));
});

gulp.task('bump:minor', () => {
  return gulp.src(path.resolve(ROOT_DIR, 'package.json'))
    .pipe(bump({ type: 'minor' }))
    .pipe(gulp.dest(ROOT_DIR));
});

gulp.task('bump:major', () => {
  return gulp.src(path.resolve(ROOT_DIR, 'package.json'))
    .pipe(bump({ type: 'major' }))
    .pipe(gulp.dest(ROOT_DIR));
});

gulp.task('webpack', () => {
  const SRC = path.resolve(ROOT_DIR, 'index.js');
  const DEST = path.resolve(DIST_DIR);

  return gulp.src(SRC)
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest(DEST))
    .pipe(browserSync.stream());
});

// -----------------------------------------------------------------------------

gulp.task('watch', ['scss', 'img', 'js'], () => {
  browserSync.init({
    proxy: 'http://localhost/~dot/napa-bsp.com',
    ghostMode: true
  });

  gulp.watch('assets/img/**/*', ['img']);
  gulp.watch('assets/js/**/*', ['js']);
  gulp.watch('assets/scss/**/*', ['scss']);
  gulp.watch('index.js', ['js']);

  gulp.watch('dist/**/*').on('change', browserSync.reload);
  gulp.watch('**/*.php').on('change', browserSync.reload);
});

// -----------------------------------------------------------------------------

gulp.task('scss', () => {
  const SRC = path.resolve(ROOT_DIR, 'assets', 'scss', 'styles.scss');
  const DEST = path.resolve(ROOT_DIR, 'dist');

  return gulp.src(SRC)
    //.pipe(sourcemaps.init())
    .pipe(concat('styles.css'))
    .pipe(sass({ outputStyle: 'nested' }))
    //.pipe(sourcemaps.write())
    .pipe(gulp.dest(DEST))
    .pipe(rename({ suffix: '.min' }))
    .pipe(cleanCss())
    .pipe(gulp.dest(DEST));
});

gulp.task('img', () => {
  const SRC = path.resolve(ROOT_DIR, 'assets', 'img', '**/*');
  const DEST = path.resolve(ROOT_DIR, 'dist', 'img');

  return gulp.src(SRC)
    .pipe(gulp.dest(DEST));
});

gulp.task('js', ['webpack'], () => {
  const SRC = path.resolve(DIST_DIR, 'assets', 'js', 'bundle.js');
  const DEST = path.resolve(DIST_DIR, 'assets', 'js');

  return gulp.src(SRC)
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(DEST));
});
