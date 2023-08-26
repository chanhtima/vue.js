<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Modules\Banner\Entities\Banner;
use Modules\Menu\Entities\Menus;
use Illuminate\Support\Facades\App;
use Modules\Banner\Entities\BannerCategories;
use Modules\Banner\Entities\BannerCatgory;
use Modules\Banner\Entities\Banners;

class BannerAdminController extends Controller
{

    public $config = [
        'banners' => ['link' => true]
    ];

    /**
     * Function : __construct check admin login
     * Dev : pop
     * Update Date : 23 Jul 2021
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : banner index
     * Dev : pop
     * Update Date : 27 Jul 2021
     * @param Get
     * @return index.blade view
     */
    public function index()
    {
        $data['count'] = Banners::count();
        return view('banner::banner.index', ['data'=> $data,'config' => $this->config['banners']]);
    }

    /**
     * Function : banner datatable ajax response
     * Dev : pop
     * Update Date : 27 Jul 2021
     * @param Get
     * @return json of banner
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('sequence', 'image', 'name_th', 'catgory_id', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // count all banners

            // create banners object
            $o_banner = new Banners();

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_banner = $o_banner->where('name_th', 'like', "%" . $dt_search . "%")
                    ->orwhere('name_en', 'like', "%" . $dt_search . "%")
                    ->orwhere('updated_at', 'like', "%" . $dt_search . "%")
                    ->orWhereRelation('category', 'name_th', 'like', "%" . $dt_search . "%")
                    ->orWhereRelation('category', 'name_en', 'like', "%" . $dt_search . "%");
            }

            $dt_total = $o_banner->count();
            // set query order & limit from datatable
            $o_banner = $o_banner->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

                 // query banners
            $o_banner = $banners = $o_banner->with('category')->get();

            // query banners
            // $o_banner = $banners = $o_banner->get();

            // prepare datatable for response
            $tables = Datatables::of($banners)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('banner_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('Y-m-d H:i:s');
                })
                ->editColumn('image', function ($record) {
                    if($record->type == 1){
                        if (CheckFileInServer($record->image) && !empty($record->image)) {
                            return '<img class="rounded" style="max-height: 60px" src="' . $record->image . '">';
                        }
                    }else{
                        $url_id = explode("watch?v=",$record->url_video);
                        if(!empty($url_id[1])){
                            return '<iframe width="140" height="80" src="https://www.youtube.com/embed/'.$url_id[1].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                        }else{
                            return '<img class="rounded" style="max-height: 60px" src="' . asset('/images/icons/youtube.png') . '">';
                        }
                    }
                    
                })
                ->editColumn('category_id', function ($record) {
                    return (!empty($record->category)) ? $record->category->name_th : '';
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';
                    if (mwz_roles('admin.banner.banner.edit')) {
                        if ($record->status == 1) {
                            $action_btn .= '<a onclick="setUpdateStatus(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a></a>';
                        } else {
                            $action_btn .=  '<a onclick="setUpdateStatus(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a></a>';
                        }
                        $action_btn .= '<a href="' . route('admin.banner.banner.edit', $record->id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a></a>';
                    }
                    if (mwz_roles('admin.banner.banner.set_delete')) {
                        $action_btn .= '<a onclick="setDelete(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></a>';
                    }
                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }

    /**
     * Function : add banner form
     * Dev : pop
     * Update Date : 14 Jul 2021
     * @param GET
     * @return banner form view
     */
    public function form_banner($id = 0)
    {
        $data =  $list = [];

        if (!empty($id)) {
            $data = Banners::find($id);
            $data->description_th = mwz_getTextString($data->description_th);
            $data->description_en = mwz_getTextString($data->description_en);
        }

        // get Banner 
        $items = BannerCategories::where('status',1)->get();
        foreach ($items as $item) {
            $list['data_parent'][$item->id]['id'] = $item->id;
            
            if (empty(App::currentLocale() || App::currentLocale() == 'th')) {
                $list['data_parent'][$item->id]['name'] = str_repeat(' - ', $item->depth) . $item->name_th;
            } else {
                $list['data_parent'][$item->id]['name'] = str_repeat(' - ', $item->depth) . $item->name_en;
            }
        }
        return view('banner::banner.form', ['data' => $data,'list' => $list,'config' => $this->config['banners']]);
    }

    /**
     * Function :  banner save
     * Dev : pop
     * Update Date : 11 Jul 2021
     * @param POST
     * @return json response status
     */
    public function save_banner(Request $request)
    {
        //Check input is null
       
         if(empty($request->get('type')) || $request->get('type') == 1){
            if (!$request->hasFile('image') && $request->get('image') == null && empty($request->get('id') || !empty($request->get('image_old')))) {
                $resp = ['error' => 0, 'code' => 301, 'msg' => 'โปรดอัพโหลดรูปภาพ!', 'focus' => 'image'];
                return response()->json($resp);
            }
         }else{
            if($request->get('url_video') == ""){
                $resp = ['error' => 0, 'code' => 301, 'msg' => 'โปรดระบุ URL YouTube Video!', 'focus' => 'url_video'];
                return response()->json($resp);
            }
         }

         if(empty($request->get('category_id')) || $request->get('category_id') == 0){
            $resp = ['error' => 0, 'code' => 301, 'msg' => 'โปรดเลือกหน้าแสดงผล!', 'focus' => 'category_id'];
            return response()->json($resp);
         }
       
        //validate post data
        $validator = Validator::make($request->all(), [
            'name_th' => 'required|max:500',
            'name_en' => 'required|max:500',
        ],[
            'name_th.*' => 'โปรดระบุชื่อหัวข้อภาษาไทย',
            'name_en.*' => 'โปรดระบุชื่อหัวข้อภาษาอังกฤษ',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $focus = $validator->errors()->keys()[0];
            $resp = ['success' => 0, 'code' => 301, 'msg' => $errors->first(), 'error' => $errors ,"focus" => $focus];
            return response()->json($resp);
        }

        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "link" => ($this->config['banners']) ?  $request->get('link') : "",
            "status" => $request->get('status'),
            "category_id" => $request->get('category_id'),
            "url_video" => $request->get('url_video'),
            "type" => !empty($request->get('type')) ? $request->get('type') : 1,
        ];
        if (empty($request->get('sequence'))) {
            $sequence = Banners::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;
        } else {
            $attributes["sequence"] = $request->get('sequence');
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_filename = 'banner-' . $request->get('id') . '-' . time() . "." . $image->extension();
            $path = $image->storeAs(
                'public/banner',
                $new_filename
            );
            $attributes['image'] = Storage::url($path);

            if (!empty($request->get('image_old'))) {
                $old_path = str_replace('storage', 'public', $request->get('image_old'));
                Storage::delete($old_path);
            }
        } else {
            if (!empty($request->get('image_del')) && $request->get('image_del') == 1) {
                $old_path = str_replace('storage', 'public', $request->get('image_old'));
                Storage::delete($old_path);
                $attributes['image'] = '';
            }
        }

        if (!empty($request->get('id'))) {
            $Banner = Banners::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $Banner = Banners::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มรายการใหม่สำเร็จ'];
        }

        return response()->json($resp);
    }

    /**
     * Function : update banner status
     * Dev : pop
     * Update Date : 27 Jul 2021
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $banner = Banners::find($id);
            $banner->status = $status;

            if ($banner->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : delete banner
     * Dev : pop
     * Update Date : 27 Jul 2021
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $banner = Banners::find($id);

            if ($banner->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
            }

            return response()->json($resp);
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
                    Banners::find($id)->update(['sequence' => $sequence]);
                }
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'เรียงข้อมูลใหม่สำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => 'ไม่มีข้อมูลที่ต้องเรียง'];
            }

            return response()->json($resp);
        }
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
            $webset = Banners::find($request->get("id"));
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
