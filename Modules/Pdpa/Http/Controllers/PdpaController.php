<?php

namespace Modules\Pdpa\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Pdpa\Entities\Pdpas;
use Modules\Pdpa\Entities\PdpaDetails;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Modules\Mwz\Http\Controllers\SlugController;

class PdpaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('pdpa::index');
    }

    /**
     * Function :  check_accept
     * Dev : jang
     * Update Date : 12 October 2021
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function checkAccepted(Request $request, $status = 0)
    {
        $member_id = "1";
        $attributes = [
            "member_id" => $member_id,
            "pdpa_ip" => $this->getUserIpAddr(),
            "pdpa_user_agent" => $request->server('HTTP_USER_AGENT'),
            "pdpa_user_status" => $status,
        ];
        PdpaDetails::create($attributes);

        Cookie::queue(Cookie::make('policy', $status));

        $value = $request->cookie('policy');

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'insert competet'];
        return response()->json($resp);
    }

    /**
     * Function :  getUserIpAddr
     * Dev : jang
     * Update Date : 12 October 2021
     */
    public function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * Function :  getPdpa
     * Dev : wan
     * Update Date : 15 Aug 2022
     */
    public function getPdpa()
    {
        $o_pdpa = Pdpas::find(1);
        if (!empty($o_pdpa)) {
            $data['id'] = $o_pdpa->id;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['title'] = $o_pdpa->pdpa_title_th;
                $data['detail'] = mwz_getTextString($o_pdpa->pdpa_detail_long_th);
            } else {
                $data['title'] = $o_pdpa->pdpa_title_en;
                $data['detail'] = mwz_getTextString($o_pdpa->pdpa_detail_long_en);
            }
        }
        return $data;
    }

    /**
     * Function :  getPdpaShort
     * Dev : wan
     * Update Date : 15 Aug 2022
     */
    public function getPdpaShort()
    {
        $o_slug = new SlugController;
        $data = [];
        $o_pdpa = Pdpas::find(1);
        if (!empty($o_pdpa)) {
            $data['id'] = $o_pdpa->id;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['title'] = $o_pdpa->pdpa_title_th;
                $data['detail'] = limit(strip_tags(mwz_getTextString($o_pdpa->pdpa_detail_th)), 200);
            } else {
                $data['title'] = $o_pdpa->pdpa_title_en;
                $data['detail'] = limit(strip_tags(mwz_getTextString($o_pdpa->pdpa_detail_en)), 200);
            }
            $slug = $o_slug->getSlugUrl('policy', 'policy', $o_pdpa->id);
            if (!empty($slug['url'])) {
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                } else {
                    $data['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                }
            }
        }
        return $data;
    }
}
