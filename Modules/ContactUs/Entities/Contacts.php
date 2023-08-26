<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'email', 'subject', 'phone', 'message', 'reply', 'status', 'modify_date', 'created_at', 'updated_at'];
    protected $table = "contact";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\ContactUs\Database\factories\ContactsFactory::new();
    }
}
