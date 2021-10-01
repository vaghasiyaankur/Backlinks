<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Hash;
use Session;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public function login(Request $request)
     {
       $admin = Admin::where('email',$request->email)->count();

       if($admin){
        $admin = Admin::where('email',$request->email)->first();
            if(Hash::check($request->password, $admin->password)) {
                Session::put('adminlogin', 1);
                return Redirect::to('admin/dashboard');
            } else {
                return Redirect::back()->with('msg','credential fail');
            }
       }else{
           return Redirect::back()->with('msg','credential fail');
       }
     }
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
      
    }

    protected function guard()
    {
        return Auth::guard('admin'); 
    }

    public function logout()
    {
        Session::forget('adminlogin');
       Auth::guard('admin')->logout();
       return redirect('/admin/login');
    }
}
