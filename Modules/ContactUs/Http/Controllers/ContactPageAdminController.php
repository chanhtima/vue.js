<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\ContactUs\Entities\ContactPages;
use Modules\Mwz\Http\Controllers\SlugController;

class ContactPageAdminController extends Controller
{
    /**
     * Function : add contact_page form
     * Dev : Jang
     * Update Date : 26 october 2021
     * @param GET
     * @return category form view
     */
    public function form()
    {
        $data = [];
        $data = ContactPages::find(1);
        if (!empty($data)) {
            $data->office_th = mwz_getTextString($data->office_th);
            $data->office_en = mwz_getTextString($data->office_en);
        }
        $o_slug = new SlugController;
        $metadata = $o_slug->getMetadata('contact', 'contact', 1);
        // dd($data);
        return view('contactus::page.form', ['data' => $data, 'metadata' => $metadata]);
    }

    /**
     * Function :  save contact page save
     * Dev : Jang
     * Update Date : 26 october 2021
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {

        if (!mwz_roles('admin.contactus.page.save')) {
            $resp = ['error' => 0, 'code' => 301, 'msg' => 'ไม่มีสิทธิ์การเข้าถึง!'];
            return response()->json($resp);
        }

        $o_slug = new SlugController;
        if (!empty($o_slug->validatorSlug($request))) {
            $error = $o_slug->validatorSlug($request);
            $resp = ['success' => 0, 'code' => 301, 'msg' => $error['msg']];
            return response()->json($resp);
        }
        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "office_th" => mwz_setTextString($request->get('office_th')),
            "office_en" => mwz_setTextString($request->get('office_en')),
            "phone" => $request->get('phone'),
            "email" => $request->get('email'),
            "facebook" => $request->get('facebook'),
            "youtube" => $request->get('youtube'),
            "line" => $request->get('line'),
            "tiktok" => $request->get('tiktok'),
            "ig" => $request->get('ig'),
            "gmaps" => $request->get("gmaps"),
        ];
        // $attributes['qr_code'] = set_image_upload($request,'qr_code','public/contact','contact-');
        $attr = ['id' => (!empty($request->get('id')) ? $request->get('id') : 1)];
        $contact = ContactPages::updateOrCreate($attr, $attributes);
        $o_slug->createMetadata($request, $contact->id);
        if ($contact->save()) {
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $resp = ['success' => 0, 'code' => 200, 'msg' => 'เกิดข้อผิดพลาด โปรดลองอีกครั้ง'];
        }

        return response()->json($resp);
    }
}
