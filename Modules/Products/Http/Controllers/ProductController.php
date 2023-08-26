<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Modules\Mwz\Http\Controllers\SlugController;
use Modules\Products\Entities\Product;

class ProductController extends Controller
{
    public function getProductMenu()
    {
        $o_slug = new SlugController;
        $category = Product::where('status', 1)->orderBy('sort')->get();
        $data = [];
        if (!empty($category)) {
            foreach ($category as $k => $value) {
                $data[$k]['id'] = $value->id;
                // $data[$k]['image'] = $value->icon;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $data[$k]['name'] = $value->name_th;
                } else {
                    $data[$k]['name'] = $value->name_en;
                }
                $slug = $o_slug->getSlugUrl('product', 'productDetail', $value->id);
                if (!empty($slug['url'])) {
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                    } else {
                        $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                    }
                }
            }
        }
        return $data;
    }
    // public function getCategoryAll($limit = 0)
    // {
    //     $data = [];
    //     $o_slug = new SlugController;
    //     //category
    //     if($limit > 0){
    //         $category = ProductCategories::where('status', 1)->where('status_index',1)->orderBy('sequence')->get();
    //     }else{
    //         $category = ProductCategories::where('status', 1)->orderBy('sequence')->get();
    //     }
        
    //     if (!empty($category)) {
    //         foreach ($category as $k => $value) {
    //             $data[$k]['id'] = $value->id;
    //             $data[$k]['image'] = $value->image;
    //             if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                 $data[$k]['name'] = $value->name_th;
    //             } else {
    //                 $data[$k]['name'] = $value->name_en;
    //             }
    //             $slug = $o_slug->getSlugUrl('product', 'category', $value->id);
    //             if (!empty($slug['url'])) {
    //                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                     $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                 } else {
    //                     $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                 }
    //             }
    //             //brand
    //             $o_brand = ProductBrand::where('category_id', '=', $value->id)->orderBy('sequence')->where('status', 1)->get();
    //             if (!empty($o_brand)) {
    //                 $brand = [];
    //                 foreach ($o_brand as $kk => $v) {
    //                     $brand[$kk]['id'] = $v->id;
    //                     $brand[$kk]['image'] = $v->image;
    //                     if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                         $brand[$kk]['name'] = $v->name_th;
    //                         $brand[$kk]['desc'] = $v->description_th;
    //                     } else {
    //                         $brand[$kk]['name'] = $v->name_en;
    //                         $brand[$kk]['desc'] = $v->description_en;
    //                     }
    //                     $slug = $o_slug->getSlugUrl('product', 'brand', $value->id);
    //                     if (!empty($slug['url'])) {
    //                         if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                             $brand[$kk]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                         } else {
    //                             $brand[$kk]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                         }
    //                     }
    //                     $data[$k]['brand'] = $brand;

    //                     //product
    //                     $o_product = Products::where('brand_id', '=', $v->id)->where('status', 1)->where('delete_status', 0)->orderBy('sort')->get();
    //                     if (!empty($o_product)) {
    //                         $list = [];
    //                         foreach ($o_product as $j => $val) {
    //                             $list[$j]['id'] = $val->id;
    //                             $images = json_decode($val->images, true);
    //                             $list[$j]['image'] = !empty($images[0]['image']) ? $images[0]['image'] : '';
    //                             if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                                 $list[$j]['name'] = $val->name_th;
    //                                 $list[$j]['desc'] = $val->description_th;
    //                             } else {
    //                                 $list[$j]['name'] = $val->name_en;
    //                                 $list[$j]['desc'] = $val->description_en;
    //                             }
    //                             $slug = $o_slug->getSlugUrl('product', 'productDetail', $val->id);
    //                             if (!empty($slug['url'])) {
    //                                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                                     $list[$j]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                                 } else {
    //                                     $list[$j]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                                 }
    //                             }
    //                             // $data[$k]['brand'][$kk]['product'] = $list;
    //                         }
    //                         $data[$k]['brand'][$kk]['product'] = $list;
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return $data;
    // }

    // public function getCategoryMenuFooter()
    // {
    //     $o_slug = new SlugController;
    //     $category = ProductCategories::where('status', 1)->where('status_footer',1)->orderBy('sequence')->get();
    //     $data = [];
    //     if (!empty($category)) {
    //         foreach ($category as $k => $value) {
    //             $data[$k]['id'] = $value->id;
    //             $data[$k]['image'] = $value->icon;
    //             if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                 $data[$k]['name'] = $value->name_th;
    //             } else {
    //                 $data[$k]['name'] = $value->name_en;
    //             }
    //             $slug = $o_slug->getSlugUrl('product', 'category', $value->id);
    //             if (!empty($slug['url'])) {
    //                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                     $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                 } else {
    //                     $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                 }
    //             }
    //         }
    //     }
    //     return $data;
    // }

    // public function getProductByCategory($category_id, $per_page, $page = 1, $sort = 0)
    // {
    //     $data = [];

    //     $o_product = new Products();
    //     $o_slug = new SlugController;

    //     $o_product = $o_product->where('category_id', $category_id)->where('status', 1)->where('delete_status', 0);
    //     $all_rows = $o_product->count();

    //     $data_offset = ($page - 1) * $per_page;
    //     $pages_total = ceil((int)$all_rows / $per_page);
    //     switch ($sort) {
    //         case 1:
    //             $product = $o_product->orderBy('created_at', 'ASC');
    //             break;
    //         case 2:
    //             $product = $o_product->orderBy('created_at', 'DESC');
    //             break;
    //         default:
    //             $product = $o_product->orderBy('sort');
    //             break;
    //     }

    //     $product = $o_product->limit($per_page)->offset($data_offset)->get();
    //     if (!empty($product)) {
    //         foreach ($product as $k => $val) {
    //             $data[$k]['id'] = $val->id;
    //             $images = json_decode($val->images, true);
    //             $data[$k]['image'] = !empty($images[0]['image']) ? $images[0]['image'] : '';
    //             if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                 $data[$k]['name'] = $val->name_th;
    //                 $data[$k]['desc'] = $val->description_th;
    //             } else {
    //                 $data[$k]['name'] = $val->name_en;
    //                 $data[$k]['desc'] = $val->description_en;
    //             }
    //             $slug = $o_slug->getSlugUrl('product', 'productDetail', $val->id);
    //             if (!empty($slug['url'])) {
    //                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                     $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                 } else {
    //                     $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                 }
    //             }
    //         }
    //     }
    //     $respone = [
    //         'data' => $data,
    //         'item' => count($data),
    //         'all' => $all_rows,
    //         'cur_page' => $page,
    //         'pages_total' => $pages_total,
    //         'pagination' => setPagination($page, $pages_total),
    //     ];
    //     return $respone;
    // }

    // public function getCategoryinfo()
    // {
    //     $o_slug = new SlugController;
    //     $category = ProductCategories::where('status', 1)->orderBy('sequence')->get();
    //     $data = [];
    //     if (!empty($category)) {
    //         foreach ($category as $k => $value) {
    //             $data[$k]['id'] = $value->id;
    //             $data[$k]['image'] = $value->image;
    //             if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                 $data[$k]['name'] = $value->name_th;
    //             } else {
    //                 $data[$k]['name'] = $value->name_en;
    //             }
    //             $slug = $o_slug->getSlugUrl('product', 'category', $value->id);
    //             if (!empty($slug['url'])) {
    //                 if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
    //                     $data[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
    //                 } else {
    //                     $data[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
    //                 }
    //             }
    //         }
    //     }
    //     return $data;
    // }
    public function getProductAll($paginate = 12)
    {
        $data_1 = [];
        $data_2 = [];
        $o_slug = new SlugController;
        $o_product = Product::where([['status', 1], ['delete_status', 0]])->paginate($paginate);
        if (!empty($o_product)) {
            foreach ($o_product as $k => $value) {
                $list[$k]['id'] = $value->id;
                $images = json_decode($value->images, true);
                $list[$k]['image'] = !empty($images[0]['image']) ? $images[0]['image'] : '';
                $list[$k]['image_all'] = $images;
                $list[$k]['link_detail'] = $value->link_detail;
                $list[$k]['link'] = $value->link;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $list[$k]['name'] = $value->name_th;
                    $list[$k]['desc'] = mwz_getTextString($value->description_th);
                } else {
                    $list[$k]['name'] = $value->name_en;
                    $list[$k]['desc'] = mwz_getTextString($value->description_en);
                }
                $slug = $o_slug->getSlugUrl('product', 'productDetail', $value->id);
                if (!empty($slug['url'])) {
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $list[$k]['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                    } else {
                        $list[$k]['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                    }
                }
                    $data_2 = $list;
            }
        }
        return ["res" => $data_2, "page" => $o_product];
    }


    public function getProductinfo()
    {
        $data_1 = [];
        $data_2 = [];
        $o_slug = new SlugController;
        $o_product = Product::where([['index_status', 1], ['status', 1], ['delete_status', 0]])->get();
        if (!empty($o_product)) {
            foreach ($o_product as $k => $value) {
                $list['id'] = $value->id;
                $images = json_decode($value->images, true);
                $list['image'] = !empty($images[0]['image']) ? $images[0]['image'] : '';
                $list['image_all'] = $images;
                $list['link_detail'] = $value->link_detail;
                $list['link'] = $value->link;
                if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                    $list['name'] = $value->name_th;
                    $list['desc'] = mwz_getTextString($value->description_th) ;
                } else {
                    $list['name'] = $value->name_en;
                    $list['desc'] = mwz_getTextString($value->description_en) ;
                }
                $slug = $o_slug->getSlugUrl('product', 'productDetail', $value->id);
                if (!empty($slug['url'])) {
                    if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                        $list['url'] = !empty($slug['url']['th']) && $slug['url']['th'] != '/' ? URL::to($slug['url']['th']) : '';
                    } else {
                        $list['url'] = !empty($slug['url']['en']) && $slug['url']['en'] != '/en/' ? URL::to($slug['url']['en']) : '';
                    }
                }
                    $data_2[] = $list;
            }
        }
        $respone = [
            'list' => $data_2
        ];
        return $respone;
    }
    public function findProduct($id)
    {
        $data = [];
        $o_product = Product::find($id);
        if (!empty($o_product)) {
            $data['id'] = $o_product->id;
            $data['image'] = json_decode($o_product->images, true);
            $data['link'] = $o_product->link;
            if (empty(App::currentLocale()) || App::currentLocale() == 'th') {
                $data['name'] = $o_product->name_th;
                $data['desc'] = $o_product->description_th;
                $data['detail'] = mwz_getTextString($o_product->detail_th);
            } else {
                $data['name'] = $o_product->name_en;
                $data['desc'] = $o_product->description_en;
                $data['detail'] = mwz_getTextString($o_product->detail_en);
            }
        }
        return $data;
    }
}
