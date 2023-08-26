<?php

namespace Modules\WebSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Modules\Mwz\Http\Controllers\SlugController;
use Modules\WebSetting\Entities\ApiAnalytic;
use Modules\WebSetting\Entities\SettingsOther;
use Modules\WebSetting\Entities\TagAnalytic;
use Modules\WebSetting\Entities\WebSettings;

class WebSettingController extends Controller
{
    public function getWebsetting()
    {
        $setting = WebSettings::find(1);
        $data = [];
        if (!empty($setting)) {
            $data['logo']['header'] = $setting->logo_header;
            $data['logo']['footer'] = $setting->logo_footer;
            $data['link_login'] = $setting->link_login;
            $data['logo_favicon'] = $setting->logo_favicon;
        }
        return $data;
    }
    public function getMeta()
    {
        $setting = WebSettings::find(1);
        $data = [];
        if (!empty($setting)) {
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['title'] = $setting->meta_title_th;
                $data['keywords'] = $setting->meta_keywords_th;
                $data['description'] = $setting->meta_description_th;
            } else {
                $data['title'] = $setting->meta_title_en;
                $data['keywords'] = $setting->meta_keywords_en;
                $data['description'] = $setting->meta_description_en;
            }
            $data['seo_image'] = $setting->seo_image;
           
        }
        return $data;
    }

    public function getTag()
    {
        $tag = TagAnalytic::where('status', 1)->get();
        $data = [];
        if (!empty($tag)) {
            foreach ($tag as $value) {
                array_push($data, [
                    'head' => mwz_getTextString($value->head),
                    'body' => mwz_getTextString($value->body),
                    'footer' => mwz_getTextString($value->footer)
                ]);
            }
        }
        return $data;
    }

    public function getRegister()
    {
        $slug = '';
        $o_slug = new SlugController;
        $o_slug = $o_slug->getSlugUrl('register', 'register', 1);
        if (!empty($o_slug['url'])) {
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $slug = URL::to($o_slug['url']['th']);
            } else {
                $slug = URL::to($o_slug['url']['en']);
            }
        }
        return $slug;
    }
}
