<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','code', 'name_th', 'description_th', 'detail_th', 'name_en', 'description_en', 'detail_en', 'images', 'gallery', 'link','link_detail','related_product', 'param', 'sort', 'index_status','status_footer', 'status','delete_status', 'created_at', 'updated_at'];
    protected $table = "products";
    protected $primaryKey = "id";
    
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
    ];

    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductFactory::new();
    }
}
