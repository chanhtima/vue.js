<?php

namespace Modules\WebSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use Modules\Mwz\Http\Controllers\MwzController;
use Yajra\DataTables\Facades\DataTables;
use Modules\WebSetting\Entities\WebSettings;

class WebSettingAdminController extends Controller
{
    /**
     * Function : __construct check admin login
     * Dev : pop
     * Update Date : 14 Jul 2021
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Function : add con$contactus form
     * Dev : pop
     * Update Date : 04 August 2021
     * @param GET
     * @return category form view
     */
    public function form($id = 1)
    {

        $setting = $other = [];
        if (!empty($id)) {
            $setting = WebSettings::find($id);
        }
        return view('websetting::form', ['setting' => $setting,'other' => $other]);
    }

    /**
     * Function :  websettings save
     * Dev : Poom
     * Update Date : 19 Jan 2022
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {
        if (!mwz_roles('admin.setting.websetting.save')) {
            $resp = ['error' => 0, 'code' => 301, 'msg' => 'ไม่มีสิทธิ์การเข้าถึง!'];
            return response()->json($resp);
        }
        $attributes = [
            "link_login" => $request->get('link_login'),
            'meta_title_th' => $request->get('meta_title_th'),
            'meta_keywords_th' => $request->get('meta_keywords_th'),
            'meta_description_th' => $request->get('meta_description_th'),
            'meta_title_en' => $request->get('meta_title_en'),
            'meta_keywords_en' => $request->get('meta_keywords_en'),
            'meta_description_en' => $request->get('meta_description_en'),

        ];
        if ($request->hasFile('logo_header')) {
            $image = $request->file('logo_header');
            $new_filename = time() . "header." . $image->extension();
            $path = $image->storeAs(
                'public/websetting',
                $new_filename
            );
            $attributes['logo_header'] = Storage::url($path);
            if (!empty($request->get('logo_header_old'))) {
                $old_path = str_replace('storage', 'public', $request->get('logo_header_old'));
                Storage::delete($old_path);
            }
        } else {
            if (!empty($request->get('logo_header_del')) && $request->get('logo_header_del') == 1) {
                $old_path = str_replace('storage', 'public', $request->get('logo_header_old'));
                Storage::delete($old_path);
                $attributes['logo_header'] = '';
            }
        }

        if ($request->hasFile('logo_footer')) {
            $image = $request->file('logo_footer');
            $new_filename = time() . "footer." . $image->extension();
            $path = $image->storeAs(
                'public/websetting',
                $new_filename
            );
            $attributes['logo_footer'] = Storage::url($path);
            if (!empty($request->get('logo_footer_old'))) {
                $old_path = str_replace('storage', 'public', $request->get('logo_footer_old'));
                Storage::delete($old_path);
            }
        } else {
            if (!empty($request->get('logo_footer_del')) && $request->get('logo_footer_del') == 1) {
                $old_path = str_replace('storage', 'public', $request->get('logo_footer_old'));
                Storage::delete($old_path);
                $attributes['logo_footer'] = '';
            }
        }

        if ($request->hasFile('seo_image')) {
            $image = $request->file('seo_image');
            $new_filename = time() . "seo." . $image->extension();
            $path = $image->storeAs(
                'public/websetting',
                $new_filename
            );
            $attributes['seo_image'] = Storage::url($path);
            if (!empty($request->get('seo_image_old'))) {
                $old_path = str_replace('storage', 'public', $request->get('seo_image_old'));
                Storage::delete($old_path);
            }
        } else {
            if (!empty($request->get('seo_image_del')) && $request->get('seo_image_del') == 1) {
                $old_path = str_replace('storage', 'public', $request->get('seo_image_old'));
                Storage::delete($old_path);
                $attributes['seo_image'] = '';
            }
        }

        if ($request->hasFile('logo_favicon')) {
            $image = $request->file('logo_favicon');
            $new_filename = time() . "logo_favicon." . $image->extension();
            $path = $image->storeAs(
                'public/websetting',
                $new_filename
            );
            $attributes['logo_favicon'] = Storage::url($path);
            if (!empty($request->get('logo_favicon_old'))) {
                $old_path = str_replace('storage', 'public', $request->get('logo_favicon_old'));
                Storage::delete($old_path);
            }
        } else {
            if (!empty($request->get('logo_favicon_del')) && $request->get('logo_favicon_del') == 1) {
                $old_path = str_replace('storage', 'public', $request->get('logo_favicon_old'));
                Storage::delete($old_path);
                $attributes['logo_favicon'] = '';
            }
        }
        // save other
           $this->saveSettingOther($request,$request->get('id'));
        if (!empty($request->get('id'))) {
            $setting = WebSettings::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'อัปเดตข้อมูลสำเร็จ'];
        } else {
            $setting = WebSettings::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกข้อมูลสำเร็จ'];
        }

        return response()->json($resp);
    }

 /**
     * Function :  websettings save
     * Dev : Wan
     * Update Date : 19 Jan 2022
     * @param POST
     * @return json response status
     */
    public function saveSettingOther(Request $request,$web_id){
        if (!mwz_roles('admin.setting.websetting.save')) {
            $resp = ['error' => 0, 'code' => 301, 'msg' => 'ไม่มีสิทธิ์การเข้าถึง!'];
            return response()->json($resp);
        }

        $attributes = [
            'websetting_id' => $web_id,
            'text_predict_th_1' => mwz_setTextString($request->get('text_predict_th_1')) ,
            'text_predict_en_1' => mwz_setTextString($request->get('text_predict_en_1')),
        ];
        if (!empty($request->get('other_id'))) {
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'อัปเดตข้อมูลสำเร็จ'];
        } else {
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกข้อมูลสำเร็จ'];
        }
    }

    /**
     * Function : add con$contactus form
     * Dev : pop
     * Update Date : 04 August 2021
     * @param GET
     * @return category form view
     */
    public function form_privacy($id = 1)
    {
        $privacy = [];
        if (!empty($id)) {
            $privacy = WebSettings::find($id);
            $privacy->privacy_th = mwz_getTextString($privacy->privacy_th);
            $privacy->privacy_en = mwz_getTextString($privacy->privacy_en);
        }
        return view('websetting::form_privacy', ['privacy' => $privacy]);
    }

    /**
     * Function :  websettings save form privacy
     * Dev : pop
     * Update Date : 8 August 2021
     * @param POST
     * @return json response status
     */
    public function save_privacy(Request $request)
    {
        //validate post data
        if (empty($request->get('id'))) {
            $validator = Validator::make($request->all(), [
                'privacy_th' => 'required',
                'privacy_en' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'privacy_th' => 'required',
                'privacy_en' => 'required',
            ]);
        }


        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 301, 'msg' => 'error', 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "privacy_th" => mwz_setTextString($request->get('privacy_th')),
            "privacy_en" => mwz_setTextString($request->get('privacy_en')),
        ];

        if (!empty($request->get('id'))) {
            $privacy = WebSettings::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'อัปเดตข้อมูลสำเร็จ'];
        } else {
            $privacy = WebSettings::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกข้อมูลสำเร็จ'];
        }

        return response()->json($resp);
    }

    /**
     * Function : delete image
     * Dev : Ta
     * Update Date : 25 Aug 2021
     * @param POST
     * @return json of response
     */
    public function delete_image(Request $request)
    {
        if ($request->ajax()) {

            $webset = WebSettings::find(1);

            switch ($request->id) {
                case "1":
                    $webset->logo_header = '';
                    break;
                case "2":
                    $webset->img_payment_footer = '';
                    break;
                case "3":
                    $webset->img_delivery_1_footer = '';
                    break;
                case "4":
                    $webset->img_delivery_2_footer = '';
                    break;
                case "5":
                    $webset->img_delivery_3_footer = '';
                    break;
                case "6":
                    $webset->logo_favicon = '';
                    break;
                case "7":
                    $webset->seo_image = '';
                    break;
            }

            if ($webset->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
        }
    }
}
