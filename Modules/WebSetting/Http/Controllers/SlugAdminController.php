<?php

namespace Modules\WebSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mwz\Entities\Slugs;
use Modules\Mwz\Http\Controllers\SlugController;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;

use Spatie\Sitemap\Tags\Url;
use Yajra\DataTables\DataTables;

class SlugAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $slug = [
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'index-index-1',
        //         'slug' => 'index',
        //         'lang' => 'en',
        //         'module' => 'index',
        //         'method' => 'index',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'index-index-1',
        //         'slug' => 'หน้าแรก',
        //         'lang' => 'th',
        //         'module' => 'index',
        //         'method' => 'index',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'search-search-1',
        //         'slug' => 'search',
        //         'lang' => 'en',
        //         'module' => 'search',
        //         'method' => 'search',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'search-search-1',
        //         'slug' => 'ค้นหาเบอร์มงคล',
        //         'lang' => 'th',
        //         'module' => 'search',
        //         'method' => 'search',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'product-productAll-1',
        //         'slug' => 'product',
        //         'lang' => 'en',
        //         'module' => 'product',
        //         'method' => 'productAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'product-productAll-1',
        //         'slug' => 'รายการเบอร์มงคล',
        //         'lang' => 'th',
        //         'module' => 'product',
        //         'method' => 'productAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'article-newsAll-1',
        //         'slug' => 'article',
        //         'lang' => 'en',
        //         'module' => 'article',
        //         'method' => 'newsAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'article-newsAll-1',
        //         'slug' => 'ข่าวสารและกิจกรรม',
        //         'lang' => 'th',
        //         'module' => 'article',
        //         'method' => 'newsAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'article-blogAll-1',
        //         'slug' => 'blogAll',
        //         'lang' => 'en',
        //         'module' => 'article',
        //         'method' => 'blogAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'article-blogAll-1',
        //         'slug' => 'บทความ',
        //         'lang' => 'th',
        //         'module' => 'article',
        //         'method' => 'blogAll',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'contact-contact-1',
        //         'slug' => 'contact',
        //         'lang' => 'en',
        //         'module' => 'contact',
        //         'method' => 'contact',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'contact-contact-1',
        //         'slug' => 'ติดต่อเรา',
        //         'lang' => 'th',
        //         'module' => 'contact',
        //         'method' => 'contact',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'register-register-1',
        //         'slug' => 'register',
        //         'lang' => 'en',
        //         'module' => 'register',
        //         'method' => 'register',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'register-register-1',
        //         'slug' => 'ลงทะเบียนกับเรา',
        //         'lang' => 'th',
        //         'module' => 'register',
        //         'method' => 'register',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [

        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'policy-policy-1',
        //         'slug' => 'policy',
        //         'lang' => 'en',
        //         'module' => 'policy',
        //         'method' => 'policy',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ],
        //     [
        //         'type' => 1,
        //         'level' => 1,
        //         'slug_uid' => 'policy-policy-1',
        //         'slug' => 'นโยบายความเป็นส่วนตัว',
        //         'lang' => 'th',
        //         'module' => 'policy',
        //         'method' => 'policy',
        //         'data_id' => 1,
        //         'param' => '',
        //         'meta_auther' => '',
        //         'meta_title' => '',
        //         'meta_keywords' => '',
        //         'meta_description' => '',
        //         'meta_image' => '',
        //         'meta_robots' => '',

        //     ]
        // ];

        // foreach ($slug as $value) {
        //     Slugs::create($value);
        // }
        return view('websetting::slug.index');
    }
    public function datatable_ajax(Request $request)
    {
        if ($request->ajax()) {

            //init datatable
            $dt_name_column = array('id', 'level', 'module', 'method', 'data_id',  'slug', 'slug_uid');
            $dt_order_column = $request->get('order')[0]['column'];
            $dt_order_dir = $request->get('order')[0]['dir'];
            $dt_start = $request->get('start');
            $dt_length = $request->get('length');
            $dt_search = $request->get('search')['value'];

            // create brand object
            $o_data = new Slugs();
            $o_data = $o_data->where('lang', 'th');
            // add search query if have search from datable

            if (!empty($dt_search)) {
                $o_data = $o_data->Where(function ($query) use ($dt_search) {
                    $query->orwhere('module', 'like', "%" . $dt_search . "%")
                        ->orwhere('method', 'like', "%" . $dt_search . "%")
                        ->orwhere('slug', 'like', "%" . $dt_search . "%");
                });
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
                ->setRowClass('slug_row')
                ->setTotalRecords($dt_total)
                ->setFilteredRecords($dt_total)
                ->setOffset($dt_start)
                ->editColumn('slug', function ($record) {
                    return limit($record->slug, 50);
                })
                ->addColumn('action', function ($record) {
                    $action_btn = '<div class="btn-list">';
                    if (mwz_roles('admin.setting.slug.edit')) {
                        $action_btn .= '<a href="' . route('admin.setting.slug.edit', $record->slug_uid) . '" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($record->type == 0 && mwz_roles('admin.setting.slug.set_delete')) {
                        $action_btn .= '<a onclick="setSlugDelete(' . $record->id . ')" href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>';
                    }
                    $action_btn .= '</div>';

                    return $action_btn;
                })
                ->escapeColumns([]);

            // response datatable json
            return $tables->make(true);
        }
    }

    public function form($slug_uid = '')
    {

        $slug = Slugs::where('slug_uid', $slug_uid)->first();
        $o_slug = new SlugController;
        $setting = $o_slug->getMetadata($slug->module, $slug->method, $slug->data_id);
        return view('websetting::slug.form', ['data_id' => $slug->data_id, 'metadata' => $setting]);
    }

    public function save(Request $request)
    {
        //// Check Slug
        $o_slug = new SlugController;
        if (!empty($o_slug->validatorSlug($request))) {
            $error = $o_slug->validatorSlug($request);
            $resp = ['success' => 0, 'code' => 301, 'msg' => $error['msg']];
            return response()->json($resp);
        }

        $o_slug->createMetadata($request, $request->get('data_id'));
        $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกข้อมูลสำเร็จ'];
        return response()->json($resp);
    }

    public function set_delete(Request $request)
    {
        if ($request->ajax()) {
            $slugs = Slugs::with('lang_slug')->find($request->get('id'));

            if (!empty($slugs->lang_slug)) {
                foreach ($slugs->lang_slug as $value) {
                    if (Slugs::find($value->id)->delete()) {
                        $resp = ['success' => 1, 'code' => 200, 'msg' => 'บันทึกการเปลี่ยนแปลงสำเร็จ'];
                    } else {
                        $resp = ['success' => 0, 'code' => 500, 'msg' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!'];
                        return response()->json($resp);
                    }
                }
            }
            return response()->json($resp);
        }
    }

    public function generate_sitemap()
    {
        // return URL::to('/');
        // SitemapGenerator::create('https://app.test')->writeToFile(public_path('sitemap/sitemap.xml'));
        $slug = Slugs::all();

        $sitemap = new Sitemap;
        if (!empty($slug)) {
            $sitemap->create();
            foreach ($slug as $value) {
                $lang = !empty($value->lang) && $value->lang == 'th' ? '/' : '/en/';
                $level = 0;
                switch ($value->level) {
                    case 1:
                        $level = 0.9;
                        break;
                    case 2:
                        $level = 0.8;
                        break;
                    default:
                        $level = 0.7;
                        break;
                }
                $sitemap->add(Url::create($lang . $value->slug)->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority($level));
            }
            $sitemap->writeToFile(public_path('sitemap.xml'));
        }
        // return $sitemap;
        return redirect()->back();
    }
}
