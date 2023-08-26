<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Modules\Banner\Entities\Banner;
use Modules\Banner\Entities\BannerAds;
use Modules\Banner\Entities\Banners;
use Modules\Menu\Entities\Menus;

class BannerController extends Controller
{
    /**
     * Function : Get Banners By Type
     * Dev : wan
     * Update Date : 16 Aug. 2022
     * @param POST
     * @return array of banner
     */
    public function getBannersByType($type, $start = 0, $length = 4, $sort = 'sequence', $direction = 'ASC')
    {
        $o_banner = Banners::where('status', 1)->where('type', $type)->orderBy($sort, $direction)->offset($start)->limit($length)->get();
        $data = [];
        if (!empty($o_banner)) {
            foreach ($o_banner as $k => $data_banner) {
                $data[$k]['id'] = $data_banner->id;
                $data[$k]['location'] = $data_banner->location;
                $data[$k]['link'] = $data_banner->link;
                $data[$k]['image'] =  $data_banner->image;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $data_banner->name_th;
                    $data[$k]['description'] = mwz_getTextString($data_banner->description_th);
                } else {
                    $data[$k]['name'] = $data_banner->name_en;
                    $data[$k]['description'] = mwz_getTextString($data_banner->description_en);
                }
            }
        }
        return $data;
    }

    /**
     * Function : Get Banners By Type
     * Dev : wan
     * Update Date : 16 Aug. 2022
     * @param POST
     * @return array of banner
     */
    public function getBannersByCategoryId($category_id, $start = 0, $length = 4, $sort = 'sequence', $direction = 'ASC')
    {
        // ->offset($start)->limit($length)
        $o_banner = Banners::where('status', 1)->where('category_id', $category_id)->orderBy($sort, $direction)->get();
        $data = [];
        if (!empty($o_banner)) {
            foreach ($o_banner as $k => $data_banner) {
                $data[$k]['id'] = $data_banner->id;
                $data[$k]['location'] = $data_banner->location;
                $data[$k]['link'] = $data_banner->link;
                $data[$k]['image'] =  $data_banner->image;
                $data[$k]['type'] = $data_banner->type;
                $data[$k]['url_video'] = $data_banner->url_video;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $data_banner->name_th;
                    // $data[$k]['description'] = mwz_getTextString($data_banner->description_th);
                } else {
                    $data[$k]['name'] = $data_banner->name_en;
                    // $data[$k]['description'] = mwz_getTextString($data_banner->description_en);
                }
            }
        }
        return $data;
    }

    public function getBanner()
    {
        $data = [];
        $o_banner = Banner::where('status', 1)->orderBy('sequence')->limit(4)->get();
        if (!empty($o_banner)) {
            foreach ($o_banner as $k => $value) {
                $data[$k]['id'] = $value->id;
                $data[$k]['image'] = $value->image;
                $data[$k]['link'] = $value->link;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $value->name_th;
                    $data[$k]['desc'] = mwz_getTextString($value->description_th);
                } else {
                    $data[$k]['name'] = $value->name_en;
                    $data[$k]['desc'] = mwz_getTextString($value->description_en);
                }
            }
        }
        return $data;
    }

  /**
     * Function : Get Banners By Type
     * Dev : wan
     * Update Date : 16 Aug. 2022
     * @param POST
     * @return array of banner
     */
    public function getBannersAdsByCategoryId($category_id, $start = 0, $length = 4, $sort = 'sequence', $direction = 'ASC')
    {
        $o_banner = BannerAds::where('status', 1)->where('category_id', $category_id)->orderBy($sort, $direction)->get();
        $data = [];
        if (!empty($o_banner)) {
            foreach ($o_banner as $k => $data_banner) {
                $data[$k]['id'] = $data_banner->id;
                $data[$k]['link'] = $data_banner->link;
                $data[$k]['image'] =  $data_banner->image;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $data_banner->name_th;
                    $data[$k]['description'] = mwz_getTextString($data_banner->description_th);
                } else {
                    $data[$k]['name'] = $data_banner->name_en;
                    $data[$k]['description'] = mwz_getTextString($data_banner->description_en);
                }
            }
        }
        return $data;
    }

     /**
     * Function : Get Banners By Type
     * Dev : wan
     * Update Date : 16 Aug. 2022
     * @param POST
     * @return array of banner
     */
    public function getBannersByMenuId($menu_id, $sort = 'sequence', $direction = 'ASC')
    {
        $o_banner = Banners::where('status', 1)->where('menu_id', $menu_id)->orderBy($sort, $direction)->get();
        $data = [];
        if (!empty($o_banner)) {
            foreach ($o_banner as $k => $data_banner) {
                $data[$k]['id'] = $data_banner->id;
                $data[$k]['location'] = $data_banner->location;
                $data[$k]['link'] = $data_banner->link;
                $data[$k]['image'] =  $data_banner->image;
                $data[$k]['type'] = pathinfo($data_banner->image , PATHINFO_EXTENSION );
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $data_banner->name_th;
                } else {
                    $data[$k]['name'] = $data_banner->name_en;
                }
            }
        }
        return $data;
    }
}
