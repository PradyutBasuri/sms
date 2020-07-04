<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('getAdminLogout');
    }
    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('auth.login');
    }
    
   public function postAdminLogin(Request $request)
    {
       // print_r($request->all());die;
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        $this->validateLogin($request);
      //  echo $request->password;die;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            
            return redirect()->intended('/admin/home');
        }
        return $this->sendFailedLoginResponse($request);
       // return back()->withInput($request->only('email', 'remember'));
    }
    public function getAdminLogout(Request $request)
    {
      
        $this->guard('admin')->logout();
       
        $request->session()->invalidate();
       
        return redirect()->route('getAdminLogin');
    }
    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('admin');
    }
}
