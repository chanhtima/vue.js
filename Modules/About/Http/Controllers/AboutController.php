<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Modules\About\Entities\AboutDetail;
use Modules\About\Entities\Abouts;

class AboutController extends Controller
{
    public function getAboutusIndex(){
        $about = AboutDetail::where('status',1)->first();
        if(!empty($about)){
            // foreach($about as $kk => $val){
                $data['image'] = $about->image;
                if (empty(App::currentLocale()) || App::currentLocale() == 'en') {
                    $data['detail'] = mwz_getTextString($about->detail_en);
                } else {
                    $data['detail'] = mwz_getTextString($about->detail_th);
                }
            // }
        }
        return $data;
    }

    public function getAboutus(){
        $about = Abouts::where('status',1)->first();
        if(!empty($about)){
            if (empty(App::currentLocale()) || App::currentLocale() == 'en') {
                $data['desc'] = mwz_getTextString($about->description_th);
            } else {
                $data['desc'] = mwz_getTextString($about->description_th);
            }
        }
        return $data;
    }
}
