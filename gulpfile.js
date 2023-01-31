const { src, dest, watch, series, parallel }  = require('gulp');
const sass = require('gulp-sass')(require('sass')); // Sassコンパイル
const plumber = require('gulp-plumber'); // エラー時の強制終了を防止
const notify = require('gulp-notify'); // エラー発生時にデスクトップ通知
const postcss = require('gulp-postcss'); // autoprefixerとセット
const autoprefixer = require('autoprefixer'); // ベンダープレフィックス付与
const cssdeclsort = require('css-declaration-sorter'); // cssプロパティ並べ替え
const browserSync = require('browser-sync'); // browser-syncを定義
const webpackStream = require("webpack-stream"); // webpack-streamを使ってgulpでwebpackを動かす
const webpack = require("webpack");

const webpackConfig = require("./webpack.config");

// webpackStreamを導入して、webpack.config.jsの設定を読み込み、JavaScriptファイルをバンドル
const bundleJs = (done) => {
  webpackStream(webpackConfig, webpack)
    .on('error', function (e) { //jsでエラーが起きてもwatchを止めない
      console.error(e); // jsの文法エラー等があった場合にコンソールに表示
      this.emit('end');
  })
    .pipe(dest("./wp-content/themes/simple/assets/js")) // コンパイル後の出力先
  done();
};

// scssのコンパイル
const compileSass = (done) => {
  const postcssPlugins = [
    // IEは11以上、Androidは5以上
    // その他は最新1バージョンで必要なベンダープレフィックスを付与する
    autoprefixer({
      grid: "autoplace",
      cascade: false,
    }),
    // プロパティを並べ替える(アルファベット順)
    cssdeclsort({
      order: 'alphabetical'
    })
  ];

  src('./wp-content/themes/simple/assets/scss/**/*.scss', { sourcemaps: true })
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })) // エラーチェック
    .pipe(sass({ outputStyle: 'expanded' })) // expanded, nested, campact, compressedから選択
    .pipe(postcss(postcssPlugins))
    .pipe(dest('./wp-content/themes/simple/assets/css', { sourcemaps: './sourcemaps' })); // sourcemapsディレクトリを作成
  done();
  };

// ローカルサーバー起動
const buildServer = (done) => {
  browserSync.init({
    proxy: "http://localhost/web-compass.blog/", // ローカル環境で使用するURLを記述
    open: true, // ブラウザを自動で開く
    watchOptions: {
      debounceDelay: 1000, // 1秒間、タスクの再実行を抑制
    },
  });
  done();
}

// ライブリロード
const browserReload = done => {
  browserSync.reload();
  done();
};

// 監視
const watchFiles = () => {
  watch( './wp-content/themes/simple/assets/scss/*.scss', series(compileSass, browserReload)) // scssが更新されたらcompileSass → browserReloadの順番で実行
  watch( './wp-content/themes/simple/assets/js/**/*.js', series(bundleJs, browserReload)) // jsが更新されたらbundleJs → browserReloadの順番で実行
};

  module.exports = {
  sass: compileSass,
  bundle: bundleJs,
  default: parallel(buildServer, watchFiles), // npx gulpでbuildServer,watchFilesを実行
  };