<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\About\Entities\AboutDetail;
use Illuminate\Support\Facades\Validator;

class AboutDetailController extends Controller
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
            $about = AboutDetail::find($id);
            if (!empty($about->detail_th)) {
                $about->detail_th = mwz_getTextString($about->detail_th);
            }
            if (!empty($about->detail_en)) {
                $about->detail_en = mwz_getTextString($about->detail_en);
            }
        }
        return view('about::about.index', ['about' => $about]);
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
            'detail_th' => 'required',
            'detail_en' => 'required',
        ],[
            'detail_th.*' => 'โปรดระบุรายละเอียดภาษาไทย',
            'detail_en.*' => 'โปรดระบุรายละเอียดภาษาอังกฤษ',
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
            "status" => "1"
        ];
        // upload image
        $image = set_image_upload($request, 'image', $path = "public/about", "image-");
        if ($image) {
            $attributes['image'] = $image;
        }
        if (!empty($request->get('id'))) {
            $About = AboutDetail::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $About = AboutDetail::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มรายการใหม่สำเร็จ'];
        }

        return response()->json($resp);
    }

      /**
     * Function : delete image
     * Dev : WAN
     * Update Date : 25 Aug 2022
     * @param POST
     * @return json of response
     */
    public function delete_image(Request $request)
    {
        if ($request->ajax()) {
            $webset = AboutDetail::find($request->get("id"));
            $webset->image = "";
            if ($webset->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
        }
    }
}
