<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banners extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category_id','type','name_th', 'name_en', 'image', 'url_video', 'bg', 'link', 'link_target', 'location', 'sequence','status','created_at','updated_at'];
    protected $table = "banners";
    protected $primaryKey = "id";
    
    protected static function newFactory()
    {
        return \Modules\Banner\Database\factories\BannersFactory::new();
    }

    public function category()
    {
        return $this->hasOne('Modules\Banner\Entities\BannerCategories', 'id', 'category_id');
    }
    public static function TestData(){
        $data = [
            'category_id'=>1,
            'name_th'=>'ชื่อ ภาษาไทย', 
            'name_en'=>'ชื่อ ภาษาอังกฤษ', 
            'text_1_th'=>'ชื่อ ภาษาไทย', 
            'text_1_en'=>'ชื่อ ภาษาอังกฤษ', 
            'text_2_th'=>'ชื่อ ภาษาไทย', 
            'text_2_en'=>'ชื่อ ภาษาอังกฤษ', 
            'desc_1_th'=>'รายละเอียด ภาษาไทย', 
            'desc_1_en'=>'รายละเอียด ภาษาอังกฤษ', 
            'desc_2_th'=>'รายละเอียด ภาษาไทย', 
            'desc_2_en'=>'รายละเอียด ภาษาอังกฤษ', 
            'image_1'=>'/storage/test.png', 
            'image_2'=>'/storage/test.png', 
            'bg'=>'/storage/test.png', 
            'link'=>"#",
            'link_target'=>'_blank',
            'location'=>1,
            'sequence'=>1, 
            'status'=>1
        ];
        return $data ;
    }
}
