<?php

namespace Modules\Mwz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

use Modules\Mwz\Entities\AdminMenus;
use Modules\Mwz\Entities\UserPermissions;
use Modules\Mwz\Http\Controllers\SlugController;

class AdminMenusAdminController extends Controller
{

    public $config = [
        'menu' => [
            'image' => false,
            'icon' => true,
            'parent' => true
        ],
        'type' => [
            1 => 'Slug',
            2 => 'URL',
            // 3 => 'หมวดหมู่',
        ],
        'location' => [
            '1' => 'Top Menu',
            '2' => 'Footer Menu'
        ],
        'category_link' => [
            'product' => 'หมวดหมู่สินค้า'
        ]
    ];

    public function IconsClassList()
    {
        $icons = [
            'fa fa-500px',
            'fa fa-address-book',
            'fa fa-address-book-o',
            'fa fa-address-card',
            'fa fa-address-card-o',
            'fa fa-adjust',
            'fa fa-adn',
            'fa fa-align-center',
            'fa fa-align-justify',
            'fa fa-align-left',
            'fa fa-align-right',
            'fa fa-amazon',
            'fa fa-ambulance',
            'fa fa-american-sign-language-interpreting',
            'fa fa-anchor',
            'fa fa-android',
            'fa fa-angellist',
            'fa fa-angle-double-down',
            'fa fa-angle-double-left',
            'fa fa-angle-double-right',
            'fa fa-angle-double-up',
            'fa fa-angle-down',
            'fa fa-angle-left',
            'fa fa-angle-right',
            'fa fa-angle-up',
            'fa fa-apple',
            'fa fa-archive',
            'fa fa-area-chart',
            'fa fa-arrow-circle-down',
            'fa fa-arrow-circle-left',
            'fa fa-arrow-circle-o-down',
            'fa fa-arrow-circle-o-left',
            'fa fa-arrow-circle-o-right',
            'fa fa-arrow-circle-o-up',
            'fa fa-arrow-circle-right',
            'fa fa-arrow-circle-up',
            'fa fa-arrow-down',
            'fa fa-arrow-left',
            'fa fa-arrow-right',
            'fa fa-arrow-up',
            'fa fa-arrows',
            'fa fa-arrows-alt',
            'fa fa-arrows-h',
            'fa fa-arrows-v',
            'fa fa-asl-interpreting',
            'fa fa-assistive-listening-systems',
            'fa fa-asterisk',
            'fa fa-at',
            'fa fa-audio-description',
            'fa fa-automobile',
            'fa fa-backward',
            'fa fa-balance-scale',
            'fa fa-ban',
            'fa fa-bandcamp',
            'fa fa-bank',
            'fa fa-bar-chart',
            'fa fa-bar-chart-o',
            'fa fa-barcode',
            'fa fa-bars',
            'fa fa-bath',
            'fa fa-bathtub',
            'fa fa-battery',
            'fa fa-battery-0',
            'fa fa-battery-1',
            'fa fa-battery-2',
            'fa fa-battery-3',
            'fa fa-battery-4',
            'fa fa-battery-empty',
            'fa fa-battery-full',
            'fa fa-battery-half',
            'fa fa-battery-quarter',
            'fa fa-battery-three-quarters',
            'fa fa-bed',
            'fa fa-beer',
            'fa fa-behance',
            'fa fa-behance-square',
            'fa fa-bell',
            'fa fa-bell-o',
            'fa fa-bell-slash',
            'fa fa-bell-slash-o',
            'fa fa-bicycle',
            'fa fa-binoculars',
            'fa fa-birthday-cake',
            'fa fa-bitbucket',
            'fa fa-bitbucket-square',
            'fa fa-bitcoin',
            'fa fa-black-tie',
            'fa fa-blind',
            'fa fa-bluetooth',
            'fa fa-bluetooth-b',
            'fa fa-bold',
            'fa fa-bolt',
            'fa fa-bomb',
            'fa fa-book',
            'fa fa-bookmark',
            'fa fa-bookmark-o',
            'fa fa-braille',
            'fa fa-briefcase',
            'fa fa-btc',
            'fa fa-bug',
            'fa fa-building',
            'fa fa-building-o',
            'fa fa-bullhorn',
            'fa fa-bullseye',
            'fa fa-bus',
            'fa fa-buysellads',
            'fa fa-cab',
            'fa fa-calculator',
            'fa fa-calendar',
            'fa fa-calendar-check-o',
            'fa fa-calendar-minus-o',
            'fa fa-calendar-o',
            'fa fa-calendar-plus-o',
            'fa fa-calendar-times-o',
            'fa fa-camera',
            'fa fa-camera-retro',
            'fa fa-car',
            'fa fa-caret-down',
            'fa fa-caret-left',
            'fa fa-caret-right',
            'fa fa-caret-square-o-down',
            'fa fa-caret-square-o-left',
            'fa fa-caret-square-o-right',
            'fa fa-caret-square-o-up',
            'fa fa-caret-up',
            'fa fa-cart-arrow-down',
            'fa fa-cart-plus',
            'fa fa-cc',
            'fa fa-cc-amex',
            'fa fa-cc-diners-club',
            'fa fa-cc-discover',
            'fa fa-cc-jcb',
            'fa fa-cc-mastercard',
            'fa fa-cc-paypal',
            'fa fa-cc-stripe',
            'fa fa-cc-visa',
            'fa fa-certificate',
            'fa fa-chain',
            'fa fa-chain-broken',
            'fa fa-check',
            'fa fa-check-circle',
            'fa fa-check-circle-o',
            'fa fa-check-square',
            'fa fa-check-square-o',
            'fa fa-chevron-circle-down',
            'fa fa-chevron-circle-left',
            'fa fa-chevron-circle-right',
            'fa fa-chevron-circle-up',
            'fa fa-chevron-down',
            'fa fa-chevron-left',
            'fa fa-chevron-right',
            'fa fa-chevron-up',
            'fa fa-child',
            'fa fa-chrome',
            'fa fa-circle',
            'fa fa-circle-o',
            'fa fa-circle-o-notch',
            'fa fa-circle-thin',
            'fa fa-clipboard',
            'fa fa-clock-o',
            'fa fa-clone',
            'fa fa-close',
            'fa fa-cloud',
            'fa fa-cloud-download',
            'fa fa-cloud-upload',
            'fa fa-cny',
            'fa fa-code',
            'fa fa-code-fork',
            'fa fa-codepen',
            'fa fa-codiepie',
            'fa fa-coffee',
            'fa fa-cog',
            'fa fa-cogs',
            'fa fa-columns',
            'fa fa-comment',
            'fa fa-comment-o',
            'fa fa-commenting',
            'fa fa-commenting-o',
            'fa fa-comments',
            'fa fa-comments-o',
            'fa fa-compass',
            'fa fa-compress',
            'fa fa-connectdevelop',
            'fa fa-contao',
            'fa fa-copy',
            'fa fa-copyright',
            'fa fa-creative-commons',
            'fa fa-credit-card',
            'fa fa-credit-card-alt',
            'fa fa-crop',
            'fa fa-crosshairs',
            'fa fa-css3',
            'fa fa-cube',
            'fa fa-cubes',
            'fa fa-cut',
            'fa fa-cutlery',
            'fa fa-dashboard',
            'fa fa-dashcube',
            'fa fa-database',
            'fa fa-deaf',
            'fa fa-deafness',
            'fa fa-dedent',
            'fa fa-delicious',
            'fa fa-desktop',
            'fa fa-deviantart',
            'fa fa-diamond',
            'fa fa-digg',
            'fa fa-dollar',
            'fa fa-dot-circle-o',
            'fa fa-download',
            'fa fa-dribbble',
            'fa fa-drivers-license',
            'fa fa-drivers-license-o',
            'fa fa-dropbox',
            'fa fa-drupal',
            'fa fa-edge',
            'fa fa-edit',
            'fa fa-eercast',
            'fa fa-eject',
            'fa fa-ellipsis-h',
            'fa fa-ellipsis-v',
            'fa fa-empire',
            'fa fa-envelope',
            'fa fa-envelope-o',
            'fa fa-envelope-open',
            'fa fa-envelope-open-o',
            'fa fa-envelope-square',
            'fa fa-envira',
            'fa fa-eraser',
            'fa fa-etsy',
            'fa fa-eur',
            'fa fa-euro',
            'fa fa-exchange',
            'fa fa-exclamation',
            'fa fa-exclamation-circle',
            'fa fa-exclamation-triangle',
            'fa fa-expand',
            'fa fa-expeditedssl',
            'fa fa-external-link',
            'fa fa-external-link-square',
            'fa fa-eye',
            'fa fa-eye-slash',
            'fa fa-eyedropper',
            'fa fa-fa',
            'fa fa-facebook',
            'fa fa-facebook-f',
            'fa fa-facebook-official',
            'fa fa-facebook-square',
            'fa fa-fast-backward',
            'fa fa-fast-forward',
            'fa fa-fax',
            'fa fa-feed',
            'fa fa-female',
            'fa fa-fighter-jet',
            'fa fa-file',
            'fa fa-file-archive-o',
            'fa fa-file-audio-o',
            'fa fa-file-code-o',
            'fa fa-file-excel-o',
            'fa fa-file-image-o',
            'fa fa-file-movie-o',
            'fa fa-file-o',
            'fa fa-file-pdf-o',
            'fa fa-file-photo-o',
            'fa fa-file-picture-o',
            'fa fa-file-powerpoint-o',
            'fa fa-file-sound-o',
            'fa fa-file-text',
            'fa fa-file-text-o',
            'fa fa-file-video-o',
            'fa fa-file-word-o',
            'fa fa-file-zip-o',
            'fa fa-files-o',
            'fa fa-film',
            'fa fa-filter',
            'fa fa-fire',
            'fa fa-fire-extinguisher',
            'fa fa-firefox',
            'fa fa-first-order',
            'fa fa-flag',
            'fa fa-flag-checkered',
            'fa fa-flag-o',
            'fa fa-flash',
            'fa fa-flask',
            'fa fa-flickr',
            'fa fa-floppy-o',
            'fa fa-folder',
            'fa fa-folder-o',
            'fa fa-folder-open',
            'fa fa-folder-open-o',
            'fa fa-font',
            'fa fa-font-awesome',
            'fa fa-fonticons',
            'fa fa-fort-awesome',
            'fa fa-forumbee',
            'fa fa-forward',
            'fa fa-foursquare',
            'fa fa-free-code-camp',
            'fa fa-frown-o',
            'fa fa-futbol-o',
            'fa fa-gamepad',
            'fa fa-gavel',
            'fa fa-gbp',
            'fa fa-ge',
            'fa fa-gear',
            'fa fa-gears',
            'fa fa-genderless',
            'fa fa-get-pocket',
            'fa fa-gg',
            'fa fa-gg-circle',
            'fa fa-gift',
            'fa fa-git',
            'fa fa-git-square',
            'fa fa-github',
            'fa fa-github-alt',
            'fa fa-github-square',
            'fa fa-gitlab',
            'fa fa-gittip',
            'fa fa-glass',
            'fa fa-glide',
            'fa fa-glide-g',
            'fa fa-globe',
            'fa fa-google',
            'fa fa-google-plus',
            'fa fa-google-plus-circle',
            'fa fa-google-plus-official',
            'fa fa-google-plus-square',
            'fa fa-google-wallet',
            'fa fa-graduation-cap',
            'fa fa-gratipay',
            'fa fa-grav',
            'fa fa-group',
            'fa fa-h-square',
            'fa fa-hacker-news',
            'fa fa-hand-grab-o',
            'fa fa-hand-lizard-o',
            'fa fa-hand-o-down',
            'fa fa-hand-o-left',
            'fa fa-hand-o-right',
            'fa fa-hand-o-up',
            'fa fa-hand-paper-o',
            'fa fa-hand-peace-o',
            'fa fa-hand-pointer-o',
            'fa fa-hand-rock-o',
            'fa fa-hand-scissors-o',
            'fa fa-hand-spock-o',
            'fa fa-hand-stop-o',
            'fa fa-handshake-o',
            'fa fa-hard-of-hearing',
            'fa fa-hashtag',
            'fa fa-hdd-o',
            'fa fa-header',
            'fa fa-headphones',
            'fa fa-heart',
            'fa fa-heart-o',
            'fa fa-heartbeat',
            'fa fa-history',
            'fa fa-home',
            'fa fa-hospital-o',
            'fa fa-hotel',
            'fa fa-hourglass',
            'fa fa-hourglass-1',
            'fa fa-hourglass-2',
            'fa fa-hourglass-3',
            'fa fa-hourglass-end',
            'fa fa-hourglass-half',
            'fa fa-hourglass-o',
            'fa fa-hourglass-start',
            'fa fa-houzz',
            'fa fa-html5',
            'fa fa-i-cursor',
            'fa fa-id-badge',
            'fa fa-id-card',
            'fa fa-id-card-o',
            'fa fa-ils',
            'fa fa-image',
            'fa fa-imdb',
            'fa fa-inbox',
            'fa fa-indent',
            'fa fa-industry',
            'fa fa-info',
            'fa fa-info-circle',
            'fa fa-inr',
            'fa fa-instagram',
            'fa fa-institution',
            'fa fa-internet-explorer',
            'fa fa-intersex',
            'fa fa-ioxhost',
            'fa fa-italic',
            'fa fa-joomla',
            'fa fa-jpy',
            'fa fa-jsfiddle',
            'fa fa-key',
            'fa fa-keyboard-o',
            'fa fa-krw',
            'fa fa-language',
            'fa fa-laptop',
            'fa fa-lastfm',
            'fa fa-lastfm-square',
            'fa fa-leaf',
            'fa fa-leanpub',
            'fa fa-legal',
            'fa fa-lemon-o',
            'fa fa-level-down',
            'fa fa-level-up',
            'fa fa-life-bouy',
            'fa fa-life-buoy',
            'fa fa-life-ring',
            'fa fa-life-saver',
            'fa fa-lightbulb-o',
            'fa fa-line-chart',
            'fa fa-link',
            'fa fa-linkedin',
            'fa fa-linkedin-square',
            'fa fa-linode',
            'fa fa-linux',
            'fa fa-list',
            'fa fa-list-alt',
            'fa fa-list-ol',
            'fa fa-list-ul',
            'fa fa-location-arrow',
            'fa fa-lock',
            'fa fa-long-arrow-down',
            'fa fa-long-arrow-left',
            'fa fa-long-arrow-right',
            'fa fa-long-arrow-up',
            'fa fa-low-vision',
            'fa fa-magic',
            'fa fa-magnet',
            'fa fa-mail-forward',
            'fa fa-mail-reply',
            'fa fa-mail-reply-all',
            'fa fa-male',
            'fa fa-map',
            'fa fa-map-marker',
            'fa fa-map-o',
            'fa fa-map-pin',
            'fa fa-map-signs',
            'fa fa-mars',
            'fa fa-mars-double',
            'fa fa-mars-stroke',
            'fa fa-mars-stroke-h',
            'fa fa-mars-stroke-v',
            'fa fa-maxcdn',
            'fa fa-meanpath',
            'fa fa-medium',
            'fa fa-medkit',
            'fa fa-meetup',
            'fa fa-meh-o',
            'fa fa-mercury',
            'fa fa-microchip',
            'fa fa-microphone',
            'fa fa-microphone-slash',
            'fa fa-minus',
            'fa fa-minus-circle',
            'fa fa-minus-square',
            'fa fa-minus-square-o',
            'fa fa-mixcloud',
            'fa fa-mobile',
            'fa fa-mobile-phone',
            'fa fa-modx',
            'fa fa-money',
            'fa fa-moon-o',
            'fa fa-mortar-board',
            'fa fa-motorcycle',
            'fa fa-mouse-pointer',
            'fa fa-music',
            'fa fa-navicon',
            'fa fa-neuter',
            'fa fa-newspaper-o',
            'fa fa-object-group',
            'fa fa-object-ungroup',
            'fa fa-odnoklassniki',
            'fa fa-odnoklassniki-square',
            'fa fa-opencart',
            'fa fa-openid',
            'fa fa-opera',
            'fa fa-optin-monster',
            'fa fa-outdent',
            'fa fa-pagelines',
            'fa fa-paint-brush',
            'fa fa-paper-plane',
            'fa fa-paper-plane-o',
            'fa fa-paperclip',
            'fa fa-paragraph',
            'fa fa-paste',
            'fa fa-pause',
            'fa fa-pause-circle',
            'fa fa-pause-circle-o',
            'fa fa-paw',
            'fa fa-paypal',
            'fa fa-pencil',
            'fa fa-pencil-square',
            'fa fa-pencil-square-o',
            'fa fa-percent',
            'fa fa-phone',
            'fa fa-phone-square',
            'fa fa-photo',
            'fa fa-picture-o',
            'fa fa-pie-chart',
            'fa fa-pied-piper',
            'fa fa-pied-piper-alt',
            'fa fa-pied-piper-pp',
            'fa fa-pinterest',
            'fa fa-pinterest-p',
            'fa fa-pinterest-square',
            'fa fa-plane',
            'fa fa-play',
            'fa fa-play-circle',
            'fa fa-play-circle-o',
            'fa fa-plug',
            'fa fa-plus',
            'fa fa-plus-circle',
            'fa fa-plus-square',
            'fa fa-plus-square-o',
            'fa fa-podcast',
            'fa fa-power-off',
            'fa fa-print',
            'fa fa-product-hunt',
            'fa fa-puzzle-piece',
            'fa fa-qq',
            'fa fa-qrcode',
            'fa fa-question',
            'fa fa-question-circle',
            'fa fa-question-circle-o',
            'fa fa-quora',
            'fa fa-quote-left',
            'fa fa-quote-right',
            'fa fa-ra',
            'fa fa-random',
            'fa fa-ravelry',
            'fa fa-rebel',
            'fa fa-recycle',
            'fa fa-reddit',
            'fa fa-reddit-alien',
            'fa fa-reddit-square',
            'fa fa-refresh',
            'fa fa-registered',
            'fa fa-remove',
            'fa fa-renren',
            'fa fa-reorder',
            'fa fa-repeat',
            'fa fa-reply',
            'fa fa-reply-all',
            'fa fa-resistance',
            'fa fa-retweet',
            'fa fa-rmb',
            'fa fa-road',
            'fa fa-rocket',
            'fa fa-rotate-left',
            'fa fa-rotate-right',
            'fa fa-rouble',
            'fa fa-rss',
            'fa fa-rss-square',
            'fa fa-rub',
            'fa fa-ruble',
            'fa fa-rupee',
            'fa fa-s15',
            'fa fa-safari',
            'fa fa-save',
            'fa fa-scissors',
            'fa fa-scribd',
            'fa fa-search',
            'fa fa-search-minus',
            'fa fa-search-plus',
            'fa fa-sellsy',
            'fa fa-send',
            'fa fa-send-o',
            'fa fa-server',
            'fa fa-share',
            'fa fa-share-alt',
            'fa fa-share-alt-square',
            'fa fa-share-square',
            'fa fa-share-square-o',
            'fa fa-shekel',
            'fa fa-sheqel',
            'fa fa-shield',
            'fa fa-ship',
            'fa fa-shirtsinbulk',
            'fa fa-shopping-bag',
            'fa fa-shopping-basket',
            'fa fa-shopping-cart',
            'fa fa-shower',
            'fa fa-sign-in',
            'fa fa-sign-language',
            'fa fa-sign-out',
            'fa fa-signal',
            'fa fa-signing',
            'fa fa-simplybuilt',
            'fa fa-sitemap',
            'fa fa-skyatlas',
            'fa fa-skype',
            'fa fa-slack',
            'fa fa-sliders',
            'fa fa-slideshare',
            'fa fa-smile-o',
            'fa fa-snapchat',
            'fa fa-snapchat-ghost',
            'fa fa-snapchat-square',
            'fa fa-snowflake-o',
            'fa fa-soccer-ball-o',
            'fa fa-sort',
            'fa fa-sort-alpha-asc',
            'fa fa-sort-alpha-desc',
            'fa fa-sort-amount-asc',
            'fa fa-sort-amount-desc',
            'fa fa-sort-asc',
            'fa fa-sort-desc',
            'fa fa-sort-down',
            'fa fa-sort-numeric-asc',
            'fa fa-sort-numeric-desc',
            'fa fa-sort-up',
            'fa fa-soundcloud',
            'fa fa-space-shuttle',
            'fa fa-spinner',
            'fa fa-spoon',
            'fa fa-spotify',
            'fa fa-square',
            'fa fa-square-o',
            'fa fa-stack-exchange',
            'fa fa-stack-overflow',
            'fa fa-star',
            'fa fa-star-half',
            'fa fa-star-half-empty',
            'fa fa-star-half-full',
            'fa fa-star-half-o',
            'fa fa-star-o',
            'fa fa-steam',
            'fa fa-steam-square',
            'fa fa-step-backward',
            'fa fa-step-forward',
            'fa fa-stethoscope',
            'fa fa-sticky-note',
            'fa fa-sticky-note-o',
            'fa fa-stop',
            'fa fa-stop-circle',
            'fa fa-stop-circle-o',
            'fa fa-street-view',
            'fa fa-strikethrough',
            'fa fa-stumbleupon',
            'fa fa-stumbleupon-circle',
            'fa fa-subscript',
            'fa fa-subway',
            'fa fa-suitcase',
            'fa fa-sun-o',
            'fa fa-superpowers',
            'fa fa-superscript',
            'fa fa-support',
            'fa fa-table',
            'fa fa-tablet',
            'fa fa-tachometer',
            'fa fa-tag',
            'fa fa-tags',
            'fa fa-tasks',
            'fa fa-taxi',
            'fa fa-telegram',
            'fa fa-television',
            'fa fa-tencent-weibo',
            'fa fa-terminal',
            'fa fa-text-height',
            'fa fa-text-width',
            'fa fa-th',
            'fa fa-th-large',
            'fa fa-th-list',
            'fa fa-themeisle',
            'fa fa-thermometer',
            'fa fa-thermometer-0',
            'fa fa-thermometer-1',
            'fa fa-thermometer-2',
            'fa fa-thermometer-3',
            'fa fa-thermometer-4',
            'fa fa-thermometer-empty',
            'fa fa-thermometer-full',
            'fa fa-thermometer-half',
            'fa fa-thermometer-quarter',
            'fa fa-thermometer-three-quarters',
            'fa fa-thumb-tack',
            'fa fa-thumbs-down',
            'fa fa-thumbs-o-down',
            'fa fa-thumbs-o-up',
            'fa fa-thumbs-up',
            'fa fa-ticket',
            'fa fa-times',
            'fa fa-times-circle',
            'fa fa-times-circle-o',
            'fa fa-times-rectangle',
            'fa fa-times-rectangle-o',
            'fa fa-tint',
            'fa fa-toggle-down',
            'fa fa-toggle-left',
            'fa fa-toggle-off',
            'fa fa-toggle-on',
            'fa fa-toggle-right',
            'fa fa-toggle-up',
            'fa fa-trademark',
            'fa fa-train',
            'fa fa-transgender',
            'fa fa-transgender-alt',
            'fa fa-trash',
            'fa fa-trash-o',
            'fa fa-tree',
            'fa fa-trello',
            'fa fa-tripadvisor',
            'fa fa-trophy',
            'fa fa-truck',
            'fa fa-try',
            'fa fa-tty',
            'fa fa-tumblr',
            'fa fa-tumblr-square',
            'fa fa-turkish-lira',
            'fa fa-tv',
            'fa fa-twitch',
            'fa fa-twitter',
            'fa fa-twitter-square',
            'fa fa-umbrella',
            'fa fa-underline',
            'fa fa-undo',
            'fa fa-universal-access',
            'fa fa-university',
            'fa fa-unlink',
            'fa fa-unlock',
            'fa fa-unlock-alt',
            'fa fa-unsorted',
            'fa fa-upload',
            'fa fa-usb',
            'fa fa-usd',
            'fa fa-user',
            'fa fa-user-circle',
            'fa fa-user-circle-o',
            'fa fa-user-md',
            'fa fa-user-o',
            'fa fa-user-plus',
            'fa fa-user-secret',
            'fa fa-user-times',
            'fa fa-users',
            'fa fa-vcard',
            'fa fa-vcard-o',
            'fa fa-venus',
            'fa fa-venus-double',
            'fa fa-venus-mars',
            'fa fa-viacoin',
            'fa fa-viadeo',
            'fa fa-viadeo-square',
            'fa fa-video-camera',
            'fa fa-vimeo',
            'fa fa-vimeo-square',
            'fa fa-vine',
            'fa fa-vk',
            'fa fa-volume-control-phone',
            'fa fa-volume-down',
            'fa fa-volume-off',
            'fa fa-volume-up',
            'fa fa-warning',
            'fa fa-wechat',
            'fa fa-weibo',
            'fa fa-weixin',
            'fa fa-whatsapp',
            'fa fa-wheelchair',
            'fa fa-wheelchair-alt',
            'fa fa-wifi',
            'fa fa-wikipedia-w',
            'fa fa-window-close',
            'fa fa-window-close-o',
            'fa fa-window-maximize',
            'fa fa-window-minimize',
            'fa fa-window-restore',
            'fa fa-windows',
            'fa fa-won',
            'fa fa-wordpress',
            'fa fa-wpbeginner',
            'fa fa-wpexplorer',
            'fa fa-wpforms',
            'fa fa-wrench',
            'fa fa-xing',
            'fa fa-xing-square',
            'fa fa-y-combinator',
            'fa fa-y-combinator-square',
            'fa fa-yahoo',
            'fa fa-yc',
            'fa fa-yc-square',
            'fa fa-yelp',
            'fa fa-yen',
            'fa fa-yoast',
            'fa fa-youtube',
            'fa fa-youtube-play',
            'fa fa-youtube-square',
        ];
        return $icons;
    }

    /**
     * Function : __construct check admin login
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : menu index
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return index.blade view
     */
    public function index(Request $request)
    {
        $side_admin_menus = mwz_get_side_admin_menu();
        // mwz_pre($side_admin_menus); exit;
        return view('mwz::menu.index', ['config' => $this->config['menu']]);
    }

    /**
     * Function : menu datatable ajax response
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return json of menu
     */
    public function datatable_ajax(Request $request,)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('sequence', 'image', 'name_th', 'updated_at', 'action');

            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];


            // create menu cat object
            $o_menu = new AdminMenus();

            // dt_search 
            if (!empty($dt_search)) {
                $o_menu = $o_menu->Where(function ($query) use ($dt_search) { 
                    $query->orWhere('name_th', 'like', "" . $dt_search . "%")
                         ->orWhere('route_name','like', "" . $dt_search . "%")
                        // ->orWhere('name_en', 'like', "" . $dt_search . "%")
                        ;
                });
            }
            

            // count all menu cat
            $dt_total = $o_menu->count();

            // set query order & limit from datatable
            $o_menu->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query menu cat
            $menus = $o_menu->with('slug')->withDepth()->defaultOrder()->get();

            // prepare datatable for response
            $tables = Datatables::of($menus)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('menu_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                //->setOffset($dt_start)
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('d/m/Y H:i:s');
                })
                ->editColumn('name_th', function ($record) {
                    $result = array();

                    $result = str_repeat(' - ', $record->depth) . $record->name_th;

                    return $result;
                })
                ->editColumn('name_en', function ($record) {
                    $result = array();

                    $result = str_repeat(' - ', $record->depth) . $record->name_en;

                    return $result;
                })
                ->addColumn('link', function ($record) {
                    return $record->route_name;
                })
                ->addColumn('location', function ($record) {
                    return (!empty($this->config['location'][$record->location])) ? $this->config['location'][$record->location] : '';
                })
                ->editColumn('image', function ($record) {
                    if (!empty($record->image) && CheckFileInServer($record->image)) {
                        $img = '<img class="rounded" src="' . $record->image . '" />';
                    } else {
                        $img = '<img alt="' . CheckFileInServer($record->image) . '" class="rounded" src="/storage/_blank.jpg" />';
                    }
                    return $img;
                })
                ->editColumn('icon', function ($record) {
                    if (!empty($record->icon)) {
                        $icon = '<i class="' . $record->icon . '" ></i>';
                    } else {
                        $icon = 'no icon';
                    }
                    return $icon;
                })
                ->addColumn('sort', function ($record) {
                    return mwz_sort_button('admin.admin_menu.admin_menu.sort', $record->id, 'setUpdateSort');
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    $action_btn .= mwz_update_status_button('admin.admin_menu.admin_menu.set_status', $record->id, 'setUpdateStatus', $record->status);

                    $action_btn .= mwz_edit_button('admin.admin_menu.admin_menu.edit', $record->id);

                    $action_btn .= mwz_delete_button('admin.admin_menu.admin_menu.set_delete', $record->id, 'setDelete');

                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }


    /**
     * Function : update menu status
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $menu = AdminMenus::find($id);
            $menu->status = $status;

            if ($menu->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::menu.menu_admin_admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('mwz::menu.menu_admin_admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : delete menu
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $menu_cat = AdminMenus::find($id);
            if ($menu_cat->delete()) {
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::menu.menu_admin_admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('mwz::menu.menu_admin_admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : add menu form
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param GET
     * @return menu form view
     */
    public function form(Request $request, $id = 0)
    {
        $mode = 'add';
        $metadata = [
            'th' => [
                'module' => 'menu',
                'method' => 'menu',
                'level' => 1
            ],
            'en' => [
                'module' => 'menu',
                'method' => 'menu',
                'level' => 1
            ],
        ];

        $menu = [];

        if (!empty($id)) {
            $menu = AdminMenus::with('permission')->find($id);

            $o_slug = new SlugController;
            $meta = $o_slug->getMetadata($metadata['th']['module'], $metadata['th']['method'], $id);
            if (!empty($meta)) {
                $metadata  = $meta;
            }

            $mode = 'edit';
        }

        $parents = AdminMenus::all()->totree();
        $parents = mwz_setFlatCategory($parents);
        // print_r($menu);
        $lang = Lang::get('menu::module');
        $icons = $this->IconsClassList();
        return view('mwz::menu.form', ['data' => $menu, 'parents' => $parents, 'config' => $this->config['menu'], 'type' => $this->config['type'], 'location' => $this->config['location'], 'category_link' => $this->config['category_link'], 'metadata' => $metadata, 'lang' => $lang, 'mode' => $mode, 'icons' => $icons]);
    }

    /**
     * Function : menu save
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {
        //validate post data
        $validator = Validator::make($request->all(), [
            'id' => 'integer',
            'name_th' => 'required|max:255',
            'name_en' => 'required|max:255',
        ],
        [
            'name_th.required' => 'โปรดรุะบุชื่อหัวข้อภาษาไทย',
            'name_en.required' => 'โปรดระบุชื่อหัวข้อภาษาอังกฤษ',
        ]

    );

        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $errors->first(), 'error' => $errors];
            return response()->json($resp);
        }
        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "link_type" => $request->get('link_type'),
            "icon" => $request->get('icon'),
            "route_name" => (int)($request->get('route_name')) > 0  ? $this->getPermissionById($request->get('route_name'))  : $request->get('route_name'),
            "url" => $request->get('url'),
            "params" => $request->get('params'),
            "location" => $request->get('location'),
            "status" => !empty($request->get('status')) ? $request->get('status') : 0,
            "parent_id" => $request->get('parent_id')
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_filename = time() . "." . $image->extension();
            $path = $image->storeAs(
                'public/menu-menus',
                $new_filename
            );
            $attributes['image'] = Storage::url($path);
        } else {
            if (!empty($request->image_old)) {
                $attributes['image'] = $request->image_old;
                // delete old file
                if ($request->get('image_del')) {
                    $remove_file = 'public/menu-menus' . $request->image_old;
                    if (Storage::disk('public')->exists($remove_file)) {
                        Storage::disk('public')->delete($remove_file);
                    }
                    $attributes['image'] = '';
                }
            } else {
                $attributes['image'] = '';
            }
        }

        if (!empty($request->get('id'))) {
            $data_id = $request->get('id');
            $node = AdminMenus::where('id',  $data_id)->update($attributes);
            AdminMenus::fixTree();
            $resp = ['success' => 1, 'code' => 201, 'msg' => __('mwz::menu.menu_admin_admin.save_success')];
        } else {

            $sequence = AdminMenus::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;

            $node = AdminMenus::create($attributes);
            $data_id = $node->id;

            $this->re_order();
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::menu.menu_admin_admin.save_success')];
        }

        return response()->json($resp);
    }

    /**
     * Function : re_order
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of response
     */
    public function re_order()
    {
        $all_cat = AdminMenus::orderBy('_lft', 'asc')->get();
        $cnt = 0;
        foreach ($all_cat as $cat) {
            $cnt++;
            $cat->sequence = $cnt;
            $cat->save();
        }
    }

    /**
     * Function : move node
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of response
     */
    public function sort(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $move = $request->get('move');
            $node = AdminMenus::find($id);
            $is_move = false;
            if ($move == 'up') {
                $is_move = $node->up();
            }

            if ($move == 'down') {
                $is_move = $node->down();
            }

            $this->re_order();

            if ($is_move) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::menu.menu_admin_admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('mwz::menu.menu_admin_admin.error_try_again')];
            }


            return response()->json($resp);
        }
    }


    /**
     * Function :  set_re_order
     * Dev : Tong
     * Update Date : 21 July 2022
     * @param POST
     * @return json response update sequence status
     */
    public function set_move_node(Request $request)
    {
        if ($request->ajax()) {

            if (!empty($request->get('node_id')) && !empty($request->get('next_by'))) {
                $node = AdminMenus::find($request->get('node_id'));
                $neighbor = AdminMenus::find($request->get('next_by'));
                // $move_status = $node->prependToNode($parent)->save(); 
                $move_status = $node->afterNode($neighbor)->save();
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::menu.menu_admin_admin.order_success'), 'move_status' => $move_status];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('mwz::menu.menu_admin_admin.no_need_order')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function :  get vendor
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response update content up
     */
    public function get_menu(Request $request)
    {

        $menus = AdminMenus::withDepth()->defaultOrder()->get();

        $result = [];
        foreach ($menus as $menu) {
            $showname = str_repeat(' - ', $menu->depth) . $menu->name_th;
            $result[] = [
                'id' => $menu->id,
                'text' => $showname,
                'image' => $menu->image
            ];
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success', 'results' => $result];

        return response()->json(
            $resp,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }


    public function get_permission(Request $request)
    {
        $permissions =  UserPermissions::orderBy('name', 'asc')->get();
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = [
                'id' => $permission->id,
                'text' => $permission->name,
            ];
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success', 'results' => $result];

        return response()->json(
            $resp,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }


      /**
     * Function :  get permission By id
     * Dev : wan
     * Update Date : 27 Dec 2022
     * @param POST
     * @return json response update content up
     */

    public function getPermissionById($id){
        $permissions =  UserPermissions::find($id);
        return $permissions->name;
    }
}
