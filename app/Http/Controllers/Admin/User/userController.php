<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class userController extends Controller
{
    protected $userRepo;
    /**
     * Create a BannerController instance.
     *
     * @param  UserRepository  $userRepo
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(Request $request){
        $title = "User List";
        $user_class = "active";
        $user_list = $this->userRepo->index($request);
        $data = array('title' => $title, 'user_list' => $user_list, 'user_class' => $user_class);
        return view('admin.user.user_list')->with($data);
    }
}
