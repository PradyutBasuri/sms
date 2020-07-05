<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table="permissions";
    protected $fillable=['id','name','method_name','path_url'];
}
