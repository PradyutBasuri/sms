<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $guard = 'admin';
    protected $table="admins";
    protected $fillable=['id','email','password','name','prf_image','remember_token','created_at','updated_at'];
   

    use Notifiable;

    protected $hidden = [
        'password',
    ];
}
