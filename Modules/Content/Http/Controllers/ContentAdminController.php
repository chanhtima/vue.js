<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Content\Entities\Content;
use Modules\Mwz\Http\Controllers\SlugController;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContentAdminController extends Controller
{
    // enable special field for each type
    public $config = [
        'catalog' => ['desc' => false, 'detail' => false, 'category' => false, 'image' => true, 'clip' => false, 'file' => true, 'hashtag' => false, 'start_at' => true, 'end_at' => false],
        'saving' => ['desc' => true, 'detail' => true, 'category' => false, 'image' => true, 'clip' => false, 'file' => false, 'hashtag' => false, 'start_at' => true, 'end_at' => false],
        'news' => ['desc' => true, 'detail' => true, 'category' => false, 'image' => true, 'clip' => false, 'file' => false, 'hashtag' => false, 'start_at' => true, 'end_at' => false],
        'blog' => ['desc' => false, 'detail' => true, 'category' => false, 'image' => true, 'clip' => false, 'file' => false, 'hashtag' => false, 'start_at' => true, 'end_at' => false],
        'faq' => ['desc' => false, 'detail' => true, 'category' => false, 'image' => false, 'clip' => false, 'file' => false, 'hashtag' => false, 'start_at' => true, 'end_at' => false],
        'testimonial' => ['desc' => true, 'detail' => true, 'category' => true, 'image' => true, 'clip' => false, 'file' => false, 'hashtag' => false, 'start_at' => false, 'end_at' => false],
    ];

    // catalog
    /**
     * Function : __construct check admin login
     * Dev : tong
     * Update Date : 19 Sep 2022
     * @param Get
     * @return if not login redirect to /admin
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Function : content index
     * Dev : tong
     * Update Date : 19 Sep 2022
     * @param Get
     * @return index.blade view
     */
    public function index(Request $request, $type = 'blog')
    {
        $o_slug = new SlugController;
        $metadata = $o_slug->getMetadata('resource', $type, 0);
        return view('content::content.index', ['type' => $type, 'metadata' => $metadata, 'config' => $this->config[$type]]);
    }

    /**
     * Function : content datatable ajax response
     * Dev : tong
     * Update Date : 19 Sep 2022
     * @param Get
     * @return json of content
     */
    public function datatable_ajax(Request $request, $type = 'blog')
    {

        if ($request->ajax()) {

            $dt_name_column = array('sequence', 'image', 'name_th','updated_at', 'action');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create content object
            $o_content = new Content();
            $o_content = $o_content->Where('type', $type);

            // dt_search 
            if (!empty($dt_search)) {
                $o_content = $o_content->Where(function ($query) use ($dt_search) {
                    $query->where('name_th', 'like', "%$dt_search%")
                        ->orWhere('name_en', 'like', "%$dt_search%")
                        ->orWhere('updated_at', 'like', "%$dt_search%");
                });
            }

            // count all content
            $dt_total = $o_content->count();

            // set query order & limit from datatable
            $o_content->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                ->offset($dt_start)
                ->limit($dt_length);

            // query content
            $contents = $o_content->get();

            // prepare datatable for response
            $tables = Datatables::of($contents)
                ->addIndexColumn()
                ->setRowId('id')
                ->setRowClass('content_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->addColumn('sort', function ($record) {
                    return mwz_sort_button('admin.content.content.sort', $record->id, 'setUpdateSort');
                })
                ->editColumn('updated_at', function ($record) {
                    return $record->updated_at->format('d/m/Y H:i:s');
                })
                ->editColumn('image', function ($record) {
                    $img = '';
                    if (CheckFileInServer($record->image) && !empty($record->image)) {
                        $img = '<img width="80" class="rounded" src="' . $record->image . '" />';
                    }
                    return $img;
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';

                    $action_btn .= mwz_update_status_button('admin.content.content.set_status', $record->id, 'setUpdateStatus', $record->status);

                    // $action_btn .= '<a href="' . route('admin.content.content.edit', ['type' => $record->type, 'id' => $record->id]) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a></a>';
                    $action_btn .= mwz_edit_button('admin.content.content.edit', ['type' => $record->type, 'id' => $record->id]);

                    $action_btn .= mwz_delete_button('admin.content.content.set_delete', $record->id, 'setDelete');

                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }

    /**
     * Function : update content status
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json of update status
     */
    public function set_status(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $status = $request->get('status');

            $content = Content::find($id);
            $content->status = $status;

            if ($content->save()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('content::admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('content::admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }

    /**
     * Function : delete content
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json of delete status
     */
    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $content = Content::find($id);

            if ($content->delete()) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('content::admin.delete_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'msg' => __('content::admin.error_try_again')];
            }

            return response()->json($resp);
        }
    }


    /**
     * Function : add content form
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param GET
     * @return content form view
     */
    public function form(Request $request, $type = 'blog', $id = 0)
    {
        $metadata = [
            'th' => [
                'module' => 'content',
                'method' => $type,
                'level' => 3
            ],
            'en' => [
                'module' => 'content',
                'method' => $type,
                'level' => 3
            ],
        ];

        $content = [];

        if (!empty($id)) {
            $content = Content::where([['type', $type], ['id', $id]])->first();
            $content->desc_th = mwz_getTextString($content->desc_th);
            $content->desc_en = mwz_getTextString($content->desc_en);
            $content->detail_th = mwz_getTextString($content->detail_th);
            $content->detail_en = mwz_getTextString($content->detail_en);
            $content->hash_tag = json_decode($content->hash_tag, true);

            $o_slug = new SlugController;
            $meta = $o_slug->getMetadata($metadata['th']['module'], $metadata['en']['method'], $id);
            if (!empty($meta)) {
                $metadata = $meta;
            }
        }
        $hashtag = [];
        return view('content::content.form', ['content' => $content, 'type' => $type, 'config' => $this->config[$type], 'metadata' => $metadata, 'hashtag' => $hashtag]);
    }


    /**
     * Function : content save
     * Dev : Tong
     * Update Date : 19 Sep 2022
     * @param POST
     * @return json response status
     */
    public function save(Request $request)
    {
        $type = $request->get('type');

        //validate post data
        $validate = [
            'id' => 'integer',
            'type' => 'required',
            'name_th' => 'required|max:500',
            'name_en' => 'required|max:500',
            'detail_th' => 'required',
            'detail_en' => 'required',
            'status' => 'required'
        ];

        if ($this->config[$type]['desc']) {
            $validate['desc_th'] = 'required|max:500';
            $validate['desc_en'] = 'required|max:500';
        }

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $resp = ['success' => 0, 'code' => 301, 'msg' => $errors->first(), 'error' => $errors];
            return response()->json($resp);
        }

        //// Check Slug
        $o_slug = new SlugController;
        if (!empty($o_slug->validatorSlug($request))) {
            $error = $o_slug->validatorSlug($request);
            $resp = ['success' => 0, 'code' => 301, 'msg' => $error['msg']];
            return response()->json($resp);
        }

        // form content
        $config = $this->config[$type];

        if ($request->get('sequence') == "") {
            $sequence = DB::table('content')
                ->where('type', $request->get('type'))
                ->max('sequence');
            (int)$sequence += 1;
        } else {
            $sequence = $request->get('sequence');
        }
        $attributes = [
            "type" => $request->get('type'),
            "name_th" => $request->get('name_th'),
            "name_en" => $request->get('name_en'),
            "desc_th" => mwz_setTextString($request->get('desc_th')),
            "desc_en" => mwz_setTextString($request->get('desc_en')),
            "detail_th" => mwz_setTextString($request->get('detail_th')),
            "detail_en" => mwz_setTextString($request->get('detail_en')),
            "params" => $request->get('params'),
            "status" => !empty($request->get('status')) ? $request->get('status') : 0,
            "status_index" => !empty($request->get("index_status")) ? $request->get("index_status") : 0,
            "sequence" => $sequence
        ];
        if ($config['start_at']) {
            $attributes['start_at'] = !empty($request->get('start_at')) ? $request->get('start_at') : Carbon::now();
        }
        if ($config['end_at']) {
            $attributes['end_at'] = !empty($request->get('end_at')) ? $request->get('end_at') : Carbon::now();
        }

        // upload image
        $image = set_image_upload($request, 'image', $path = "public/content", "image-");
        if ($image) {
            $attributes['image'] = $image;
        }

        //check แสดงหน้าแรก ไม่เกิน 4 รายการ
        if(!empty($request->get('index_status')) and $request->get('index_status') == 1){
            $product_index = Content::where("status_index",1)->count();
            if(!empty($request->get('id'))){
                //edit
                if( $product_index > 4){
                    $resp = ['success' => 0, 'code' => 0, 'msg' => "รายการแสดงหน้าแรก สูงสุดที่ 4 รายการ"];
                    return response()->json($resp);
                }
            }else{
                //add
                if( $product_index >= 4){
                    $resp = ['success' => 0, 'code' => 0, 'msg' => "รายการแสดงหน้าแรก สูงสุดที่ 4 รายการ"];
                    return response()->json($resp);
                }
            }
           
         }
        if (!empty($request->get('id'))) {
            $content = Content::where('id', $request->get('id'))->update($attributes);
            $data_id = $request->get('id');
            $resp = ['success' => 1, 'code' => 201, 'data_type' => $request->get('type'), 'msg' => __('content::admin.save_success')];
        } else {
            $content = Content::create($attributes);
            $data_id = $content->id;
            $resp = ['success' => 1, 'code' => 200, 'data_type' => $request->get('type'), 'msg' => __('content::admin.save_success')];
        }
        $o_slug->createMetadata($request, $data_id);

        return response()->json($resp);
    }


    /**
     * Function : delete image
     * Dev : Tong
     * Update Date : 20 Sep 2022
     * @param POST
     * @return json of response
     */
    public function delete_image(Request $request)
    {

        if ($request->ajax()) {
            $id = $request->get('id');
            $content = Content::find($id);
            $content->image = '';
             
            if ($content->save()) {
                $resp = ['success' => 1, 'code' => 200, 'data_type' => $content->type, 'msg' => __('content::admin.save_success')];
            } else {
                $resp = ['success' => 0, 'code' => 500, 'data_type' => $content->type, 'msg' => __('content::admin.error_try_again')];
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
                    Content::find($id)->update(['sequence' => $sequence]);
                }
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('content::admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('content::admin.no_need_order')];
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
                $result = Content::find($id);
                $new_sequence = $result->sequence + 1;

                $upnode = Content::where([['sequence', '>=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $upnode->sequence = $result->sequence;
                $upnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }
            if ($move == 'down') {
                $result = Content::find($id);
                $new_sequence = $result->sequence - 1;

                $downnode = Content::where([['sequence', '<=', $result->sequence], ['id', '!=', $id], ['type', $result->type]])->orderBy('sequence', 'desc')->first();

                $downnode->sequence = $result->sequence;
                $downnode->save();

                $result->sequence = $new_sequence;
                $content = $result->save();
            }

            if ($content) {
                $resp = ['success' => 1, 'code' => 200, 'msg' => __('content::admin.order_success')];
            } else {
                $resp = ['success' => 0, 'code' => 300, 'msg' => __('content::admin.no_need_order')];
            }
        } else {
            $resp = ['success' => 0, 'code' => 300, 'msg' => __('content::admin.no_need_order')];
        }

        return response()->json($resp);
    }
}
