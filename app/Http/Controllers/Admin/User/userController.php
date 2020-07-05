<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAddRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Storage;

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

    public function index(Request $request)
    {
        $title = "User List";
        $user_class = "active";
        $user_list = $this->userRepo->index($request);
        $data = array('title' => $title, 'user_list' => $user_list, 'user_class' => $user_class);
        return view('admin.user.user_list')->with($data);
    }

    public function add(Request $request)
    {
        $title = "User Add";
        $user_class = "active";

        $data = array('title' => $title,  'user_class' => $user_class);
        return view('admin.user.create_user')->with($data);
    }
    public function save(UserAddRequest $request)
    {
        $title = "User Add";
        $user_class = "active";
        $user_save = $this->userRepo->save($request);
        $data = array('title' => $title,  'user_class' => $user_class);
        Session::flash('success_message', 'User Created Successfully');
        Session::flash('alert-class', 'alert alert-success');
        return redirect(route('getUserList'));
    }
    public function edit($id)
    {
        $decodeId = base64_decode($id);

        $title = "User Edit";
        $user_class = "active";
        $data = User::find($decodeId);
        return view('admin.user.user_edit', compact('data', 'title', 'user_class'));
    }
    public function update(UserUpdateRequest $request)
    {

        $user_update = $this->userRepo->update($request);
        Session::flash('success_message', 'User Updated Successfully');
        Session::flash('alert-class', 'alert alert-success');
        return redirect(route('getUserList'));
    }
    public function destroy($id)
    {
        $decodeId = base64_decode($id);
        $get_user = User::find($decodeId);
        $user = User::where('id', $decodeId)->delete();
        Storage::delete('public/user_image/' . $get_user->prf_image);
        Session::flash('success_message', 'User Deleted Successfully');
        Session::flash('alert-class', 'alert alert-success');
        return redirect(route('getUserList'));
    }
}
