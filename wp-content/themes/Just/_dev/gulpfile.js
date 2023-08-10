/* eslint-disable prefer-arrow-callback */
/* eslint-disable prefer-destructuring */
const gulp = require("gulp"),
  settings = require("./settings"),
  sass = require("gulp-sass"),
  autoprefixer = require("gulp-autoprefixer"),
  browserSync = require("browser-sync").create(),
  sourceMaps = require("gulp-sourcemaps"),
  webpack = require("webpack"),
  util = require("gulp-util");

const webpackConfig = util.env.production
  ? require("./webpack.config.prod")
  : require("./webpack.config");

const config = {
  paths: {
    src: {
      scss: [settings.themeLocation + "_dev/src/scss/main.scss"],
      js: [settings.themeLocation + "_dev/src/js/app.js"],
    },
    dist: {
      css: settings.themeLocation + "assets/css",
      js: settings.themeLocation + "assets/js",
    },
  },
};

gulp.task("styles", function () {
  return gulp
    .src(config.paths.src.scss)
    .pipe(sourceMaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(
      autoprefixer({
        browsers: ["last 5 versions"],
      })
    )
    .pipe(sourceMaps.write())
    .pipe(gulp.dest(config.paths.dist.css));
});

gulp.task("styles-min", function () {
  return gulp
    .src(config.paths.src.scss)
    .pipe(sourceMaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(
      autoprefixer({
        browsers: ["last 5 versions"],
      })
    )
    .pipe(sass({ outputStyle: "compressed" }))
    .pipe(sourceMaps.write())
    .pipe(gulp.dest(config.paths.dist.css));
});

gulp.task("scripts", function (callback) {
  webpack(webpackConfig, function (err, stats) {
    if (err) {
      console.log(err.toString());
    }

    console.log(stats.toString());
    callback();
  });
});

gulp.task(
  "waitForStyles",
  gulp.series("styles", function () {
    return gulp
      .src(settings.themeLocation + "assets/css/main.css")
      .pipe(browserSync.stream());
  })
);

gulp.task(
  "waitForScripts",
  gulp.series("scripts", function (callback) {
    browserSync.reload();
    callback();
  })
);

gulp.task("build", gulp.series(["styles-min", "scripts"]));
gulp.task("default", gulp.series(["build"]));

gulp.task("watch", function () {
  browserSync.init({
    notify: false,
    proxy: settings.urlToPreview,
    ghostMode: false,
  });

  gulp.watch("../../**/*.php", function (callback) {
    browserSync.reload();
    callback();
  });
  gulp.watch(
    settings.themeLocation + "_dev/src/scss/**/*.scss",
    gulp.parallel("waitForStyles")
  );
  gulp.watch(
    [settings.themeLocation + "_dev/src/js/**/*.js"],
    gulp.parallel("waitForScripts")
  );
});
