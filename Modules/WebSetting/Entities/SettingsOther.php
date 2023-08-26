<?php

namespace Modules\WebSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingsOther extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'websetting_id', 'text_predict_th_1', 'text_predict_en_1','created_at', 'updated_at'];
    protected $table = "setting_other";
    protected $primaryKey = "id";
    
    protected static function newFactory()
    {
        return \Modules\WebSetting\Database\factories\SettingsOtherFactory::new();
    }
}
