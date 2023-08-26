const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({
    path: '../../.env' /*, debug: true*/
}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/lang.th.js', 'js/mwz.th.js');
mix.js(__dirname + '/Resources/assets/js/lang.en.js', 'js/mwz.en.js');

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/mwz.js')
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'css/mwz.css');

mix.js(__dirname + '/Resources/assets/js/admin_menu.js', 'js/admin_menu.js')
    .sass(__dirname + '/Resources/assets/sass/admin_menu.scss', 'css/admin_menu.css');

mix.js(__dirname + '/Resources/assets/js/front.js', 'js/front.js')
    .sass(__dirname + '/Resources/assets/sass/front.scss', 'css/front.css');

mix.js(__dirname + '/Resources/assets/js/slug.js', 'js/slug.js')
    .sass(__dirname + '/Resources/assets/sass/slug.scss', 'css/slug.css');

mix.js(__dirname + '/Resources/assets/js/tag.js', 'js/tag.js')
    .sass(__dirname + '/Resources/assets/sass/tag.scss', 'css/tag.css');

if (mix.inProduction()) {
    mix.version();

}