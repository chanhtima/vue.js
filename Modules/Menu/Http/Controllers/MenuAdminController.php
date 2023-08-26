<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use Yajra\DataTables\Facades\DataTables;
use Modules\Menu\Entities\Menus;
use Modules\Mwz\Entities\Slugs;
use Modules\Mwz\Http\Controllers\SlugController;

class MenuAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : index 
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param Get
     * @return view of menu
     */
    public function index()
    {
        return view('menu::index');
    }

    /**
     * Function : change type menu
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param Get
     * @return view of menu
     */
    public function type_menu($type)
    {
        session()->put('type_menu', $type);
        return back()->withInput();
    }

    /**
     * Function : menu datatable ajax response 
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param Get
     * @return json of menu 
     */
    public function datatable_ajax(Request $request)
    {

        if ($request->ajax()) {
            //get type menu
            $type = ((session()->get('type_menu') == "") ? 1 : session()->get('type_menu'));

            // dd($type);

            //init datatable
            $dt_name_column = array('_lft', 'name_th', 'name_en', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create menu object 
            $o_menu = new Menus;
            $o_menu = $o_menu->with('main');
            $o_menu = $o_menu->withDepth()->defaultOrder()->where('type', $type);
            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_menu =  $o_menu->where('name_th', 'like', "%" . $dt_search . "%")
                    ->orwhere('name_en', 'like', "%" . $dt_search . "%")
                    ->orwhere('updated_at', 'like', "%" . $dt_search . "%");
            }

            $dt_total = $o_menu->count();
            // set query order & limit from datatable
            $o_menu =  $o_menu->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length)
                ->orderby('_lft', 'asc');

            // query menu as tree resule
            $menu = $o_menu->get();

            // count all menu
            // $dt_total = $o_menu_cnt->where('type', $type)->count();

            // prepare datatable for resonse
            $tables = Datatables::of($menu)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('menu_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->editColumn('sequence', function ($record) {
                    return (!empty($record->main->sequence) ? $record->main->sequence . '-' : '')  . $record->sequence;
                })
                ->editColumn('name_th', function ($record) {

                    $result = array();

                    $result = str_repeat(' - ', $record->depth) . $record->name_th;

                    return $result;
                })
                ->editColumn('name_en', function ($record) {
                    $result = array();

                    $result = str_repeat(' - ', $record->depth) . $record->name_en;

                    return $result;
                })
                ->editColumn('updated_at', function ($record) {
                    return  !empty($record->updated_at) ? $record->updated_at->format('Y-m-d H:i:s') : '';
                })
                ->addColumn('actionEdit', function ($record) {
                    $action_btn = '<div class="btn-list">';
                    if (mwz_roles('admin.menu.menu.edit')) {
                        if ($record->status == 1) {
                            $action_btn .= '<a onclick="setUpdateStatusMenu(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a></a>';
                        } else {
                            $action_btn .=  '<a onclick="setUpdateStatusMenu(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a></a>';
                        }
                        $action_btn .= '<a href="' . route('admin.menu.menu.edit', $record->id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a></a>';
                    }
                    // $action_btn .= '<a onclick="setDeleteMenu(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></a>';
                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }

    /**
     * Function : add menu form
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param GET
     * @return category form view
     */
    public function form($id = 0)
    {
        $type = ((session()->get('type_menu') == "") ? 1 : session()->get('type_menu'));
        $data = [];
        if (!empty($id)) {
            $data['menu'] = Menus::find($id);
            // $data['menu']->desc_th = mwz_getTextString($data['menu']->desc_th);
            // $data['menu']->desc_en = mwz_getTextString($data['menu']->desc_en);
        }
        $data['list'] =  Menus::where('id', 6)->where('parent_id', null)->get();
        $slugs = Slugs::where([['lang', 'th'], ['type', 1]])->get();
        // dd($slugs);
        return view('menu::form', ['data' => $data, 'type' => $type, 'slugs' => $slugs]);
    }

    /**
     * Function :  manu save 
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {
        //validate post data
        $validator = Validator::make($request->all(), [
            'name_th' => 'required|max:500',
            'name_en' => 'required|max:500',
        ], [
            'name_th.*' => 'โปรดระบุชื่อเมนูภาษาไทย',
            'name_en.*' => 'โปรดระบุชื่อเมนูภาษาอังกฤษ',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msg = $errors->first();
            $resp = ['success' => 0, 'code' => 0, 'msg' => $msg, 'error' => $errors];
            return response()->json($resp);
        }
        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "type" => $request->get('type'),
            "link_type" => $request->get('link_type'),
            "slug_id" => $request->get('slug_id'),
            "url" => $request->get('url'),
            "parent_id" => $request->get('parent_id'),
            "status" => !empty($request->get('status')) ? $request->get('status') : 0,
            "show_location" => !empty($request->get('show_location')) ? $request->get('show_location') : 0 ,
        ];
        if (empty($request->get('sequence'))) {
            $sequence = Menus::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;
        } else {
            $attributes["sequence"] = $request->get('sequence');
        }

        if ($request->get('type') == 1) {
            $attributes['type'] = 1;
        } else {
            $attributes['type'] = 2;
        }

        if (!empty($request->get('id'))) {
            $menu = Menus::where('id', $request->get('id'))->update($attributes);
            $menu = Menus::fixTree();
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $menu = Menus::create($attributes);
            $menu->save();
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มรายการสำเร็จ'];
        }

        return response()->json($resp);
    }

    /**
     * Function : update menu status
     * Dev : Jang
     * Update Date : 19 Nov 2021
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $menu = Menus::find($id);
            $menu->status = $status;

            if ($menu->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : delete news
     * Dev : jang
     * Update Date : 25 Nov 2021
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $news = Menus::find($id);

            if ($news->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'ลบข้อมูลเมนูสำเร็จ!'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function :  update up menu 
     * Dev : Jang
     * Update Date : 25 Nov 2021
     * @param POST
     * @return json response update menu up
     */
    public function menu_up(Request $request)
    {

        if ($request->ajax()) {

            $id = $request->get('id');

            $result = Menus::find($id)->up();
        }
    }

    /**
     * Function :  update down menu 
     * Dev : Jang
     * Update Date : 25 Nov 2021
     * @param POST
     * @return json response update menu down
     */
    public function menu_down(Request $request)
    {

        if ($request->ajax()) {

            $id = $request->get('id');

            $result = Menus::find($id)->down();
        }
    }

    /**
     * Function :  set_re_order
     * Dev : Tong
     * Update Date : 21 July 2022
     * @param POST
     * @return json response update sequence status
     */
    public function set_re_order(Request $request)
    {
        if ($request->ajax()) {
            $sort_json = @json_decode($request->get('sort_json'), 1);
            if (!empty($sort_json)) {
                foreach ($sort_json as $id => $sequence) {
                    Menus::find($id)->update(['sequence' => $sequence]);
                }
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'เรียงข้อมูลใหม่สำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => 'ไม่มีข้อมูลที่ต้องเรียง'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : Create Slug format
     * Dev : Soft
     * Update Date : 26 Oct 2021
     * @param Slug name
     * @return Slug name
     */
    public function createSlug($title)
    {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

        if ($this->seems_utf8($title)) {
            if (function_exists('mb_strtolower')) {
                $title = mb_strtolower($title, 'UTF-8');
            }
            $title = $this->utf8_uri_encode($title, 2048);
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

    public function seems_utf8($str)
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

    public function utf8_uri_encode($utf8_string, $length = 0)
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
}
