const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/content.js')
mix.js(__dirname + '/Resources/assets/js/lang.th.js', 'js/content.th.js')
mix.js(__dirname + '/Resources/assets/js/lang.en.js', 'js/content.en.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/content.css');

if (mix.inProduction()) {
    mix.version();
}
