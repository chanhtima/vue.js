<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPages extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th', 'name_en', 'office_th', 'office_en', 'phone', 'email','facebook','youtube','line','tiktok','ig','gmaps','created_at', 'updated_at'];
    protected $table = "contact_page";
    protected $primaryKey = "id";


    protected static function newFactory()
    {
        return \Modules\ContactUs\Database\factories\ContactPagesFactory::new();
    }
}
