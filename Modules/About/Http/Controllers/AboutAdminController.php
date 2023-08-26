<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Modules\About\Entities\Abouts;

class AboutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('about::index');
    }

    /**
     * Function : add about form
     * Dev : jang
     * Update Date : 19 october 2021
     * @param GET
     * @return banner form view
     */
    public function form_about($id = 1)
    {
        $about = [];

        if (!empty($id)) {
            $about = Abouts::find($id);
            if (!empty($about->description_th)) {
                $about->description_th = mwz_getTextString($about->description_th);
            }
            if (!empty($about->description_en)) {
                $about->description_en = mwz_getTextString($about->description_en);
            }
            if (!empty($about->detail_th)) {
                $about->detail_th = mwz_getTextString($about->detail_th);
            }
            if (!empty($about->detail_en)) {
                $about->detail_en = mwz_getTextString($about->detail_en);
            }
        }
        return view('about::index', ['about' => $about]);
    }

    /**
     * Function :  about save
     * Dev : pop
     * Update Date : 11 Jul 2021
     * @param POST
     * @return json response status
     */
    public function save_about(Request $request)
    {
        //Check input is null
        //validate post data
        $validator = Validator::make($request->all(), [
            'id' => 'integer',
            'description_th' => 'required',
            'description_en' => 'required',
        ],[
            'description_th.*' => 'โปรดระบุรายละเอียดภาษาไทย',
            'description_en.*' => 'โปรดระบุรายละเอียดภาษาอังกฤษ',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $focus = $validator->errors()->keys()[0];
            $resp = ['success' => 0, 'code' => 301, 'msg' => $errors->first(), 'error' => $errors,"focus" => $focus];
            return response()->json($resp);
        }
        $attributes = [
            "detail_th" => mwz_setTextString($request->get('detail_th')),
            "detail_en" => mwz_setTextString($request->get('detail_en')),
            "description_th" => mwz_setTextString($request->get('description_th')),
            "description_en" => mwz_setTextString($request->get('description_en')),
            "status" => "1"
        ];

        if (!empty($request->get('id'))) {
            $About = Abouts::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $About = Abouts::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มรายการใหม่สำเร็จ'];
        }

        return response()->json($resp);
    }
}
