<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutDetail extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'image','detail_th','detail_en','status', 'created_at', 'updated_at'];
    protected $table = "about_detail";
    protected $primaryKey = "id";
    
    protected static function newFactory()
    {
        return \Modules\About\Database\factories\AboutDetailFactory::new();
    }
}
