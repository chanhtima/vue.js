<?php

namespace Modules\Pdpa\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PdpaDetails extends Model
{
    use HasFactory;

    protected $fillable = ['id','member_id','pdpa_ip','pdpa_user_agent','pdpa_user_status','created_at','updated_at'];
    protected $table = "pdpa_detail";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Pdpa\Database\factories\PdpaDetailsFactory::new();
    }
    
    public static function TestData(){
        $data = [
            'member_id'=>'2',
            'pdpa_ip'=>'127.0.0.1',
            'pdpa_user_agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36 Edg/94.0.992.50',
            'pdpa_user_status'=>1
        ];
        return $data ;
    }
}
