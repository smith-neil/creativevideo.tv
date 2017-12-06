import path from 'path';
import ExtractTextPlugin from 'extract-text-webpack-plugin';
import { ProvidePlugin } from 'webpack';

const ROOT_DIR = '.';
const DIST_DIR = './dist';

module.exports = {
  resolve: {
    alias: {
      assets: path.resolve(ROOT_DIR, 'assets'),
      img: path.resolve(ROOT_DIR, 'assets', 'img'),
      js: path.resolve(ROOT_DIR, 'assets', 'js'),
      scss: path.resolve(ROOT_DIR, 'assets', 'scss')
    }
  },
  module: {
    rules: [{
      test: /\.js?$/,
      loader: 'babel-loader'
    }, {
      test: /\.css?$/,
      use: [
        'style-loader',
        'css-loader'
      ]
    }, {
      test: /\.scss?$/,
      use: [
        'style-loader',
        'css-loader',
        'sass-loader'
      ]
    }]
  },
  entry: path.resolve(ROOT_DIR, 'assets', 'js', 'index.js'),
  output: {
    path: path.resolve(DIST_DIR),
    filename: 'bundle.js'
  },
  plugins: [
    new ExtractTextPlugin('vendor.css'),
    new ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    })
  ]
};
