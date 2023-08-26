<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;

class Menus extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['id', 'name_th', 'name_en','slug_th','slug_en','params','sequence', '_lft','_rgt','parent_id','type','link_type','slug_id','url','show_location','status','created_at','updated_at'];
    protected $table = "menu";
    protected $primaryKey = "id";


    public function main()
    {
        return $this->hasOne('\Modules\Menu\Entities\Menus', 'id', 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany('\Modules\Menu\Entities\Menus', 'parent_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Menu\Database\factories\MenusFactory::new();
    }

    public function slug()
    {
        return $this->hasOne('Modules\Mwz\Entities\Slugs', 'id', 'slug_id');
    }

    public static function TestData()
    {
        $data = [
            [
                'name_th' => 'หน้าหลัก',
                'name_en' => 'Home',
                'slug_th'    => 'หน้าหลัก',
                'slug_en'    => 'home',
                'sequence'   => 1,
                'status'   => 1,
                'type'   => 1
            ],
            [
                'name_th' => 'เกี่ยวกับเรา',
                'name_en' => 'About us',
                'slug_th'    => 'เกี่ยวกับเรา',
                'slug_en'    => 'about',
                'sequence'   => 2,
                'status'   => 1,
                'type'   => 1
            ],
            [
                'name_th' => 'บริการ',
                'name_en' => 'Services',
                'slug_th'    => 'บริการ',
                'slug_en'    => 'services',
                'sequence'   => 3,
                'status'   => 1,
                'type'   => 1
            ],
            [
                'name_th' => 'ข่าวอัพเดท',
                'name_en' => 'News Updates',
                'slug_th'    => 'ข่าวอัพเดท',
                'slug_en'    => 'news',
                'sequence'   => 4,
                'status'   => 1,
                'type'   => 1
            ],
            [
                'name_th' => 'ติดต่อเรา',
                'name_en' => 'Contact Us',
                'slug_th'    => 'ติดต่อเรา',
                'slug_en'    => 'contact',
                'sequence'   => 5,
                'status'   => 1,
                'type'   => 1
            ]
        ];
        return $data;
    }
}
