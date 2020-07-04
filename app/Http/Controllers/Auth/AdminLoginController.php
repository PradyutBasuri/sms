<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Mail\AdminForgotPasswordMail;
use App\Model\Validation;

use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = '/admin/home'; //Redirect after authenticate

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //Notice this middleware

    }

    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('auth.admin-login');
    }

    public function login(Request $request) //Go web.php then you will find this route
    {
        // print_r($request->all());die;
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }

    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('admin');
    }

    public function getAdminForgotPassword()
    {

        $title = "Admin-Forgot-Password";
        return view('auth.passwords.reset', compact('title', $title));
    }
    public function postAdminForgotPassword(Request $request)
    {
        $this->validate($request, [
            'forgot_email' => 'required|email',
        ], [
            'forgot_email.required' => 'Email is required',
            'forgot_email.email' => 'Email format is invalid'

        ]);
        $email = $request->forgot_email;
        $userData = Admin::where('email', $email)->first();
        if (!empty($userData)) {
            $token = sha1(time());
            $url = URL::to('/');
            $link = $url . '/admin/recover-password/verify/' . $token;
            $user_id = $userData->id;
            $admin_email = $userData->email;
            $name = $userData->first_name . " " . $userData->last_name;
            $data = ([
                'uid' => $user_id, 'role' => 'admin', 'validation_hash' => $token,
                'validation_type' => 'admin_forgot_password', 'createdAt' => date('Y-m-d H:i:s'),
                'updatedAt' => date('Y-m-d H:i:s')
            ]);
            $users = Validation::insert($data);
            $admin_email = Admin::value('email');
            $sent = Mail::to($admin_email)->send(new AdminForgotPasswordMail($name, $token, $link));
            Session::flash('success_message', 'Please check your email to reset your password.');
            Session::flash('alert-class', 'alert alert-success');
            return redirect()->route('admin.login');
        } else {
            Session::flash('failure_message', 'Invalid email id!');
            Session::flash('alert-class', 'alert alert-danger');
            return redirect('admin/admin-forgot-password');
        }
    }

    public function adminRecoverPassword($token)
    {
        $title = "Admin-Reset-Password";
        $user_count = Validation::where('validation_hash', $token)->where('is_expired', '0')
            ->where('is_verified', '0')->count();

        if ($user_count == 0) {
            Session::flash('failure_message', 'Link is expired');
            Session::flash('alert-class', 'alert alert-danger');
            return redirect('admin/login');
        } else {
            return view('auth.passwords.confirm')->with('title', $title)->with('token', $token);
        }
    }

    public function adminUpdatePassword(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@_$!%*?&])[A-Za-z\d$@_$!%*?&]{8,}/',
            'confirm_password' => "required|same:password",
            'token_id' => "required",
        ], [
            'password.required' => 'Please Enter Password.',
            'password.regex' => 'Password Atleast Contain one uppercase letter, one lowercase letter, one number and one special character.',
            'password.min' => 'Password length at least contain 8 characters.',
            'confirm_password.required' => 'Please Enter Confirm Password.',
            'confirm_password.same' => 'Password and confirm password are not same.',
            'token_id.required' => 'Token is required'

        ]);

        $confirm_password = Hash::make($request->confirm_password);

        $token_id = $request->token_id;
        $users = Validation::where('validation_hash', $token_id)->where('is_expired', '0')->where('is_verified', '0')->first();
        if (!empty($users)) {
            $updateUser = Admin::where('id', $users->uid)->update(['password' => $confirm_password]);
            $updateValidation = Validation::where('validation_hash', $token_id)->update(['is_verified' => '1', 'is_expired' => '1']);
            $getuserData = Admin::where('id', $users->uid)->first();

            $user = Admin::find($getuserData->id);
            Auth::guard('admin')->login($user);
            return redirect(route('admin.home'));
        } else {

            Session::flash('failure_message', 'Invalid url');
            Session::flash('alert-class', 'alert alert-danger');
            return redirect()->route('admin.login');
        }
    }

    public function getChangePassword()
    {
        $title = "Admin-Change-Password";
        return view('admin.home.change_password')->with('title', $title);
    }

    public function postChangePassword(Request $request)
    {
        
        $this->validate($request, [
            'current_pass' => 'required',
            'new_pass' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@_$!%*?&])[A-Za-z\d$@_$!%*?&]{8,}/',
            'confirm_pass' => "required|same:new_pass",

        ], [
            'current_pass.required' => 'Please Enter Current Password.',
            'new_pass.required' => 'Please Enter New Password.',
            'new_pass.min' => 'New Password length at least contain 8 characters.',
            'new_pass.regex' => 'New Password Atleast Contain one uppercase letter, one lowercase letter, one number and one special character.',
            'confirm_pass.required' => 'Please Enter Confirm Password.',
            'confirm_pass.same' => 'Password and confirm password are not same.',
            

        ]);

        $getPreviousData = Auth::guard('admin')->user();
        // echo"<pre>"; print_r($getPreviousData);die;
        $DatabasePassword = $getPreviousData['password'];

        $current_pass = $request->current_pass;
        $checkHashed = Hash::check($current_pass,  $DatabasePassword);
        if ($checkHashed == 1) {
            $confirm_pass = Hash::make($request->confirm_pass);
            $userId = Auth::guard('admin')->user()->id;
            $updatePassword = Admin::where('id', $userId)->update(['password'=>$confirm_pass]);
            Session::flash('success_message', 'Password changed successfully.');
            Session::flash('alert-class', 'alert alert-success');
            return redirect()->route('admin.home');
        } else {
            Session::flash('failure_message', 'Please correct your current password');
            Session::flash('alert-class', 'alert alert-danger');
            return redirect()->back();
        }
    }
}
