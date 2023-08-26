<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abouts extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th', 'name_en','detail_th','detail_en','description_th','description_en','status', 'created_at', 'updated_at'];
    protected $table = "abouts";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\About\Database\factories\AboutsFactory::new();
    }
}
