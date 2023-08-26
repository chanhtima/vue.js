<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Modules\Mwz\Http\Controllers\SlugController;
use Modules\Products\Entities\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Yajra\DataTables\Facades\DataTables;

class ProductAdminController extends Controller
{
   /**
     * Function : __construct check admin login
     * Dev : Tong
     * Update Date : 16 Jun 2021
     * @param Get
     * @return if not login redirect to /admin
     */

     public function __construct()
     {
         $this->middleware('auth:admin');
         Config::set('site_currency', "THB");
     }
 
     function pre($a)
     {
         echo '<pre>';
         print_r($a);
         echo '</pre>';
     }
 
     function getLabel($id = 0)
     {
         $labels = array(
             1 => 'New',
             2 => 'Sale'
         );
         if ($id == 0) {
             return $labels;
         } else {
             return $labels[$id];
         }
     }
 
     /**
      * Function : product index 
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param Get
      * @return index.blade view
      */
     public function index()
     {
         return view('products::product.index');
     }
 
     /**
      * Function : product datatable ajax response 
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param Get
      * @return json of product 
      */
     public function datatable_ajax(Request $request)
     {
         if ($request->ajax()) {
 
             //init datatable
             $dt_name_column = array('sort', 'image', 'name_th', 'updated_at', 'action');
             $dt_order_column = $request->get('order')[0]['column'];
             $dt_order_dir = $request->get('order')[0]['dir'];
             $dt_start = $request->get('start');
             $dt_length = $request->get('length');
             $dt_search = $request->get('search')['value'];
 
             // create product object 
             $o_product = new Product;
 
 
             // except delete status
             $o_product = $o_product->where('delete_status', 0);
 
             // add search query if have search from datable
             if (!empty($dt_search)) {
                 $o_product = $o_product->where(function ($query) use ($dt_search) {
                     $query->where('name_th', 'like', "%" . $dt_search . "%")
                         ->orWhere('updated_at', 'like', "%" . $dt_search . "%");
                 });
             }
 
             $dt_total = $o_product->count();
             // set query order & limit from datatable
             $o_product = $o_product->orderBy($dt_name_column[$dt_order_column], $dt_order_dir)
                 ->limit($dt_length)
                 ->offset($dt_start);
 
             // query product resule
             $products = $o_product->get();
 
 
             // prepare datatable for resonse
             $tables = Datatables::of($products)
                 ->addIndexColumn()
                 ->setRowId('id')
                 ->setRowClass('product_row')
                 ->setTotalRecords($dt_total)
                 ->setFilteredRecords($dt_total)
                 ->setOffset($dt_start)
                 ->setRowAttr([
                     'data-sort' => function ($record) {
                         return $record->sort;
                     },
                 ])
                //  ->setRowClass(function ($record) {
 
                //      return $record->index_status  == 1 ? 'active alert-secondary' : '';
                //  })
                 ->editColumn('images', function ($product) {
                     $images = json_decode($product->images, true);
                     if (!empty($images[0]['image']) && CheckFileInServer($images[0]['image'])) {
                             return '<img src="' . $images[0]['image'] . '" style="max-height: 60px" />';
                     }
                 })
                 ->editColumn('updated_at', function ($product) {
                     return  date('Y-m-d H:i', strtotime($product->updated_at));
                 })
                 ->addColumn('action', function ($product) {
                     $action_btn = '<div class="btn-list">';
                     if (mwz_roles('admin.product.list.edit')) {
 
                         if ($product->status == 1) {
                             $action_btn .= '<a onclick="setUpdateStatus(' . $product->id . ',0)" href="javascript:void(0);" class="btn btn-outline-success"><i class="fa fa-check"></i></a>';
                         } else {
                             $action_btn .=  '<a onclick="setUpdateStatus(' . $product->id . ',1)" href="javascript:void(0);"  class="btn btn-outline-warning"><i class="fa fa-times"></i></a>';
                         }
                         $action_btn .= '<a href="' . route('admin.product.list.edit', $product->id) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';
                     }
                     if (mwz_roles('admin.product.list.set_delete')) {
                         $action_btn .= '<a onclick="setDelete(' . $product->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
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
                    Product::find($id)->update(['sort' => $sequence]);
                 }
                 $resp = ['success' => 1, 'code' => 200, 'msg' => 'เรียงข้อมูลใหม่สำเร็จ'];
             } else {
                 $resp = ['success' => 0, 'code' => 300, 'msg' => 'ไม่มีข้อมูลที่ต้องเรียง'];
             }
 
             return response()->json($resp);
         }
     }
 
     /**
      * Function : add product form
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param GET
      * @return category form view
      */
     public function form($id = 0)
     {
         $metadata = [
             'th' => [
                 'module' => 'product',
                 'method' => 'productDetail',
                 'level' => 3
             ],
             'en' => [
                 'module' => 'product',
                 'method' => 'productDetail',
                 'level' => 3
             ],
         ];
         $product = [];
         $setting = [];
         if (!empty($id)) {
             $product_data = Product::find($id);
             // dd($product_data);
             $product_data->description_th = mwz_getTextString($product_data->description_th);
             $product_data->description_en = mwz_getTextString($product_data->description_en);
             $product_data->detail_th = mwz_getTextString($product_data->detail_th);
             $product_data->detail_en = mwz_getTextString($product_data->detail_en);
             $product_data->images = json_decode($product_data->images, true);
             $product_data->gallery = json_decode($product_data->gallery, true);
             $product_data->tags_th_arr = explode(',', $product_data->tags_th);
             $product_data->tags_en_arr = explode(',', $product_data->tags_en);
             $product_data->related_product = json_decode($product_data->related_product, true);
 
             $o_slug = new SlugController;
             $setting = $o_slug->getMetadata('product', 'productDetail', $product_data->id);
             $metadata = !empty($setting) ? $setting : $metadata;
             $labels = [];
             if (!empty($product_data->labels) && $product_data->labels != '') {
                 $labels_arr = json_decode($product_data->labels, true);
                 foreach ($labels_arr as $k => $label) {
                     $labels[] = $label['id'];
                 }
             }
             $product['labels'] = $labels;
             $product['data'] = $product_data;
             $product['color'] = json_decode($product_data->color, true);
             $product['size'] = json_decode($product_data->size, true);
         }
         // ->totree()
         $data['product_all'] = mwz_setFlatCategory(Product::all());
         unset($data['product_all'][$id]);
 
         $data['labels'] = $this->getLabel(0);
         // dd(Products::all());
         return view('products::product.form', ['data' => $data, 'product' => $product, 'metadata' => $metadata]);
     }
 
     /**
      * Function :  product save 
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param POST
      * @return json response status
      */
     public function save(Request $request)
     {
         // dd($request->all());
         $validator = Validator::make($request->all(), [
             'name_th' => 'required|max:350',
             'name_en' => 'required|max:350',
             'description_th' => 'max:700',
             'description_en' => 'max:700',
         ], [
             'name_th.*' => 'โปรดระบุ ชื่อหัวข้อ ภาษาไทย ไม่เกิน 350 ตัวอักษร! ',
             'name_en.*' => 'โปรดระบุ ชื่อหัวข้อ ภาษาอังกฤษ ไม่เกิน 350 ตัวอักษร!',
             'description_th.*' => 'โปรดระบุ คำอธิบาย ภาษาไทย ไม่เกิน 700 ตัวอักษร! ',
             'description_en.*' => 'โปรดระบุ คำอธิบาย ภาษาอังกฤษ ไม่เกิน 700 ตัวอักษร!',
         ]);
 
 
         if ($validator->fails()) {
             $errors = $validator->errors();
             $msg = $errors->first();
             $resp = ['success' => 0, 'code' => 0, 'msg' => $msg, 'error' => $errors];
             return response()->json($resp);
         }

         // Check Slug
         $o_slug = new SlugController;
            if (!empty($o_slug->validatorSlug($request))) {
                $error = $o_slug->validatorSlug($request);
                $resp = ['success' => 0, 'code' => 301, 'msg' => $error['msg']];
                return response()->json($resp);
            }
         $attributes = [
             "name_th" => $request->get('name_th'),
             "related_product" => json_encode($request->get('related_product')),
             "description_th" => mwz_setTextString($request->get('description_th')),
             "detail_th" => mwz_setTextString($request->get('detail_th')),
             "name_en" => $request->get('name_en'),
             "description_en" => mwz_setTextString($request->get('description_en')),
             "detail_en" => mwz_setTextString($request->get('detail_en')),
             "link" => $request->get('link'),
             "index_status" => !empty($request->get('index_status')) ? $request->get('index_status') : 0,
             "status" => !empty($request->get('status')) ? $request->get('status') : 0,
         ];
         if (empty($request->get('sort'))) {
             $sort = Product::max('sort');
             (int)$sort += 1;
             $attributes["sort"] = $sort;
         } else {
             $attributes["sort"] = $request->get('sort');
         }

         //check แสดงหน้าแรก ไม่เกิน 6 รายการ
         if(!empty($request->get('index_status'))){
            $product_index = Product::where("index_status",1)->count();
            if (!empty($request->get('id'))) {
                //edit
                if( $product_index > 6){
                    $resp = ['success' => 0, 'code' => 0, 'msg' => "รายการแสดงหน้าแรก สูงสุดที่ 6 รายการ"];
                    return response()->json($resp);
                }
            }else{
                //add
                if( $product_index >= 6){
                    $resp = ['success' => 0, 'code' => 0, 'msg' => "รายการแสดงหน้าแรก สูงสุดที่ 6 รายการ"];
                    return response()->json($resp);
                }
            }
         }

         $delelte_temp = [];
         $images = [];
         if (!empty($request->get('id'))) {
 
             // old image
             if (!empty($request->get('hide_uploadfiles'))) {
                 foreach ($request->get('hide_uploadfiles') as $k => $v) {
                     $images[$k]['image'] = $v;
                 }
             }
             // replace or add new image 
             if ($request->hasFile('uploadfiles')) {
                 foreach ($request->file('uploadfiles') as $k => $v) {
                     $image = $v;
                     $new_filename = time() . '_' . $k . '.' . $image->extension();
                     $path = $image->move(
                         public_path('/storage/product'),
                         $new_filename
                     );
                     $images[$k]['image'] = Storage::url('public/product/' . $new_filename);
                 }
             }
         } else {
             if ($request->hasFile('uploadfiles')) {
                 foreach ($request->file('uploadfiles') as $k => $v) {
                     $image = $v;
                     $new_filename = time() . '_' . $k . '.' . $image->extension();
                     $path = $image->move(
                         public_path('/storage/product'),
                         $new_filename
                     );
                     $images[$k]['image'] = Storage::url('public/product/' . $new_filename);
                 }
             }
         }
         $attributes['images'] = json_encode($images, JSON_UNESCAPED_UNICODE);
         $product_id = 0;
 
         // -------------- save product -------------- //
         if (!empty($request->get('id'))) {
             $product = Product::where('id', $request->get('id'))->update($attributes);
             Storage::delete($delelte_temp);
             $product_id = $request->get('id');
             $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ', 'id' => $request->get('id')];
         } else {
             $product = Product::create($attributes);
             $product->save();
             $product_id = $product->id;
             $resp = ['success' => 1, 'code' => 200, 'msg' => 'เพิ่มรายการใหม่สำเร็จ', 'id' => $product->id];
         }
         // $this->save_image_multi($request);
         $o_slug->createMetadata($request, $product_id);
         return response()->json($resp);
     }
 
     /**
      * Function : update product  sort
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param POST
      * @return json of update sort
      */
     public function set_sort(Request $request)
     {
         if ($request->ajax()) {
             $id = $request->get('id');
             $old_val = $request->get('old_val');
             $new_val = $request->get('new_val');
             $att = array(
                 'sort' => $new_val
             );
             if ($new_val > $old_val) { // +
                 Product::where('id', '=', $id)->update($att);
                 Product::where([['id', '!=', $id], ['sort', '<=', $new_val], ['sort', '>', $old_val]])->decrement('sort', 1);
             } else if ($new_val < $old_val) { // -
                Product::where('id', '=', $id)->update($att);
                Product::where([['id', '!=', $id], ['sort', '>=', $new_val], ['sort', '<', $old_val]])->increment('sort', 1);
             } else {
                 // equal $new_val = $old_val
             }
             $resp = ['success' => 1, 'code' => 200, 'msg' => 'update sort complete'];
             return response()->json($resp);
         }
     }
 
     /**
      * Function : update product  status
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param POST
      * @return json of update status
      */
     public function set_status(Request $request)
     {
         if ($request->ajax()) {
             $id = $request->get('id');
             $status = $request->get('status');
 
             $product = Product::find($id);
             $product->status = $status;
 
             if ($product->save()) {
                 $resp = ['success' => 1, 'code' => 200, 'msg' => 'update product complete'];
             } else {
                 $resp = ['success' => 0, 'code' => 500, 'msg' => 'error update product'];
             }
 
             return response()->json($resp);
         }
     }
 
     /**
      * Function : delete product 
      * Dev : Tong
      * Update Date : 16 Jun 2021
      * @param POST
      * @return json of delete status
      */
     public function set_delete(Request $request)
     {
         if ($request->ajax()) {
             // change status to delete
             $id = $request->get('id');
 
             $product = Product::find($id);
             $product->delete_status = 1;
 
             // delete slug
             $o_slug = new SlugController;
             $o_slug->delete_slug("product", "productDetail", $id);
 
             if ($product->save()) {
                 $resp = ['success' => 1, 'code' => 200, 'msg' => 'delete product complete'];
             } else {
                 $resp = ['success' => 0, 'code' => 500, 'msg' => 'error delete product'];
             }
             return response()->json($resp);
         }
     }
 
     /**
      * Function : filter product 
      * Dev : Wan
      * Update Date : 3 Nov 2022
      * @param POST
      * @return json of delete status
      */
     public function filter(Request $request)
     {
         if ($request->ajax()) {
             $s = $request->get('s');
             $product = Product::Where('name_en', 'LIKE', '%' . $s . '%')
                 ->Where('name_th', 'LIKE', '%' . $s . '%')->get();
             $resp = [];
             foreach ($product as $kk => $vv) {
                 $resp[$vv->id] =  $vv->name_th;
             }
         }
         echo response()->json($resp);
         // return response()->json($resp);
     }
 
     /**
      * Function : filter product 
      * Dev : Wan edit
      * Update Date : 3 Nov 2022
      * @param POST
      * @return json of save image multi
      */
     public function save_image_multi(Request $request)
     {
         if (!empty($request->get('id'))) {
             $field_name = 'image_multi';
             $upload_path = "/storage/product/" . $request->get('id');
             $gallery = [];
             $remove = [];
             // remove file if has
             if (!empty($request->get('id'))) {
                 // delete file from multiple
                 if ($request->get($field_name . '_file_removed') != '') {
                     $file_remove_list = json_decode($request->get($field_name . '_file_removed'));
                     if (!empty($file_remove_list)) {
                         foreach ($file_remove_list as $rm_file) {
                             $remove_file = $rm_file;
                             $remove[] = $rm_file;
                             if (Storage::disk('public')->exists($remove_file)) {
                                 Storage::disk('public')->delete($remove_file);
                             }
                         }
                     }
                 }else{
                     // upload file multiple
                     $uploaded = [];
                     if (!empty($request->get('hide_image_multi'))) {
                         foreach ($request->get('hide_image_multi') as $k1 => $v1) {
                             $uploaded[$k1] = $v1;
                         }
                     }
 
                      // replace or add new image 
                     if ($request->hasFile($field_name)) {
                         foreach ($request->file($field_name) as $k1 => $v1) {
                             $image = $v1;
                             $new_filename1 = $image->getClientOriginalName();
                             $path = $image->move(
                                 public_path($upload_path),
                                 $new_filename1
                             );
                             $uploaded[$k1] = $upload_path . '/' . $new_filename1;
                         }
                     }
                 }
             } else {
                 // upload file multiple
                 $uploaded = [];
                 if ($request->hasFile($field_name)) {
                     foreach ($request->file($field_name) as $k => $v) {
                         $image = $v;
 
                         // save file name by orignal name
                         $new_filename = $image->getClientOriginalName();
 
                         $path = $image->move(
                             public_path($upload_path),
                             $new_filename
                         );
 
                         $uploaded[] = $upload_path . '/' . $new_filename;
                     }
                 }
             }
             // set image json 
             $index_uploaded = 0;
             $file_lists = json_decode($request->get($field_name . '_file_list'), 1);
 
             if (!empty($file_lists) && count($file_lists) > 0) {
                 foreach ($file_lists as $fl) {
                     if ($fl['complete'] == false) {
                         $fl['image'] = $uploaded[$index_uploaded];
                         $fl['complete'] = true;
                         $gallery[] = $fl;
                         $index_uploaded++;
                     } else {
                             if (!in_array($fl['image'], $remove)) {
                                 $gallery[] = $fl;
                             }
                     }
                 }
             }
             $product = Product::find($request->get('id'));
             $product->gallery = json_encode($gallery, 1);
               
             $save_status = $product->save();
 
             if ($save_status) {
                 $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกรูปสำเร็จ', 'id' => $request->get('id')];
             } else {
                 $resp = ['success' => 0, 'code' => 300, 'msg' => 'บันทึกรูปไม่สำเร็จ', 'id' => $product->id];
             }
         } else {
             $resp = ['success' => 0, 'code' => 400, 'msg' => 'ไม่พบ ID สินค้า'];
         }
         return response()->json(
             $resp,
             200,
             ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
             JSON_UNESCAPED_UNICODE
         );
     }
 
     /**
      * Function : filter product 
      * Dev : Wan
      * Update Date : 3 Nov 2022
      * @param POST
      * @return json of set related product
      */
     public function set_related_product(Request $request)
     {
         $product_id = $request->get('related_product');
         $data = [];
         $html = "";
         foreach ($product_id as $kk => $val) {
             $info = Product::find($val);
             if (!empty($info)) {
                 $data[$kk]['image'] = json_decode($info->images, true)[0]['image'];
                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                     $data[$kk]['name'] = $info->name_th;
                     $name = $info->name_th;
                 } else {
                     $data[$kk]['name'] = $info->name_en;
                     $name = $info->name_en;
                 }
                 $html .= '<div class="card" style="width: 18rem;">'
                     . '<img class="card-img-top" src="' . json_decode($info->images, true)[0]['image'] . '" alt="Card image cap">'
                     . '<div class="card-body">'
                     . '<h5 class="card-title text-center">' . $name . '</h5>'
                     . '</div>'
                     . '</div>';
             }
         }
         return response()->json(['res' => $html]);
     }
 
 
     public function delete_image(Request $request)
     {
         if ($request->ajax()) {
             $id = $request->id;
             $image_id = $request->image_id;
             $products = Product::find($id);
 
             if(!empty($products)){
                 if($image_id > 0){
                     $i = $image_id - 4;
                 }else{
                     $i = $image_id;
                 }
                 $images = [];
                 $info = json_decode($products->images);
                   // loop data
                 foreach($info as $key => $val){
                     if($i == $key){
                         $images[$key]['image'] = '';
                     }else{
                         $images[$key]['image'] = $val->image;
                     }
                 }
                 $products->images = json_encode($images, JSON_UNESCAPED_UNICODE);
             }
            
             if ( $products->save()) {
                 $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
             } else {
                 $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
             }
             return response()->json($resp);
         }
     }
}
