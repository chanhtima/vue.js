<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\App;
use Modules\Mwz\Entities\AdminMenus;
use Modules\User\Entities\Roles;
use Modules\User\Entities\Permissions;
use Modules\User\Entities\RolesAndPermissions;
use Modules\Mwz\Http\Controllers\MwzController;

class RoleAdminController extends Controller
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
     * Function : role index
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param Get
     * @return index.blade view
     */
    public function index()
    {
        return view('user::role.index');
    }

    /**
     * Function : role datatable ajax response
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param Get
     * @return json of role
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('id', 'name', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create role object
            $o_role = new Roles();

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_role = $o_role->where('name', 'like', "%" . $dt_search . "%");
            }

            $dt_total = $o_role->count();
            // set query order & limit from datatable
            $o_role = $o_role->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query role
            $role = $o_role->get();
            // prepare datatable for response
            $tables = Datatables::of($role)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('role_row')
                ->setTotalRecords($dt_total)
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

                    $action_btn .= mwz_update_status_button('admin.user.role.set_status', $record->id, 'setUpdateStatus', $record->status);

                    $action_btn .= mwz_edit_button('admin.user.role.edit', $record->id);

                    $action_btn .= mwz_delete_button('admin.user.role.set_delete', $record->id, 'setDelete');

                    $action_btn .= '</div>';

                    return $action_btn;


                    $action_btn = '<div class="btn-list">';

                    if ($record->status == 1) {
                        $action_btn .= '<a onclick="setUpdateStatus(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
                    } else {
                        $action_btn .=  '<a onclick="setUpdateStatus(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
                    }
                    if (mwz_roles('admin.user.role.edit')) {
                        $action_btn .= '<a href="' . route('admin.user.role.edit', [$record->type, $record->id]) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';
                        }
                    if (mwz_roles('admin.user.role.set_delete')) {
                        $action_btn .= '<a onclick="setDelete(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
                        $action_btn .= '</div>';
                    }

                    return $action_btn;

                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }


    /**
     * Function : update role status
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

            $role = Roles::find($id);
            $role->status = $status;

            if ($role->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('user::role.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : delete role
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $role = Roles::find($id);



            if ($role->delete()) {
                if (RolesAndPermissions::where('role_id', $id)->count()) {
                    RolesAndPermissions::where('role_id', $id)->delete();
                }
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('user::role.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : add role form
     * Dev : Tong
     * Update Date : 11 Oct 2022
     * @param GET
     * @return role form view
     */
    public function form($id = 0)
    {
       
        $role = [];
        $checked = [];
        if (!empty($id)) {
            $role = Roles::find($id);
            $checked['all'] = $role->all;
            $checked['module'] = json_decode($role->module, 1);
            $checked['group'] = json_decode($role->group, 1);
            $checked['permissions'] = json_decode($role->permissions, 1);
        }
        // dump($checked);
        $permissions = Permissions::orderBy('sequence')->orderBy('module', 'asc')->orderBy('action', 'asc')->orderBy('action', 'asc')->get();
        $permission_list = [];
        foreach ($permissions as $p) {
            $permission_list[$p->module][$p->group][] = $p->toArray();
        }

        $menu = AdminMenus::where('status',1)->orderBy('sequence')->get();
        $menu_list = [];
        foreach($menu as $val_menu){
            // dump( $val_menu);
            if($val_menu->parent_id == null){
                $menu_list[$val_menu->name_th] = $val_menu->name_th;
            }
           
        }
        dump($permission_list);
        return view('user::role.form', ['data' => $role, 'permissions' => $permission_list, 'checked' => $checked,'menu_list' => $menu_list]);
    }

    /**
     * Function : role save
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
            'permissions' => 'required',

        ], [
            'name.*' => 'โปรดระบุชื่อ!',
            'permissions.*' => 'โปรดเลือกสิทธิ์!',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msg = $errors->first();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $msg, 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "name" => $request->get('name'),
            "all" => (!empty($request->get('all'))) ? $request->get('all') : '',
            "module" => (!empty($request->get('module'))) ? json_encode($request->get('module')) : '',
            "group" => (!empty($request->get('group'))) ? json_encode($request->get('group')) : '',
            "permissions" => (!empty($request->get('permissions'))) ? json_encode($request->get('permissions')) : '',
            "status" => 1,
        ];


        if (!empty($request->get('id'))) {
            $data_id = $request->get('id');
            $role = Roles::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.save_success')];
        } else {
            // insert new row

            // get max sequence
            $sequence = Roles::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;

            $role = Roles::create($attributes);
            $data_id = $role->id;
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.save_success')];
        }

        // create role permission
        if (RolesAndPermissions::where('role_id', $data_id)->count()) {
            RolesAndPermissions::where('role_id', $data_id)->delete();
        }
        if (!empty($request->get('permissions'))) {
            $permissions = $request->get('permissions');
            foreach ($permissions as $key => $permission) {
                $attributes = [
                    'role_id' => $data_id,
                    'permission_id' => $permission
                ];
                RolesAndPermissions::create($attributes);
            }
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
        $lists = Roles::orderBy('sequence', 'asc')->get();
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
                    Roles::find($id)->update(['sequence' => $sequence]);
                }
                $this->re_order();
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::role.admin.no_need_order')];
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
                $result = Roles::find($id);
                $new_sequence = $result->sequence + 1;

                $upnode = Roles::where([['sequence', '>=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $upnode->sequence = $result->sequence;
                $upnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }
            if ($move == 'down') {
                $result = Roles::find($id);
                $new_sequence = $result->sequence - 1;

                $downnode = Roles::where([['sequence', '<=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $downnode->sequence = $result->sequence;
                $downnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }
            $this->re_order();
            if ($content) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('user::role.admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::role.admin.no_need_order')];
            }
        } else {
            $resp = ['success' => 0, 'code' => 300, 'msg' => __('user::role.admin.no_need_order')];
        }

        return response()->json($resp);
    }

    /**
     * Function :  get role
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response update content up
     */
    public function get_role(Request $request)
    {
        $roles = Roles::orderBy('sequence', 'asc')->get();
        $result = [];
        foreach ($roles as $role) {
            $result[] = [
                'id' => $role->id,
                'text' => $role->name,
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

    public function generate_role()
    {
        $group_role = [
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

                if (in_array($action, $group_role['view'])) {
                    $group = 'view';
                } elseif (in_array($action, $group_role['add'])) {
                    $group = 'add';
                } elseif (in_array($action, $group_role['edit'])) {
                    $group = 'edit';
                } elseif (in_array($action, $group_role['delete'])) {
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

                Roles::updateOrCreate($attributes_main, $attributes);
            }
        }
    }

    
}
