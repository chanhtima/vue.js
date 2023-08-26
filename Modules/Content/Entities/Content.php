<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'type','name_th', 'name_en', 'desc_th', 'desc_en', 'detail_th', 'detail_en', 'image', 'params', 'status','status_index','sequence','start_at', 'end_at', 'created_by', 'updated_by', 'created_at', 'updated_at'];
    protected $table = "content";
    protected $primaryKey = "id";

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        'start_at' => 'datetime:Y-m-d h:i:s',
        'end_at' => 'datetime:Y-m-d h:i:s'
    ];
    
    
    protected static function newFactory()
    {
        return \Modules\Content\Database\factories\ContentFactory::new();
    }

    public static function TestData(){
        $data = [
            'type'=>0,
            'category_id'=>0,
            'name_th'=>'รายละเอียด ภาษาไทย',
            'name_en'=>'name_en',
            'desc_th'=>'desc_th',
            'desc_en'=>'รายละเอียด ภาษาอังกฤษ',
            'detail_th'=>'รายละเอียด ภาษาไทย',
            'detail_en'=>'detail_en',
            'image'=>'/storage/test.png', 
            'clip'=>'http://youtube.com',
            'file'=>'/storage/test.pdf',
            'params'=>'test',
            'status'=>1,
            'sequence'=>1,
            'hash_tag'=>'tag',
            'start_at'=>date('Y-m-d'),
            'end_at'=>date('Y-m-d'),
            'created_by'=>1,
            'updated_by'=>1,
            'created_at'=>1,
            'updated_at'=>1
        ];
        return $data ;
    }
}
