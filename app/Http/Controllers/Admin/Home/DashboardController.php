<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = "Admin-Home";
        return view('admin.dashboard',compact('title'));
    }
    

}
