<?php

namespace App\Http\Controllers\Sales\Auth;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register_sales(Request $req)
    {
        $this->validate($req, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $sales = Sale::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        session()->put('saleslogin',1);
        return redirect()->route('sales.dashboard');
    }

    public function login_sales(Request $req)
    {
        $sales = Sale::where('email',$req->email)->count();

        if($sales){
            $sales = Sale::where('email',$req->email)->first();
            if(Hash::check($req->password, $sales->password)) {
                session()->put('saleslogin', 1);
                return redirect()->route('sales.dashboard');
            } else {
                return redirect()->back()->with('msg','credential fail');
            }
        }else{
            return redirect()->back()->with('msg','credential fail');
        }
    }

    public function forget_pass(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:sales',
        ]);
        $data = [
            'email' => $req->email
        ];

        Mail::send('sales.auth.email.forgetPassword', $data,function($message) use($req){
            $message->to($req->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function reset_pass(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:sales',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        Sale::where('email', $req->email)->update(['password' => Hash::make($req->password)]);

        return redirect()->route('sales.login.show')->with('msg', 'Your password has been changed!');
    }

    public function logout()
    {
        if (session()->has('saleslogin')) {
            session()->forget('saleslogin');
            return redirect()->back();
        }
    }

}
