<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactBranch extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_th', 'name_en', 'office_th', 'office_en', 'email', 'phone', 'fax', 'facebook', 'messenger', 'line', 'youtube', 'instagram', 'tiktok', 'google_map', 'sequence', 'status', 'created_at', 'updated_at'];
    protected $table = "contact_branch";
    protected $primaryKey = "id";


    protected static function newFactory()
    {
        return \Modules\ContactUs\Database\factories\ContactBranchFactory::new();
    }
}
