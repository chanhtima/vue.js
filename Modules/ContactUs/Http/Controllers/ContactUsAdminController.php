<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables;

use Modules\Mwz\Http\Controllers\MwzController;
use Modules\ContactUs\Entities\Contacts;
use Modules\ContactUs\Entities\ContactPages;
use Modules\ContactUs\Entities\ContactSubject;
use Modules\User\Http\Controllers\RoleController;

use Modules\ContactUs\Http\Controllers\ContactUsController;
use Modules\Mwz\Http\Controllers\SlugController;

class ContactUsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::contact.index');
    }

    /**
     * Function : contactus datatable ajax response
     * Dev : Dave
     * Update Date : 14 jul 2021
     * @param Get
     * @return json of contactus
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {
            //init datatable
            $dt_name_column = array('id', 'name', 'email', 'subject', 'created_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create contactus object
            $o_contactus = new Contacts;

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_contactus = $o_contactus->where('created_at', 'like', "%$dt_search%")
                    ->orWhere('name', 'like', "%$dt_search%")
                    ->orWhere('subject', 'like', "%$dt_search%");
            }

            $dt_total = $o_contactus->count();
            // set query order & limit from datatable
            $o_contactus = $o_contactus->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query contactus as tree resule
            $contactus = $o_contactus->get();

            // prepare datatable for resonse
            $tables = Datatables::of($contactus)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('master_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->editColumn('created_at', function ($record) {
                    return $record->created_at->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    // if ($record->status == 1) {
                    //     $action_btn .= '<a onclick="setUpdateStatus(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
                    // } else {
                    //     $action_btn .=  '<a onclick="setUpdateStatus(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
                    // }
                    if (mwz_roles('admin.contactus.contact.edit')) {
                        $action_btn .= '<a href="' . route('admin.contactus.contact.edit', $record->id) . '" class="btn btn-outline-primary"><i class="fa fa-search"></i></a>';
                    }
                    if (mwz_roles('admin.contactus.contact.set_delete')) {
                        $action_btn .= '<a onclick="setDelete(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
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
     * Function : add con$contactus form
     * Dev : Dave
     * Update Date : 14 jul 2021
     * @param GET
     * @return category form view
     */
    public function form($id = 0)
    {
        $contactus = [];
        if (!empty($id)) {
            $contactus = Contacts::find($id);
        }
        return view('contactus::contact.form', ['contactus' => $contactus]);
    }

    /**
     * Function : delete  category
     * Dev : Dave
     * Update Date : 14 jul 2021
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $member = Contacts::find($id);

            if ($member->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'ลบรายชื่อผู้ติดต่อสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'ลบรายชื่อผู้ติดต่อล้มเหลว'];
            }

            return response()->json($resp);
        }
    }
}
