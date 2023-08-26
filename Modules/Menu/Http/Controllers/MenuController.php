<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Modules\Menu\Entities\Menus;
use Modules\Mwz\Http\Controllers\SlugController;
use Modules\Products\Http\Controllers\ProductController;

class MenuController extends Controller
{
    public function getHeadMenu()
    {
        $query = Menus::with('slug')->where('parent_id', '=', null)->where('type', '=', 1)->where('status', 1)->orderBy('sequence')->get();
        $data = [];
        $o_slug = new SlugController;
        $o_product = new ProductController;
        if ($query) {
            foreach ($query as $k => $val) {
                $data[$k]['id'] = $val->id;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $val->name_th;
                } else {
                    $data[$k]['name'] = $val->name_en;
                }
                if ($val->link_type == 1) {

                    $slug = $o_slug->getSlugById($val->slug_id);
                    if (!empty($slug['url'])) {
                        if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                            $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                        } else {
                            $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                        }
                    }
                } else {
                    $data[$k]['url'] = $val->url;
                }
                if ($val->id == 4) {
                    $data[$k]['sub'] = $o_product->getProductMenu();
                }
            }
        }
        // dd($data);
        return $data;
    }
    public function findMenuID($id)
    {
        $o_slug = new SlugController;
        $menu = Menus::find($id);
        $data = [];
        if ($menu) {
            $data['id'] = $menu->id;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['name'] = $menu->name_th;
                $data['desc'] = mwz_getTextString($menu->desc_th);
            } else {
                $data['name'] = $menu->name_en;
                $data['desc'] = mwz_getTextString($menu->desc_en);
            }
            if ($menu->link_type == 1) {

                $slug = $o_slug->getSlugById($menu->slug_id);
                if (!empty($slug['url'])) {
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $data['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                    } else {
                        $data['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                    }
                }
            } else {
                $data['url'] = $menu->url;
            }
        }
        return $data;
    }

    public function getFootMenu()
    {
        $query = Menus::with('slug')->where('parent_id', '=', null)->where('show_location', '=', 1)->where('status', 1)->orderBy('sequence')->get();
        $data = [];
        $o_slug = new SlugController;
        $o_product = new ProductController;
        if ($query) {
            foreach ($query as $k => $val) {
                $data[$k]['id'] = $val->id;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $val->name_th;
                } else {
                    $data[$k]['name'] = $val->name_en;
                }
                if ($val->link_type == 1) {

                    $slug = $o_slug->getSlugById($val->slug_id);
                    if (!empty($slug['url'])) {
                        if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                            $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                        } else {
                            $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                        }
                    }
                } else {
                    $data[$k]['url'] = $query->url;
                }
            }
        }
        $response['data'] = $data;
        // $response['category'] = $o_product->getCategoryMenu(true);
        return $response;
    }
}
