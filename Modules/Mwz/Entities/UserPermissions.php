<?php

namespace Modules\Mwz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPermissions extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'group', 'module', 'page', 'action', 'route_name'];
    protected $table = "user_permissions";
    protected $primaryKey = "id";

    protected static function newFactory()
    {
        return \Modules\Mwz\Database\factories\UserPermissionsFactory::new();
    }
}
