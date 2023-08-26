const dotenvExpand = require("dotenv-expand");
dotenvExpand(
  require("dotenv").config({ path: "../../.env" /*, debug: true*/ })
);

const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");

mix.setPublicPath("../../public").mergeManifest();

mix.js(__dirname + "/Resources/assets/js/app.js", "js/banner.js");
mix.js(__dirname + "/Resources/assets/js/app.th.js", "js/banner.th.js");
mix
  .js(__dirname + "/Resources/assets/js/app.en.js", "js/banner.en.js")
  .sass(__dirname + "/Resources/assets/sass/app.scss", "css/banner.css");

mix.js(__dirname + '/Resources/assets/js/category.js', 'js/banner_category.js')
  .sass(__dirname + '/Resources/assets/sass/category.scss', 'css/banner_category.css');

  mix.js(__dirname + '/Resources/assets/js/ads.js', 'js/banner_ads.js')
  .sass(__dirname + '/Resources/assets/sass/ads.scss', 'css/banner_ads.css');

if (mix.inProduction()) {
  mix.version();
}
