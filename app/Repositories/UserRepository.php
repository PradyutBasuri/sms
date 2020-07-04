<?php
namespace App\Repositories;
use App\User;
class UserRepository{
public function index($request){

    $getData=User::all();
    return $getData;
}

}


?>