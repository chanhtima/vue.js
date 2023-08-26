<?php

namespace Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerAds extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'category_id','name_th', 'name_en', 'description_th', 'description_en', 'image', 'link', 'type', 'sequence','status','created_at','updated_at'];
    protected $table = "banner_ads";
    protected $primaryKey = "id";
    
    protected static function newFactory()
    {
        return \Modules\Banner\Database\factories\BannerAdsFactory::new();
    }

    public function category()
    {
        return $this->hasOne('Modules\Banner\Entities\BannerCategories', 'id', 'category_id');
    }}
