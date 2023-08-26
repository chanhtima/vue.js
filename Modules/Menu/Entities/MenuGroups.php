<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuGroups extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th','name_en','description_th','description_en' ,'status'];
    protected $table = "menu_groups";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Menu\Database\factories\MenuGroupsFactory::new();
    }

    public static function TestData(){
        $data = [
            [
                'name_th'=>'ชื่อหมวด 1 ภาษาไทย',
                'name_en'=>'ชื่อหมวด 1 ภาษาอังกฤษ',
                'description_th'=>'รายละเอียด ภาษาไทย',
                'description_en'=>'รายละเอียด ภาษาอังกฤษ',
                'status'=>1
            ],
            [
                'name_th'=>'ชื่อหมวด 2 ภาษาไทย',
                'name_en'=>'ชื่อหมวด 2 ภาษาอังกฤษ',
                'description_th'=>'รายละเอียด ภาษาไทย',
                'description_en'=>'รายละเอียด ภาษาอังกฤษ',
                'status'=>1
            ]
        ];
        return $data ;
    }
}
