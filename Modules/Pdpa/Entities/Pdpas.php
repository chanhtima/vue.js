<?php

namespace Modules\Pdpa\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pdpas extends Model
{
    use HasFactory;

    protected $fillable = ['id','pdpa_title_th','pdpa_title_en','pdpa_detail_th','pdpa_detail_en','pdpa_detail_long_th','pdpa_detail_long_en','status'
    ,'created_by','created_at','updated_by','updated_at'];
    protected $table = "pdpa";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Pdpa\Database\factories\PdpasFactory::new();
    }

    public static function TestData(){
        $data = [
            'pdpa_title_th'=>'ชื่อหัวข้อ ภาษาไทย',
            'pdpa_title_en'=>'ชื่อหัวข้อ ภาษาอังกฤษ',
            'pdpa_detail_th'=>'รายละเอียด 1 ภาษาไทย',
            'pdpa_detail_en'=>'รายละเอียด 1 ภาษาอังกฤษ',
            'pdpa_detail_long_th'=>'รายละเอียด 2 ภาษาไทย',
            'pdpa_detail_long_en'=>'รายละเอียด 2 ภาษาอังกฤษ',
            'status'=>1
        ];
        return $data ;
    }
}
