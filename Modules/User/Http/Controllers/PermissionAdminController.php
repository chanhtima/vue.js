<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\App;

use Modules\User\Entities\Permissions;
use Modules\Mwz\Http\Controllers\MwzController;

class PermissionAdminController extends Controller
{

    /**
     * Function : __construct check admin login
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : permission index
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param Get
     * @return index.blade view
     */
    public function index()
    {
        // $this->generate_permission() ;
        return view('user::permission.index');
    }

    /**
     * Function : permission datatable ajax response
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param Get
     * @return json of permission
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('id', 'name', 'group', 'module', 'page', 'action', 'route_name', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create permission object
            $o_permission = new Permissions();

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_permission = $o_permission->where('name', 'like', "%" . $dt_search . "%");
            }

            $dt_total = $o_permission->count();
            // set query order & limit from datatable
            $o_permission = $o_permission->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query permission
            $permission = $o_permission->get();
            // prepare datatable for response
            $tables = Datatables::of($permission)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('permission_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->setRowAttr([
                    'data-sequence' => function ($record) {
                        return $record->sequence;
                    },
                ])
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('Y-m-d H:i:s');
                })
                ->addColumn('manage', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    $action_btn .= mwz_edit_button('admin.user.permission.edit', $record->id);

                    $action_btn .= mwz_delete_button('admin.user.permission.set_delete', $record->id, 'setDelete');

                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }


    /**
     * Function : update permission status
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $permission = Permissions::find($id);
            $permission->status = $status;

            if ($permission->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('user::permission.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : delete permission
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $permission = Permissions::find($id);
            if ($permission->delete()) {
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('user::permission.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : add permission form
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param GET
     * @return permission form view
     */
    public function form($id = 0)
    {
        $permission = [];
        if (!empty($id)) {
            $permission = Permissions::find($id);
        }

        return view('user::permission.form', ['data' => $permission]);
    }

    /**
     * Function : permission save
     * Dev : Jang
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {

        //validate post data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',

        ], [
            'name.*' => 'โปรดระบุชื่อ!',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msg = $errors->first();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $msg, 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "name" => $request->get('name')
        ];


        if (!empty($request->get('id'))) {
            $data_id = $request->get('id');
            $permission = Permissions::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.save_success')];
        } else {
            // insert new row
            $permission = Permissions::create($attributes);
            $data_id = $permission->id;

            $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.save_success')];
        }

        return response()->json($resp);
    }

    /**
     * Function :  set_re_order
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json response update sequence status
     */
    public function re_order()
    {
        $lists = Permissions::orderBy('sequence', 'asc')->get();
        if (!empty($lists)) {
            $cnt = 0;
            foreach ($lists as $row) {
                $cnt++;
                $row->sequence = $cnt;
                $row->save();
            }
        }
    }


    /**
     * Function :  set_re_order
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json response update sequence status
     */
    public function set_re_order(Request $request)
    {
        if ($request->ajax()) {
            $sort_json = @json_decode($request->get('sort_json'), 1);
            if (!empty($sort_json)) {
                foreach ($sort_json as $id => $sequence) {
                    Permissions::find($id)->update(['sequence' => $sequence]);
                }
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::permission.admin.no_need_order')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function :  update up content 
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response update content up
     */
    public function sort(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->get('id');
            $move = $request->get('move');
            if ($move == 'up') {
                $result = Permissions::find($id);
                $new_sequence = $result->sequence + 1;

                $upnode = Permissions::where([['sequence', '>=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $upnode->sequence = $result->sequence;
                $upnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }
            if ($move == 'down') {
                $result = Permissions::find($id);
                $new_sequence = $result->sequence - 1;

                $downnode = Permissions::where([['sequence', '<=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $downnode->sequence = $result->sequence;
                $downnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }
            $this->re_order();
            if ($content) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::permission.admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::permission.admin.no_need_order')];
            }
        } else {
            $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::permission.admin.no_need_order')];
        }

        return response()->json($resp);
    }

    /**
     * Function :  get permission
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response update content up
     */
    public function get_permission(Request $request)
    {
        $permissions = Permissions::orderBy('sequence', 'asc')->get();
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = [
                'id' => $permission->id,
                'text' => $permission->name,
                'image' => ''
            ];
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success', 'results' => $result];

        return response()->json(
            $resp,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function get_route_name(Request $request)
    {
        $permissions = Permissions::orderBy('name', 'asc')->get();
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = [
                'id' => $permission->name,
                'text' => $permission->name,
            ];
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success', 'results' => $result];

        return response()->json(
            $resp,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function generate_permission()
    {
        $group_permission = [
            'view' => ['index', 'datatable_ajax', 'get_'],
            'add' => ['add', 'save'],
            'edit' => ['edit', 'set_status', 'sort', 'set_move_node', 'set_re_order'],
            'delete' => ['set_delete']
        ];

        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            $route_name = $value->getName();
            if (str_contains($route_name, 'admin.')) {
                $route_arr =  explode('.', $route_name);
                $module = (!empty($route_arr[1])) ? $route_arr[1] : '';
                $page = (!empty($route_arr[2])) ? $route_arr[2] : '';
                $action = (!empty($route_arr[3])) ? $route_arr[3] : '';

                if (in_array($action, $group_permission['view'])) {
                    $group = 'view';
                } elseif (in_array($action, $group_permission['add'])) {
                    $group = 'add';
                } elseif (in_array($action, $group_permission['edit'])) {
                    $group = 'edit';
                } elseif (in_array($action, $group_permission['delete'])) {
                    $group = 'delete';
                } else {
                    if (str_contains($route_name, 'get_')) {
                        $group = 'view';
                    } elseif (str_contains($route_name, 'save_')) {
                        $group = 'add';
                    } else {
                        $group = 'other';
                    }
                }

                $attributes_main = [
                    'route_name' => $route_name
                ];

                $attributes = [
                    'name' => __($route_name),
                    'group' => $group,
                    'module' => $module,
                    'page' => $page,
                    'action' => $action,
                ];

                Permissions::updateOrCreate($attributes_main, $attributes);
            }
        }

        $resp = ['success' => 1, 'code' => 200, 'msg' => 'success'];

        return response()->json(
            $resp,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }


}
