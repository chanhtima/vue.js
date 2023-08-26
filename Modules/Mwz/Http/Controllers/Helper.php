<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Modules\ContactUs\Http\Controllers\ContactUsController;
use Modules\Course\Entities\CourseGroup;
use Modules\Mwz\Entities\Cities;
use Modules\Mwz\Entities\Districts;
use Modules\Mwz\Entities\Provinces;
use Modules\Mwz\Entities\AdminMenus;
use Modules\Product\Entities\ProductAndRelate;
use Modules\Product\Entities\ProductGrading;
use Modules\User\Entities\RolesAndPermissions;
use Modules\User\Http\Controllers\RoleController;
use Modules\WebSetting\Entities\WebSettings;

function mwz_test()
{
    echo 'test';
}


function pre($a)
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

function mwz_setFlatCategory($categories)
{
    $traverse = function ($categories, $prefix = '-', $level = 0, &$result = []) use (&$traverse) {
        foreach ($categories as  $category) {
            $category->level = $level;

            if ($level > 0) {
                $show_prefix = str_pad('', $level, $prefix);
                $category->name =  $show_prefix . ' ' . $category->name;
            }
            if (!empty($category->children)) {
                $new_category = $category;
                unset($new_category->children);
                $result[$category->id] = $new_category;
                $traverse($category->children, '-', $level + 1, $result);
            } else {
                $result[$category->id] = $category;
            }
        }
        return $result;
    };

    return $traverse($categories);
}

function mwz_getTextString($str)
{
    return htmlspecialchars_decode(html_entity_decode($str));
}

function mwz_setTextString($str)
{
    return htmlentities(htmlspecialchars($str));
}

/* Check File In Server */
function CheckFileInServer($file)
{
    // echo $_SERVER['DOCUMENT_ROOT'] . parse_url($file, PHP_URL_PATH) ;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . parse_url($file, PHP_URL_PATH))) {
        return true;
    } else {
        return false;
    }
}

function limit($value, $limit = 100, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }
    if (strlen($value) < $limit) {
        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8'));
    } else {
        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
    }
}
function setPagination($page = 1, $totel = 1)
{
    $data = [];
    if ($totel <= 6) {
        $f = 0;
        for ($i = 1; $i <= $totel; $i++) {
            $data[$f++] = $i;
        }
    } else {
        if ($page < 5) {
            $f = 0;
            for ($i = 1; $i <= 5; $i++) {
                $data[$f] = $i;
                $f++;
            }
            $data[$f] = '...';
            $data[++$f] = $totel;
        }
        if ($page > $totel - 4) {
            $data[0] = 1;
            $data[1] = '...';
            $h = 2;
            for ($i = $totel - 4; $i <= $totel; $i++) {
                $data[$h] = $i;
                $h++;
            }
        }
        if ($page >= 5 && $page <= $totel - 4) {
            $data[0] = 1;
            $data[1] = '...';
            $r = 2;
            for ($l = $page - 1; $l <= $page + 1; $l++) {
                $data[$r] = $l;
                $r++;
            }
            $data[$r] = '...';
            $data[++$r] = $totel;
        }
    }
    return $data;
}

function mwz_calParentCourseGroup($parent)
{

    if ($parent == '') {
        $level = 1;
    } else {
        $i = 2;
        $id = '';
        while ($i > 0) {
            $level = $i;
            if ($i == 2) {
                $course_group = CourseGroup::find($parent);
                $id = $course_group->parent_id;
            } else {
                $course_group = CourseGroup::find($id);
                $id = $course_group->parent_id;
            }
            if (empty($course_group->parent_id)) {
                break;
            }
            $i++;
        }
    }

    return $level;
}

function mwz_route($route_name, $param = [])
{
    $default_locale = config('app.fallback_locale');
    // echo  $default_locale.' ='.config('app.fallback_locale'); 
    if ($default_locale == app()->getLocale()) {
        if (!empty($param)) {
            return  route($route_name, $param);
        } else {
            return  route($route_name);
        }
    } else {
        $new_param = array_merge([app()->getLocale()], $param);
        if (!empty($new_param)) {
            return  route('lang.' . $route_name, $new_param);
        } else {
            return  route('lang.' . $route_name);
        }
    }
}

// function mwz_LocaleRouteWithParams($route_name,$params){
//     return route($route_name, [ app()->getLocale() , $params]);
// }

// function mwz_LocaleRouteWithTwoParams($route_name,$param_1,$param_2){
//     return route($route_name, [ app()->getLocale() , $param_1, $param_2]);
// }

// function mwz_LocaleRouteWithSlug($route_name,$slug_name){
//     return route($route_name, [ app()->getLocale() , $slug_name]);
// }

function mwz_getCurrencyData($currency)
{
    $_ALL_CURRENCY = array(
        'THB' => array('name' => 'Thailand Baht', 'sign' => '฿', 'align' => '1'),
        'USD' => array('name' => 'United States Dollar', 'sign' => '$', 'align' => '2'),
        'GBP' => array('name' => 'United Kingdom Pound', 'sign' => '£', 'align' => '2'),
        'JPY' => array('name' => '日本語 Japan Yen', 'sign' => '¥', 'align' => '2'),
        'CNY' => array('name' => '中國 China Yuan Renminbi', 'sign' => '¥', 'align' => '2'),
        'KRW' => array('name' => '한국의 Korea Won', 'sign' => '₩', 'align' => '2'),
        'FRF' => array('name' => 'français (French)', 'sign' => 'francs', 'align' => '1'),
        'ESP' => array('name' => 'español (Spanish)', 'sign' => '€', 'align' => '2'),
        'RUB' => array('name' => 'русский язык Belarus Ruble', 'sign' => 'p.', 'align' => '1'),
        'LAK' => array('name' => 'ພາສາລາວ Laos Kip', 'sign' => '₭', 'align' => '1'),
        'VND' => array('name' => 'Tiếng Việt Viet Nam Dong', 'sign' => '₫', 'align' => '1'),
        'MMK' => array('name' => 'မြန်မာဘာသာ (Burmese)', 'sign' => 'K', 'align' => '2'),
        'AUD' => array('name' => 'Australian Dollar', 'sign' => 'AUD', 'align' => '2'),
        'EUR' => array('name' => 'Euro', 'sign' => '€', 'align' => '2'),
        'KHR' => array('name' => 'ភាសាខ្មែរ Cambodia Riel', 'sign' => '៛', 'align' => '1'),
        'INR' => array('name' => 'India', 'sign' => '₹', 'align' => '2'),
        'EGP' => array('name' => 'Eygpt', 'sign' => '£', 'align' => '2')
    );

    return $_ALL_CURRENCY[$currency];
}

function mwz_frm_slug_and_meta($route, $param, $slugs, $show_slug = true, $show_meta = true)
{

    $show_slug = (!$show_slug) ? 'style="display:none"' : '';
    $show_meta = (!$show_meta) ? 'style="display:none"' : '';

    $frm = '';

    // slug
    $frm .= '<div class="form-group" ' . $show_slug . '>';
    $frm .= '<label class="form-label required">' . __('mwz_admin.slug_field_label') . '</label>';
    $frm .= '<input type="text" class="form-control" id="mwz_slug_' . $slugs['lang'] . '" name="mwz_slug[' . $slugs['lang'] . ']" placeholder="' . __('mwz_admin.slug_field_placeholder') . '" value="' . (!empty($slugs['slug'])) ? $slugs['slug'] : '' . '">';
    $frm .= '</div>';

    // meta title
    $frm .= '<div class="form-group" ' . $show_meta . '>';
    $frm .= '<label class="form-label required">' . __('mwz_admin.meta_title_field_label') . '</label>';
    $frm .= '<input type="text" class="form-control" id="mwz_meta_title_' . $slugs['lang'] . '" name="mwz_title[' . $slugs['lang'] . ']" placeholder="' . __('mwz_admin.meta_title_field_placeholder') . '" value="' . (!empty($slugs['meta_title'])) ? $slugs['meta_title'] : '' . '">';
    $frm .= '</div>';

    // meta keywords
    $frm .= '<div class="form-group" ' . $show_meta . '>';
    $frm .= '<label class="form-label required">' . __('mwz_admin.meta_keywords_field_label') . '</label>';
    $frm .= '<input type="text" class="form-control" id="mwz_meta_keywords_' . $slugs['lang'] . '" name="mwz_keywords[' . $slugs['lang'] . ']" placeholder="' . __('mwz_admin.meta_keywords_field_placeholder') . '" value="' . (!empty($slugs['meta_keywords'])) ? $slugs['meta_keywords'] : '' . '">';
    $frm .= '</div>';

    // meta description
    $frm .= '<div class="form-group" ' . $show_meta . '>';
    $frm .= '<label class="form-label required">' . __('mwz_admin.meta_title_field_label') . '</label>';
    $frm .= '<input type="text" class="form-control" id="mwz_meta_description_' . $slugs['lang'] . '" name="mwz_description[' . $slugs['lang'] . ']" placeholder="' . __('mwz_admin.meta_description_field_placeholder') . '" value="' . (!empty($slugs['meta_description'])) ? $slugs['meta_description'] : '' . '">';
    $frm .= '</div>';

    // meta author
    $frm .= '<div class="form-group" ' . $show_meta . '>';
    $frm .= '<label class="form-label required">' . __('mwz_admin.meta_author_field_label') . '</label>';
    $frm .= '<input type="text" class="form-control" id="mwz_meta_author_' . $slugs['lang'] . '" name="mwz_author[' . $slugs['lang'] . ']" placeholder="' . __('mwz_admin.meta_author_field_placeholder') . '" value="' . (!empty($slugs['meta_author'])) ? $slugs['meta_author'] : '' . '">';
    $frm .= '</div>';

    // route
    $frm .= '<input type="hidden" class="form-control" id="mwz_slug_route_' . $slugs['lang'] . '" name="mwz_slug_route[' . $slugs['lang'] . ']"  value="' . (!empty($slugs['route'])) ? $slugs['route'] : '' . '">';

    // param
    $frm .= '<input type="hidden" class="form-control" id="mwz_slug_param_' . $slugs['lang'] . '" name="mwz_slug_param[' . $slugs['lang'] . ']" value="' . (!empty($slugs['param'])) ? $slugs['param'] : '' . '">';

    // lang
    $frm .= '<input type="hidden" class="form-control" id="mwz_slug_lang_' . $slugs['lang'] . '" name="mwz_slug_lang[' . $slugs['lang'] . ']"  value="' . (!empty($slugs['lang'])) ? $slugs['lang'] : '' . '">';

    // slug id
    $frm .= '<input type="hidden" class="form-control" id="mwz_slug_id_' . $slugs['lang'] . '" name="mwz_slug_id[' . $slugs['lang'] . ']"  value="' . (!empty($slugs['id'])) ? $slugs['id'] : '' . '">';
}


function mwz_pre($array)
{
    echo '<pre>';
    print_r($array);
    echo '<pre>';
}

function str_phone($p_number)
{
    $res = '';
    $d = str_split($p_number);
    if (count($d) < 10) {
        foreach ($d as  $i => $val) {
            if ($i == 2 || $i == 5) {
                $res .= '-' . $val;
            } else {
                $res .=   $val;
            }
        }
    } else {
        foreach ($d as  $i => $val) {
            if ($i == 3 || $i == 6) {
                $res .= '-' . $val;
            } else {
                $res .=   $val;
            }
        }
    }
    return $res;
}

function str_bank($number)
{
    $res = '';
    $o_number = '';
    foreach (str_getcsv($number, '-') as $value) {
        $o_number .= $value;
    }
    $d = str_split($o_number);
    if (!empty($o_number)) {
        foreach ($d as  $i => $val) {
            if ($i == 3 || $i == 6) {
                $res .= '-' . $val;
            } else {
                $res .=   $val;
            }
        }
    }
    return $res;
}

function check_image($image = 0)
{
    $no_image = '';
    $image_return = '';
    $no_image = asset('modules/frontend/img/no_image1-1.png');
    if (!empty($image)) {
        if (CheckFileInServer($image)) {
            $image_return = $image;
        } else {
            $image_return = $no_image;
        }
    } else {
        $image_return = $no_image;
    }

    return $image_return;
}

function mwz_roles($permission, $group = '')
{
    $role = new RoleController();
    switch ($group) {
        case "view":
        case "add":
        case "edit":
        case "delete":
            return $role->allow($permission, $group);
            break;
        default:
            return $role->allow_route($permission);
            break;
    }
}

function new_mwz_roles($route, $id = 0)
{
    $role = new RoleController();
    return $role->checkAccessControl($route, $id);
}



function check_menu_permisstion($data){
   foreach($data as $kk => $vv){
      $data_menu[$kk][$vv['route_name']] = mwz_roles($vv['route_name']);
   }
   return $data_menu;
}


function get_mwz_province($id)
{
    $province = Provinces::find($id);
    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
        return $province->name_th;
    } else {
        return $province->name_en;
    }
}

function get_mwz_city($id)
{
    $city = Cities::find($id);
    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
        return $city->name_th;
    } else {
        return $city->name_en;
    }
}
function get_mwz_district($id)
{
    $district = Districts::find($id);
    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
        return $district->name_th;
    } else {
        return $district->name_en;
    }
}

function mwz_uuid($uuid)
{
    $tag = '';
    foreach (str_getcsv($uuid, '-') as $value) {
        $tag .= $value;
    }
    return strtoupper($tag);
}

// file upload
function image_upload(
    $id = 1,
    $name = '',
    $label = '',
    $image = '',
    $size_recommend = '',
    $is_gallery = false,
    $delete_function = false,
    $btn_name_delete = "ลบรูปภาพ",
    $function_del = 'DeleteImage',
    $btn_delete = false,
) {
    $ele = '<label class="form-label">' . $label . '</label>';
    $ele .= '<label for="upload_image' . $id . '" class="label-upload i">';
    $ele .= '<div class="image-upload mwz-image-upload upload_image' . $id . '" data-id="' . $id . '">';
    if ($delete_function == false) {
        $ele .= '<button type="button" id="btn_delete' . $id . '" 
        class="btn btn-outline-danger btn-upload " 
        data-confirm-del-txt="' . __('admin.upload_confirm_del_txt') . '" 
        data-confirm-txt="' . __('admin.upload_confirm_txt') . '" 
        data-cancel-txt="' . __('admin.upload_cancel_txt') . '" 
        data-upload-click-to-upload-txt="' . __('admin.upload_click_to_upload') . '" 
        >' . __('admin.upload_delete_txt') . '</button>';
    }else {
        if (!empty($image)) {
            if ($btn_delete) {
                $ele .= '<button disabled type="button" class="btn btn-outline-danger btn-upload" onclick="' . $function_del . '(\'' . $id . '\')"> '.$btn_name_delete.'</button>';
                // if ($view == true) {
                // }
            } else {
                $ele .= '<button type="button" class="btn btn-outline-danger btn-upload" onclick="' . $function_del . '(\'' . $id . '\')"> '.$btn_name_delete.'</button>';
                // if ($view == true) {
                //     $ele .= '<a href = ' . $link . '><span><button style="right: 55px;" type="button" class="btn btn-outline-info btn-upload"><i class="fa fa-search"></i></button></span></a>';
                // }
            }
        }
    }
    $ele .= '<div class="dz-message upload_show_img_container ">';
    if (!empty($image)) {
        $ele .= '<div id="upload_show_img_' . $id . '">';

        if ($is_gallery) {
            $ele .= '<ul id="upload_lightgallery_' . $id . '" class="list-unstyled d-upload-image">';
            $ele .= '<li data-responsive="' . $image . '" data-src="' . $image . '">';
            $ele .= '<a href=""><img style="max-height: 150px" class="img-responsive" src="' . $image . '" alt="Thumb-1"></a>';
            $ele .= '</li>';
            $ele .= '</ul>';
            $ele .= '</div>';
        } else {
            $ele .= '<div id="upload_show_upload_' . $id . '" class="d-upload-image" >';
            $ele .= '<p><b><img style="max-height: 150px" class="img-responsive" src="' . $image . '" alt="Thumb-1"></b></p>';
            $ele .= '</div>';
        }

        $ele .= '</div>';
    } else {
        $ele .= '<div class="d-upload-image">';
        $ele .= '<i class="ion-upload"></i>';
        $ele .= '<p><b>' . __('admin.upload_click_to_upload') . '</b></p>';
        $ele .= '</div>';
    }
    $ele .= '</div>';
    $ele .= '<div class="input-upload">';
    $ele .= '<input name="' . $name . '" id="upload_image' . $id . '" type="file" />';
    $ele .= '<input name="' . $name . '_del" id="upload_image' . $id . '_del" type="hidden" value="0" />';
    $ele .= '<input name="' . $name . '_old" id="upload_image' . $id . '_old" type="hidden" value="' . $image . '" />';
    $ele .= '</div>';
    $ele .= '</div>';
    $ele .= '</label>';
    $ele .= '<span>' . __('admin.upload_size_recommend') . $size_recommend . '</span>';
    return $ele;
}

function set_image_upload($request, $image_name, $path = "public", $file_name = "")
{
    $image_path = false;

    if ($request->hasFile($image_name)) {
        $image = $request->file($image_name);
        $new_filename = $file_name . time() . "." . $image->extension();
        $path = $image->storeAs(
            $path,
            $new_filename
        );
        $image_path = Storage::url($path);
        if (!empty($request->get($image_name . '_old'))) {
            $old_path = str_replace('storage', 'public', $request->get($image_name . '_old'));
            Storage::delete($old_path);
        }
        return $image_path;
    } else {
        if (!empty($request->get($image_name . '_del')) && $request->get($image_name . '_del') == 1) {
            $old_path = str_replace('storage', 'public', $request->get($image_name . '_old'));
            Storage::delete($old_path);
            $image_path = '';
            return $image_path;
        }
    }

    return $image_path;
}


function image_upload_multiple(
    $id = "image",
    $name = "image",
    $files = "",
    $action = "",
    $thumbnail_path = "",
    $accept_files = ".jpg,.png,.jpeg,.gif",
    $max_file = 5,
    $upload_msg = "Drop image here (or click) to capture/upload",
    $remove_msg = "remove",
    $max_file_msg = "You can not upload any more files.",
    $inputs = [
        'name_th' => 'ชื่อสินค้า (TH)',
        'name_en' => 'ชื่อสินค้า (EN)'
    ]
) {
    $upload = '';

    $upload .= '<div class="dropzone dz-clickable" id="' . $id . '" data-param-name="' . $name . '"  data-action="' . $action . '" data-thumbnail-path="' . $thumbnail_path . '" data-accepted-files="' . $accept_files . '" data-max-file="' . $max_file . '" data-upload-msg="' . $upload_msg . '" data-remove-msg="' . $remove_msg . '" data-max-file-msg="' . $max_file_msg . '" >';

    $upload .= '<input type="hidden" class="file_list" name="' . $name . '_file_list" id="' . $name . '_file_list"  value=\'' . json_encode($files) . '\'>';
    $upload .= '<input type="hidden" class="file_removed" name="' . $name . '_file_removed" id="' . $name . '_file_removed" >';

    $upload .= '</div>';

    $upload .= image_upload_multiple_preview($name, $inputs);
    return $upload;
}

function image_upload_multiple_preview($name, $inputs)
{
    $preview = '';
    $preview .= '<div id="preview-template" style="display:none;">';
    $preview .= '<div class="dz-preview dz-file-preview">';
    $preview .= '<div class="dz-image"><img data-dz-thumbnail /></div>';
    $preview .= '<div class="dz-details">';
    $preview .= '<div class="dz-size"><span data-dz-size></span></div>';
    $preview .= '<div class="dz-filename"><span data-dz-name></span></div>';
    $preview .= '</div>';
    $preview .= '<div class="dz-progress">';
    $preview .= '<span class="dz-upload" data-dz-uploadprogress></span>';
    $preview .= '</div>';
    $preview .= '<div class="dz-error-message"><span data-dz-errormessage></span></div>';
    $preview .= '<div class="dz-success-mark">';
    $preview .= '<svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg" >';
    $preview .= '<path d="M10.2071 29.7929L14.2929 25.7071C14.6834 25.3166 15.3166 25.3166 15.7071 25.7071L21.2929 31.2929C21.6834 31.6834 22.3166 31.6834 22.7071 31.2929L38.2929 15.7071C38.6834 15.3166 39.3166 15.3166 39.7071 15.7071L43.7929 19.7929C44.1834 20.1834 44.1834 20.8166 43.7929 21.2071L22.7071 42.2929C22.3166 42.6834 21.6834 42.6834 21.2929 42.2929L10.2071 31.2071C9.81658 30.8166 9.81658 30.1834 10.2071 29.7929Z" />';
    $preview .= '</svg>';
    $preview .= '</div>';
    $preview .= '<div class="dz-error-mark">';
    $preview .= '<svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg" >';
    $preview .= '<path d="M26.2929 20.2929L19.2071 13.2071C18.8166 12.8166 18.1834 12.8166 17.7929 13.2071L13.2071 17.7929C12.8166 18.1834 12.8166 18.8166 13.2071 19.2071L20.2929 26.2929C20.6834 26.6834 20.6834 27.3166 20.2929 27.7071L13.2071 34.7929C12.8166 35.1834 12.8166 35.8166 13.2071 36.2071L17.7929 40.7929C18.1834 41.1834 18.8166 41.1834 19.2071 40.7929L26.2929 33.7071C26.6834 33.3166 27.3166 33.3166 27.7071 33.7071L34.7929 40.7929C35.1834 41.1834 35.8166 41.1834 36.2071 40.7929L40.7929 36.2071C41.1834 35.8166 41.1834 35.1834 40.7929 34.7929L33.7071 27.7071C33.3166 27.3166 33.3166 26.6834 33.7071 26.2929L40.7929 19.2071C41.1834 18.8166 41.1834 18.1834 40.7929 17.7929L36.2071 13.2071C35.8166 12.8166 35.1834 12.8166 34.7929 13.2071L27.7071 20.2929C27.3166 20.6834 26.6834 20.6834 26.2929 20.2929Z"/>';
    $preview .= '</svg>';
    $preview .= '</div>';
    $preview .= '<div class="show-lable">';
    if (!empty($inputs)) {
        foreach ($inputs as $input => $label) {
            $input_name = $input; //$name.'_input['.$input.']' ;
            $preview .= '<div class="label-' . $label . '" >';
            $preview .= '<div class="form-group frm-name">';
            $preview .= '<label class="form-label">' . $label . '</label>';
            $preview .= '<input type="text" class="form-control" data-name="' . $input_name . '"
                                        placeholder="' . $label . '"
                                        value="">';
            $preview .= '</div>';
            $preview .= '</div>';
        }
    }
    $preview .= '</div>';
    $preview .= '</div>';
    $preview .= '</div>';
    return $preview;
}


/**
 * Function : Create Slug format
 * Dev : Soft
 * Update Date : 26 Oct 2021
 * @param Slug name
 * @return Slug name
 */
function createSlugText($title)
{
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 2048);
    }

    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');

    return $title;
}

function seems_utf8($str)
{
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++) {
        $c = ord($str[$i]);
        if ($c < 0x80) $n = 0; # 0bbbbbbb
        elseif (($c & 0xE0) == 0xC0) $n = 1; # 110bbbbb
        elseif (($c & 0xF0) == 0xE0) $n = 2; # 1110bbbb
        elseif (($c & 0xF8) == 0xF0) $n = 3; # 11110bbb
        elseif (($c & 0xFC) == 0xF8) $n = 4; # 111110bb
        elseif (($c & 0xFE) == 0xFC) $n = 5; # 1111110b
        else return false; # Does not match any model
        for ($j = 0; $j < $n; $j++) { # n bytes matching 10bbbbbb follow ?
            if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                return false;
        }
    }
    return true;
}

function utf8_uri_encode($utf8_string, $length = 0)
{
    $unicode = '';
    $values = array();
    $num_octets = 1;
    $unicode_length = 0;

    $string_length = strlen($utf8_string);
    for ($i = 0; $i < $string_length; $i++) {

        $value = ord($utf8_string[$i]);

        if ($value < 128) {
            if ($length && ($unicode_length >= $length))
                break;
            $unicode .= chr($value);
            $unicode_length++;
        } else {
            if (count($values) == 0) $num_octets = ($value < 224) ? 2 : 3;

            $values[] = $value;

            if ($length && ($unicode_length + ($num_octets * 3)) > $length)
                break;
            if (count($values) == $num_octets) {
                if ($num_octets == 3) {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                    $unicode_length += 9;
                } else {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                    $unicode_length += 6;
                }

                $values = array();
                $num_octets = 1;
            }
        }
    }

    return $unicode;
}

function metadata($metadata_obj)
{
    if (!empty($metadata_obj)) {
        foreach ($metadata_obj as $slug) {
            $metadata[$slug->lang] = [
                'slug' => $slug->slug,
                'module' => $slug->module,
                'method' => $slug->method,
                'data_id' => $slug->data_id,
                'param' => $slug->param,
                'meta_auther' => $slug->meta_auther,
                'meta_title' => $slug->meta_title,
                'meta_keywords' => $slug->meta_keywords,
                'meta_description' => $slug->meta_description,
                'meta_robots' => $slug->meta_robots,
                'meta_image' => $slug->meta_image
            ];
        }
    }
    return $metadata;
}

function web_setting()
{
    $setting = WebSettings::find(1);
    if (!empty($setting)) return $setting;
}

function contact()
{
    $contact = new ContactUsController;
    $contact = $contact->getContact();
    if (!empty($contact)) return $contact;
}

function date_Formate($date)
{
    $str_date = '';
    $strMonth = date("n", strtotime($date));
    $strDay = date("j", strtotime($date));
    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
        $strYearTH = date("Y", strtotime($date)) + 543;
        $strMonthCutTH = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $str_date =  $strDay . ' ' . $strMonthCutTH[$strMonth] . ' ' . $strYearTH;
    } else {
        $strYearEN = date("Y", strtotime($date));
        $strMonthCutEN = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $str_date =  $strDay . ' ' . $strMonthCutEN[$strMonth] . ' ' . $strYearEN;
    }
    return $str_date;
}

function mwz_filebrowse()
{
    // <div class="form-group">
    //     <label class="form-label">{{ __('banner_admin.video_url') }}</label>
    //     <div class="input-group mb-3">
    //         <input type="text" class="form-control" name="video_url" id="video_url" placeholder="{{ __('banner_admin.video_url_placeholder') }}" value="{{ !empty($banner->video_url) ? $banner->video_url : '' }}" aria-label="{{ __('banner_admin.video_url') }}" aria-describedby="basic-addon2">
    //         <div class="input-group-append">
    //             <button class="btn btn-secondary" onclick="selectFiles();" type="button"><i class="fa fa-search mr-1" aria-hidden="true"></i> {{ __('banner_admin.select_file') }}</button>
    //         </div>
    //     </div>
    // </div>
}

function mwz_get_side_admin_menu()
{
    $menus = AdminMenus::where('status', 1)->orderby('_lft', 'asc')->get()->toTree();
    // $menus = mwz_setFlatCategory($menus);
    return $menus;
}

function mwz_get_sub_menu($side_admin_menu){
    foreach($side_admin_menu as $val){
        if( mwz_roles($val->route_name)){
            if(!empty($val->children) && count($val->children) > 0){
                return true;
            }else{
                return true;
            }
        }
    }
}

function mwz_update_status_button($route_name, $id, $functiom_name = 'setUpdateStatus', $status=1)
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        if ($status == 1) {
            $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
        } else {
            $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
        }
    }
    return $action_btn;
}

function mwz_edit_button($route_name, $id)
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        $action_btn .= '<a href="' . route($route_name, $id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';
    }
    return $action_btn;
}

function mwz_delete_button($route_name, $id, $functiom_name = 'setDelete')
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        $action_btn .= '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
    }
    return $action_btn;
}

function mwz_sort_button($route_name, $id, $functiom_name = 'setUpdateSort')
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        $action_btn = '<div class="btn-list">';
        $action_btn .= '<a onclick="' . $functiom_name . '(' . $id . ',\'up\');"  href="javascript:void(0);" class="btn btn-sm btn-outline-default"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>';
        $action_btn .= '<a onclick="' . $functiom_name . '(' . $id . ',\'down\');" href="javascript:void(0);" class="btn btn-sm btn-outline-default"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>';
        $action_btn .= '</div>';
    }
    return $action_btn;
}


 /**
     * ถ้าต้องการให้ textarea ขายขนาดตามการพิมพ์ให้เติม extra = 'data-autoresize'
     * และให้เติม $menu->footer_script = "add_auto_resize()";
     */
    function show_textarea($id, $name, $val = "", $place = "", $label = "", $des = "", $classes = "", $row = 4, $col = 10, $extra = "", $inclass = "") {
        $name = !is_null($name) ? $name : $id;
        $codelabel = ($label == "" ? "" : "<label for='$id'>$label</label>");
        $paragraph = ($des == "" ? "" : "<p>$des</p>");
        $nn = nobracket($name);
        $showval = (isset($val[$nn]) ? $val[$nn] : (is_array($val) ? "" : $val));
        $html = "<div class='$classes'>"
                . $codelabel
                . "<textarea id='$id' class='$inclass' name='$name' rows='$row' cols='$col' placeholder='$place' $extra>"
                . "$showval"
                . "</textarea>"
                . $paragraph
                . "</div><!-- .$classes -->";
        return $html;
    }

    function nobracket($name) {
        return preg_replace("/\[.*\]/", "", $name);
    }

    function lucky_number(){
        $number = [];
        for($i = 0; $i < 10; $i++){
            for($j = 0; $j < 10; $j++){
               $number[] = $i.$j;
            }
        }
        return $number;
    }
    function date_today($format = "Y-m-d") {
        return date_format(date_create(null, timezone_open("Asia/Bangkok")), $format);
    }

    function phone_fomat($phone){
      $str_split = str_split($phone);
      $info = $str_split[0].$str_split[1].$str_split[2].'-'.$str_split[3].$str_split[4].$str_split[5].'-'.$str_split[6].$str_split[7].$str_split[8].$str_split[9];
      return $info;
    }

    function thai_dt($fulldate, $showy = false,$showdate = true, $format_day = false,$thai_date_num = false,$day_time = true)
{
    $thm = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $date = date_create($fulldate, timezone_open("Asia/Bangkok"));
    $day = date_format($date, "j");
    $mm = date_format($date, "n") - 1;
    $year = date_format($date, "Y") + 543;
    $sy = ($showy ? ($year) : "");
    $time = date_format($date, "H:i");
    if ($showdate) {
        if ($format_day) {
            $data = [
                'd' => $day,
                'm' => $thm[$mm],
                'y' => $sy
            ];
            return $data;
        }elseif($thai_date_num){
            return "$day/".date_format($date,"m")."/$sy";
            // return date_format($date,"d/m/Y");
        }elseif($day_time){
            return "$day " . $thm[$mm] . " $sy" . ' ' .$time;
        } else {
            return "$day " . $thm[$mm] . " $sy";
        }
    } else {
        return $time;
    }
}

function mwz_update_button($route_name, $id, $functiom_name, $status, $type = 'default', $icon = 'fa-thumb-tack', $class = 'btn btn-outline-success')
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        switch ($type) {
            case 'status':
                $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ',' . $status . ')" href="javascript:void(0);" class="' . $class . '" ><i class="fa ' . $icon . '"></i></a>';
                break;
            case 'shipping':
                if ($status == 1) {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa ' . $icon . '"></i></a>';
                } else {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa ' . $icon . '"></i></a>';
                }
                break;
            case 'payment':
                if ($status == 1) {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);"  class="btn btn-outline-info"><i class="fa ' . $icon . '"></i></a>';
                } elseif ($status == 2) {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa ' . $icon . '"></i></a>';
                } else {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa ' . $icon . '"></i></a>';
                }
                break;
            default:
                if ($status == 1) {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa ' . $icon . '"></i></a>';
                } else {
                    $action_btn = '<a onclick="' . $functiom_name . '(' . $id . ')" href="javascript:void(0);"  class="btn btn-outline-default"><i class="fa ' . $icon . '"></i></a>';
                }
                break;
        }
    }
    return $action_btn;
}

function mwz_button($route_name, $route, $id, $icon = 'fa-pencil', $class = 'btn-outline-primary', $target = '_self')
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        $action_btn .= '<a href="' . mwz_route($route, $id) . '" class="btn ' . $class . '" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>';
    }
    return $action_btn;
}

function order_delete($route_name, $id, $no, $functiom_name = 'setDelete')
{
    $action_btn = '';
    if (mwz_roles($route_name)) {
        $action_btn .= '<a onclick="' . $functiom_name . '(' . $id . ',' . $no . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
    }
    return $action_btn;
}

function cal_total_scor($number){
    $total_score = 0;
    $grad_name =  $grad_id  = "";
    if(!empty($number)){
       $info = $number;
        //จับคู่เลข จากตำแหน่ง
        $info_4 = !empty($info[3]) ? $info[3] : 0;
        $info_5 = !empty($info[4]) ? $info[4] : 0;
        $info_6 = !empty($info[5]) ? $info[5] : 0;
        $info_7 = !empty($info[6]) ? $info[6] : 0;
        $info_8 = !empty($info[7]) ? $info[7] : 0;
        $info_9 = !empty($info[8]) ? $info[8] : 0;
        $info_10 = !empty($info[9]) ? $info[9] : 0;
        $arr[] = $info_4 . $info_5;
        $arr[] = $info_5 . $info_6;
        $arr[] = $info_6 . $info_7;
        $arr[] = $info_7 . $info_8;
        $arr[] = $info_8 . $info_9;
        $arr[] = $info_9 . $info_10;
        // หาคะแนน คู่เลข
        $res = ProductAndRelate::get();
        foreach($res as $relate){
            $arr_relate[$relate->number] = $relate->score;
        }
        
        foreach($arr as $val_number){
            $score[] =  !empty($arr_relate[$val_number]) ? $arr_relate[$val_number] : 0;
        }
        // sum score
        $total_score = array_sum($score);
        // $score = ProductGrading::get();
        $score = ProductGrading::where('score_form','<=',$total_score)->where('score_to','>=',$total_score)->get();
        $grad = [];
        foreach($score as $vv){
          $grad_name =  $vv->grad_en;
          $grad_id =  $vv->id;
        }
    }
    return ['results' => $total_score,'grad_name' => $grad_name,'grad_id' => $grad_id];
}

function CheckSubMenu($role_id = 14){
//   if(!empty($data)){
//     $result = [];
//       foreach($data as $val){
//         $result[] = mwz_roles($val->route_name);
//       }
//       return $result;
//   }
      $role = RolesAndPermissions::get();
    return $role;
} 
    