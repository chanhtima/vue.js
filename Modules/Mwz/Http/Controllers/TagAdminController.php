<?php

namespace Modules\Mwz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Mwz\Entities\Tags;
use Yajra\DataTables\Facades\DataTables;

class TagAdminController extends Controller
{
    public function index()
    {
        return view('mwz::tag.index');
    }

    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('id', 'type', 'head', 'body');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create brand object
            $o_data = new Tags();

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_data = $o_data->where('type', 'like', "%" . $dt_search . "%")
                    ->orWhere('head', 'like', "%" . $dt_search . "%")
                    ->orWhere('body', 'like', "%" . $dt_search . "%");
            }

            $dt_total = $o_data->count();
            // set query order & limit from datatable
            $o_data = $o_data->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query brand
            $slug = $o_data->get();
            // prepare datatable for response
            $tables = DataTables::of($slug)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('brand_row')
                ->setTotalRecords($dt_total)
                ->editColumn('head', function ($record) {
                    return limit($record->head, 60);
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    $action_btn .= mwz_update_status_button('admin.mwz.tag.set_status', $record->id, 'setUpdateStatus', $record->status);

                    $action_btn .= mwz_edit_button('admin.mwz.tag.edit', $record->id);

                    $action_btn .= mwz_delete_button('admin.mwz.tag.set_delete', $record->id, 'setDelete');

                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }

    public function form($id = 0)
    {
        $data = [];
        if (!empty($id)) {
            $data = Tags::find($id);
            $data->head = mwz_getTextString($data->head);
            $data->body = mwz_getTextString($data->body);
        }
        return view('mwz::tag.form', ['data' => $data]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'head' => 'required',
            'body' => 'required',
            'status' => 'required',
        ], [
            'type.required' => 'โปรดระบุ ประเภท',
            'head.required' => 'โปรดระบุ Head',
            'body.required' => 'โปรดระบุ Body',
            'status.required' => 'โปรดระบุ สถานะ',
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            $msg = $errors->first();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $msg, 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            'type' => $request->get('type'),
            'head' => mwz_setTextString($request->get('head')),
            'body' => mwz_setTextString($request->get('body')),
            'status' => $request->get('status')
        ];

        if (!empty($request->get('id'))) {
            $setting = Tags::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::module.admin.save_success')];
        } else {
            $setting = Tags::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::module.admin.save_success')];
        }
        return response()->json($resp);
    }

    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $menu = Tags::find($request->get('id'));
            $menu->status = $request->get('status');

            if ($menu->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::module.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('mwz::module.admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }

    public function set_delete(Request $request)
    {
        if ($request->ajax()) {

            if (Tags::find($request->id)->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('mwz::module.admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('mwz::module.admin.error_try_again')];
                return response()->json($resp);
            }
            return response()->json($resp);
        }
    }
}
