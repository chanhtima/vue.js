<?php

namespace Modules\Content\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Modules\Content\Entities\Content;
use Modules\Mwz\Http\Controllers\SlugController;

class ContentController extends Controller
{

    public function getContentsByTypeAll($type = "", $paginate = 1)
    {
        $data = [];
        $o_slug = new SlugController;
        $contents = "";
        if ($type != "") {
            $contents =  Content::where('status', 1)->where('type', $type)->orderBy('start_at', 'desc')->orderBy('sequence', 'ASC')->paginate($paginate);
            if (!empty($contents)) {
                foreach ($contents as $k => $item) {
                    $slug = $o_slug->getSlugUrl('content', $type, $item->id);
                    $data[$k]['id'] = $item->id;
                    $data[$k]['image'] = $item->image;
                    $data[$k]['id'] = $item->id;
                    $data[$k]['file'] = $item->file;
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $data[$k]['name'] = $item->name_th;
                        $data[$k]['desc'] = mwz_getTextString($item->desc_th);
                        $data[$k]['start_at'] = !empty($item->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $item->start_at)->format('d.m.Y')  : '';
                        $data[$k]['detail'] = mwz_getTextString($item->detail_th);
                    } else {
                        $data[$k]['name'] = $item->name_en;
                        $data[$k]['desc'] = mwz_getTextString($item->desc_en);
                        $data[$k]['start_at'] = !empty($item->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $item->start_at)->format('d.m.Y')  : '';
                        $data[$k]['detail'] = mwz_getTextString($item->detail_en);
                    }
                    if (!empty($slug)) {
                        if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                            $data[$k]['url'] = URL::to($slug['url']['th']);
                        } else {
                            $data[$k]['url'] = URL::to($slug['url']['en']);
                        }
                    }
                }
            }
        }
        return ['res' => $data,'page' => $contents];
    }

    public function getContentsfindId($id)
    {
        $data = [];
        $o_slug = new SlugController;
        $contents = "";
            $contents =  Content::find($id);
            if (!empty($contents)) {
                    $data['id'] = $contents->id;
                    $data['image'] = $contents->image;
                    $data['id'] = $contents->id;
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $data['name'] = $contents->name_th;
                        $data['desc'] = mwz_getTextString($contents->desc_th);
                        $data['start_at'] = !empty($contents->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $contents->start_at)->format('d.m.Y')  : '';
                        $data['detail'] = mwz_getTextString($contents->detail_th);
                    } else {
                        $data['name'] = $contents->name_en;
                        $data['desc'] = mwz_getTextString($contents->desc_en);
                        $data['start_at'] = !empty($contents->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $contents->start_at)->format('d.m.Y')  : '';
                        $data['detail'] = mwz_getTextString($contents->detail_en);
                    }
            }
        return $data;
    }
    public function getContentsByType($type = "", $st_index = 0)
    {
        $data = [];
        $o_slug = new SlugController;
        if ($type != "") {
            $contents =  Content::where('status', 1)->where('status_index', $st_index)->where('type', $type)->orderBy('start_at', 'desc')->orderBy('sequence', 'ASC')->get();
            if (!empty($contents)) {
                foreach ($contents as $k => $item) {
                    $slug = $o_slug->getSlugUrl('content', $type, $item->id);
                    $data[$k]['id'] = $item->id;
                    $data[$k]['image'] = $item->image;
                    $data[$k]['id'] = $item->id;
                    $data[$k]['file'] = $item->file;
                    $data[$k]['link'] = $item->link;
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $data[$k]['name'] = $item->name_th;
                        $data[$k]['desc'] = $item->desc_th;
                        $data[$k]['start_at'] = !empty($item->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $item->start_at)->format('d.m.Y')  : '';
                        $data[$k]['detail'] = mwz_getTextString($item->detail_th);
                    } else {
                        $data[$k]['name'] = $item->name_en;
                        $data[$k]['desc'] = $item->desc_en;
                        $data[$k]['start_at'] = !empty($item->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $item->start_at)->format('d.m.Y')  : '';
                        $data[$k]['detail'] = mwz_getTextString($item->detail_en);
                    }
                    if (!empty($slug)) {
                        if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                            $data[$k]['url'] = URL::to($slug['url']['th']);
                        } else {
                            $data[$k]['url'] = URL::to($slug['url']['en']);
                        }
                    }
                }
            }
        }
        return $data;
    }

}
