<?php

namespace Modules\WebSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagAnalytic extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'type', 'head', 'body','footer', 'status', 'created_at', 'updated_at'];
    protected $table = "tag_analytic";
    protected $primaryKey = "id";
    protected static function newFactory()
    {
        return \Modules\WebSetting\Database\factories\TagAnalyticFactory::new();
    }
}
