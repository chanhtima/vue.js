<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\ContactUs\Entities\ContactBranch;

class ContactBranchAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::branch.index');
    }

    /**
     * Function : contact_Branch datatable ajax response
     * Dev : Joe
     * Update Date : 23 nov 2021
     * @param Get
     * @return json of contactus
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {
            //init datatable
            $dt_name_column = array('sequence', 'name_th', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create contactus object
            $o_branch = new ContactBranch;

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_branch =  $o_branch->where('id', 'like', "%$dt_search%")
                    ->orwhere('name_th', 'like', "%$dt_search%")
                    ->orwhere('updated_at', 'like', "%$dt_search%");
            }

            $dt_total = $o_branch->count();

            // set query order & limit from datatable
            $o_branch =  $o_branch->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query contactus as tree resule
            $Branch = $o_branch->orderBy('sequence', 'ASC')->get();

            // count all category

            // prepare datatable for resonse
            $tables = datatables()::of($Branch)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('master_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';
                    if (mwz_roles('admin.contactus.branch.edit')) {
                        if ($record->status == 1) {
                            $action_btn .= '<a onclick="setStatusBranch(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
                        } else {
                            $action_btn .=  '<a onclick="setStatusBranch(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
                        }
                        $action_btn .= '<a href="' . route('admin.contactus.branch.edit', $record->id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';
                    }
                    if (mwz_roles('admin.contactus.branch.set_delete')) {
                        $action_btn .= '<a onclick="setDeleteBranch(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
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
     * Function : add contact_page form
     * Dev : Jang
     * Update Date : 26 october 2021
     * @param GET
     * @return category form view
     */
    public function form($id = 0)
    {
        $data = [];
        if (!empty($id)) {
            $data = ContactBranch::find($id);
        }
        return view('contactus::branch.form', ['data' => $data]);
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
        $validator = Validator::make($request->all(), [
            "name_th" => 'required',
            "name_en" => 'required',
            "office_th" => 'required',
            "office_en" => 'required',
            "email" => 'required',
            "phone" => 'required',
        ], [
            "name_th.required" => 'กรุณาระบุ ชื่อภาษาไทย',
            "name_en.required" => 'กรุณาระบุ ภาษาอังกฤษ',
            "office_th.required" => 'กรุณาระบุที่ตั้งสำนักงาน ชื่อภาษาไทย',
            "office_en.required" => 'กรุณาระบุที่ตั้งสำนักงาน ภาษาอังกฤษ',
            "email.required" => 'กรุณาระบุ อีเมล',
            "phone.required" => 'กรุณาระบุ หมายเลขโทรศัพท์',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 0, 'msg' => $errors->first(), 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "office_th" => mwz_setTextString($request->get('office_th')),
            "office_en" => mwz_setTextString($request->get('office_en')),
            "email" => $request->get('email'),
            "phone" => $request->get('phone'),
            "fax" => $request->get('fax'),
            "facebook" => $request->get('facebook'),
            "messenger" => $request->get('messenger'),
            "line" => $request->get('line'),
            "youtube" => $request->get('youtube'),
            "instagram" => $request->get('instagram'),
            "tiktok" => $request->get('tiktok'),
            "google_map" => $request->get('google_map'),
            "status" => $request->get('status')
        ];
        if (empty($request->get('sequence'))) {
            $sequence = ContactBranch::max('sequence');
            (int)$sequence += 1;
            $attributes["sequence"] = $sequence;
        } else {
            $attributes["sequence"] = $request->get('sequence');
        }
        $attr = ['id' => (!empty($request->get('id')) ? $request->get('id') : null)];
        $contact = ContactBranch::updateOrCreate($attr, $attributes);
        if ($contact->save()) {
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกสำเร็จ'];
        } else {
            $resp = ['success' => 0, 'code' => 200, 'msg' => 'เกิดข้อผิดพลาด โปรดลองอีกครั้ง'];
        }

        return response()->json($resp);
    }

    /**
     * Function : update Branch  status
     * Dev : Joe
     * Update Date : 24 nov 2021
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $Branch = ContactBranch::find($id);
            $Branch->status = $status;

            if ($Branch->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลง'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'การเปลี่ยนแปลงล้มเหลว'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : delete  Branch
     * Dev : Joe
     * Update Date : 24 nov 2021
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $Branch = ContactBranch::find($id);

            if ($Branch->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'ลบข้อมูลสำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'ลบข้อมูลล้มเหลว'];
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
                    ContactBranch::find($id)->update(['sequence' => $sequence]);
                }
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'เรียงข้อมูลใหม่สำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => 'ไม่มีข้อมูลที่ต้องเรียง'];
            }

            return response()->json($resp);
        }
    }
}
