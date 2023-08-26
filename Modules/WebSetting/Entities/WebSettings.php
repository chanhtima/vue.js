<?php

namespace Modules\WebSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'link_login','logo_favicon','logo_header', 'logo_footer', 'meta_title_th', 'meta_keywords_th', 'meta_description_th', 'meta_title_en', 'meta_keywords_en', 'meta_description_en', 'seo_image', 'created_at', 'updated_at'
    ];
    protected $table = "websetting";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\WebSetting\Database\factories\WebSettingsFactory::new();
    }
}
