<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th', 'name_en', 'description_th', 'description_en', 'image', 'link', 'sequence', 'status', 'created_at', 'updated_at'];
    protected $table = "banner";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Banner\Database\factories\BannersFactory::new();
    }

    public function category()
    {
        return $this->hasOne('Modules\Banner\Entities\BannerCategories', 'id', 'category_id');
    }

}
