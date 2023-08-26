<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Modules\User\Notifications\NotiUserResetPassword ;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Laravel\Passport\HasApiTokens;
use Modules\User\Emails\UserEmail;

// class Users extends Authenticatable
class Users extends Authenticatable
{
    // LogsActivity 
    use SoftDeletes, HasFactory, HasApiTokens ;
    use \Illuminate\Notifications\Notifiable;

    protected $fillable = ['id','role_id','group_id','name','username','email','password','avatar','locale','status','api'];
    protected $table = "users";
    protected $primaryKey = "id";
   

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // ----------------- log -------------------//
    // protected static $logAttributes = ['id','role_id','group_id','name','username','email','password','avatar','locale','status','api'] ;
    // protected static $recordEvents = ['created', 'updated', 'deleted'];
    // protected static $logName='users'; // default

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->useLogName('user');
    }
    // ----------------- log -------------------//

     protected static function newFactory()
    {
        return \Modules\User\Database\factories\UsersFactory::new();
    }

    public function group()
    {
        return $this->hasOne('Modules\User\Entities\Groups','id','group_id');
    }

    public function role()
    {
        return $this->hasOne('Modules\User\Entities\Roles','id','role_id');
    }

    public function sendPasswordResetNotification($token) { 
        // echo $token ;
        $noti = $this->notify(new NotiUserResetPassword($token));
    }

    public static function TestData(){
        $data = [
            'group_id'=>'2',
            'name'=>'user_admin',
            'username'=>'user_admin',
            'email'=>'user_admin@gmail.com',
            'password'=>Hash::make('123456'),
            'avatar'=>'/storage/test.png',
            'locale'=>'th'

        ];
        return $data ;
    }

}
