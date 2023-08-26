<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banner\Entities\BannerCategories;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BannerCategoriesAdminController extends Controller
{

    public $config = [
        'category' => [
            'desc' => false,
            'detail' => false,
            'image' => false,
            'parent' => false
        ]
    ];

    /**
     * Function : __construct check admin login
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : Banner index
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return index.blade view
     */
    public function index(Request $request)
    {
        return view('banner::category.index', ['config' => $this->config['category']]);
    }

    /**
     * Function : Banner datatable ajax response
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param Get
     * @return json of Banner
     */
    public function datatable_ajax(Request $request,)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('sequence', 'image', 'name_th', 'updated_at', 'action');

            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create Banner cat object
            $o_Banner_cat = new BannerCategories();

            // dt_search 
            if (!empty($dt_search)) {
                $o_Banner_cat = $o_Banner_cat->Where(function ($query) use ($dt_search) {
                    $dt_search->orWhere('name_th', 'like', "" . $dt_search . "%")
                        ->orWhere('name_en', 'like', "" . $dt_search . "%");
                });
            }

            // count all Banner cat
            $dt_total = $o_Banner_cat->count();

            // set query order & limit from datatable
            $o_Banner_cat->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query Banner cat
            $categories = $o_Banner_cat->withDepth()->defaultOrder()->get();

            // prepare datatable for response
            $tables = Datatables::of($categories)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('Banner_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                //->setOffset($dt_start)
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('d/m/Y H:i:s');
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
                ->editColumn('image', function ($record) {
                    if (!empty($record->image) && CheckFileInServer($record->image)) {
                        $img = '<img class="rounded" src="' . $record->image . '" />';
                    } else {
                        $img = '<img alt="' . CheckFileInServer($record->image) . '" class="rounded" src="/storage/_blank.jpg" />';
                    }
                    return $img;
                })
                ->addColumn('sort', function ($record) {
                    return mwz_sort_button('admin.banner.category.sort', $record->id, 'setUpdateSort');
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    $action_btn .= mwz_update_status_button('admin.banner.category.set_status', $record->id, 'setUpdateStatus', $record->status);

                    $action_btn .= mwz_edit_button('admin.banner.category.edit', $record->id);

                    $action_btn .= mwz_delete_button('admin.banner.category.set_delete', $record->id, 'setDelete');
                    
                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }


    /**
     * Function : update Banner status
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $Banner = BannerCategories::find($id);
            $Banner->status = $status;

            if ($Banner->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('banner::category.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('banner::category.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : delete Banner
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $Banner_cat = BannerCategories::find($id);
            if ($Banner_cat->delete()) {
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('banner::category.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('banner::category.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : add Banner form
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param GET
     * @return Banner form view
     */
    public function form(Request $request, $id = 0)
    {   

        $category = [];

        if (!empty($id)) {
            $category = BannerCategories::find($id);
            $category->desc_th = mwz_getTextString($category->desc_th);
            $category->desc_en = mwz_getTextString($category->desc_en);
            $category->detail_th = mwz_getTextString($category->detail_th);
            $category->detail_en = mwz_getTextString($category->detail_en);
        }

        $parents = BannerCategories::all();
        // ->totree()
        $parents = mwz_setFlatCategory($parents);
        $lang = Lang::get('banner::module');
        return view('banner::category.form', ['category' => $category, 'parents' => $parents, 'config' => $this->config['category'],'lang'=>$lang]);
    }

    /**
     * Function : Banner save
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {
        //validate post data
        $validator = Validator::make($request->all(), [
            'id' => 'integer',
            'name_th' => 'required|max:255',
            'name_en' => 'required|max:255',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $errors->first(), 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "status" => $request->get('status'),
            "parent_id" => $request->get('parent_id')
        ];

        if (empty($request->get('sequence'))) {
            $sequence = BannerCategories::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;
        } else {
            $attributes["sequence"] = $request->get('sequence');
        }

        if (!empty($request->get('id'))) {
            $data_id = $request->get('id');
            $node = BannerCategories::where('id',  $data_id)->update($attributes);
            BannerCategories::fixTree();
            $this->re_order();
            $resp = ['success' => 1, 'code' => 201, 'msg' => __('banner::category.admin.save_success')];
        } else {
            $node = BannerCategories::create($attributes);
            $data_id = $node->id ;
            $this->re_order();
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('banner::category.admin.save_success')];
        }

        return response()->json($resp);
    }

    /**
     * Function : re_order
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of response
     */
    public function re_order()
    {
        $all_cat = BannerCategories::orderBy('_lft','asc')->get();
        $cnt = 0;
        foreach($all_cat as $cat){
            $cnt++ ;
            $cat->sequence = $cnt ;
            $cat->save();
        }    
    }

    /**
     * Function : move node
     * Dev : tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of response
     */
    public function sort(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $move = $request->get('move');
            $node = BannerCategories::find($id);
            $is_move = false;
            if ($move == 'up') {
                $is_move = $node->up();
            }

            if ($move == 'down') {
                $is_move = $node->down();
            }

            $this->re_order();

            if ($is_move) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('banner::category.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('banner::category.admin.error_try_again')];
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
    public function set_move_node(Request $request)
    {
        if ($request->ajax()) {
           
            if (!empty($request->get('node_id'))&&!empty($request->get('next_by'))) {
                $node = BannerCategories::find($request->get('node_id')) ;
                $neighbor = BannerCategories::find($request->get('next_by')) ;
                // $move_status = $node->prependToNode($parent)->save(); 
                $move_status = $node->afterNode($neighbor)->save();
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('banner::category.admin.order_success'),'move_status'=>$move_status ];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('banner::category.admin.no_need_order')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function :  get vendor
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response update content up
     */
    public function get_category(Request $request)
    {
    
        $categories = BannerCategories::withDepth()->defaultOrder()->get();

        $result = [];
        foreach($categories as $category){
            $showname = str_repeat(' - ', $category->depth) . $category->name_th;
            $result[] = [
                'id'=>$category->id,
                'text'=>$showname,
                'image'=>$category->image
            ];
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success','results'=>$result];

        return response()->json($resp, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
