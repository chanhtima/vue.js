const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/src/main.js', 'js/frontend.js')
mix.vue()
.sass(__dirname + '/Resources/src/assets/index.scss', 'public/css')
    .options({
        postCss: [require("tailwindcss"),],
    })

if (mix.inProduction()) {
    mix.version();
}