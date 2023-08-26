<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\ContactUs\Entities\ContactSubject;

class ContactSubjectAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::subject.index');
    }

    /**
     * Function : contact_subject datatable ajax response
     * Dev : Joe
     * Update Date : 23 nov 2021
     * @param Get
     * @return json of contactus
     */
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {
            //init datatable
            $dt_name_column = array('id', 'name_th', 'name_en', 'updated_at');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create contactus object
            $o_subject = new ContactSubject;

            // add search query if have search from datable
            if (!empty($dt_search)) {
                $o_subject =  $o_subject->where('id', 'like', "%$dt_search%")
                    ->orwhere('name_th', 'like', "%$dt_search%")
                    ->orwhere('updated_at', 'like', "%$dt_search%");
            }

            // set query order & limit from datatable
            $o_subject =  $o_subject->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query contactus as tree resule
            $subject = $o_subject->orderBy('sequence', 'ASC')->get();

            // count all category
            $dt_total = $subject->count();

            // prepare datatable for resonse
            $tables = datatables()::of($subject)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('master_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                //->setOffset($dt_start)
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    if ($record->status == 1) {
                        $action_btn .= '<a onclick="setStatusSubject(' . $record->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
                    } else {
                        $action_btn .=  '<a onclick="setStatusSubject(' . $record->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
                    }

                    $action_btn .= '<a href="' . route('admin.contactus.subject.edit', $record->id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';

                    $action_btn .= '<a onclick="setDeleteSubject(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';

                    $action = '</div>';

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
            $data = ContactSubject::find($id);
        }
        return view('contactus::subject.form', ['data' => $data]);
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
            // 'id' => 'integer',
            'name_th' => 'max:500',
            'name_en' => 'max:500',
            // 'to_email' => 'max:500',
            // 'cc_email' => 'max:500',
            'sequence' => 'max:500',
            'status' => 'max:200',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 0, 'msg' => 'error', 'error' => $errors];
            return response()->json($resp);
        }

        $attributes = [
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "sequence" => $request->get('sequence'),
            "status" => $request->get('status'),
        ];

        if (!empty($request->get('id'))) {
            $contactsubject = ContactSubject::where('id', $request->get('id'))->update($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
        } else {
            $contactsubject = ContactSubject::create($attributes);
            $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มข้อมูลสำเร็จ'];
        }

        return response()->json($resp);
    }

    /**
     * Function : update subject  status
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

            $subject = ContactSubject::find($id);
            $subject->status = $status;

            if ($subject->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลง'];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => 'การเปลี่ยนแปลงล้มเหลว'];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : delete  Subject
     * Dev : Joe
     * Update Date : 24 nov 2021
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $subject = ContactSubject::find($id);

            if ($subject->delete()) {
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
                    ContactSubject::find($id)->update(['sequence' => $sequence]);
                }
                $resp = ['success' => 1, 'code' => 200, 'msg' => 'เรียงข้อมูลใหม่สำเร็จ'];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => 'ไม่มีข้อมูลที่ต้องเรียง'];
            }

            return response()->json($resp);
        }
    }
}
