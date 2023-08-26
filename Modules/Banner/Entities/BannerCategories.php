<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;

class BannerCategories extends Model
{
    use HasFactory;
    use NodeTrait;
    protected $fillable = ['id', 'name_th', 'name_en', 'status', 'sequence', '_lft', '_rgt', 'parent_id', 'created_at', 'updated_at'];
    protected $table = "banner_categories";
    protected $primaryKey = "id";
    
    protected static function newFactory()
    {
        return \Modules\Banner\Database\factories\BannerCategoriesFactory::new();
    }

    public function Banners()
    {
        return $this->hasMany('Modules\Banner\Entities\Banners', 'category_id', 'id')->with(['items', 'brand', 'model']);
    }
}
