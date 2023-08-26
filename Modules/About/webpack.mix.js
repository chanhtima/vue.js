const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/about.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/about.css');

mix.js(__dirname + '/Resources/assets/js/detail.js', 'js/about_detail.js')
    .sass( __dirname + '/Resources/assets/sass/detail.scss', 'css/about_detail.css');

if (mix.inProduction()) {
    mix.version();
}
