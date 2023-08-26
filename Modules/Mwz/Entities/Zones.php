<?php

namespace Modules\Mwz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zones extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th', 'name_en', 'geo_id'];

    protected $table = "mwz_geo";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Mwz\Database\factories\ZonesFactory::new();
    }
    public function province()
    {
        return $this->hasMany('Modules\Mwz\Entities\Provinces', 'geo_id', 'id');
    }
}
