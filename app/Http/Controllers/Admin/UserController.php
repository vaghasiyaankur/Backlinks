<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id','name','email','verify_status')->get();
        return view('admin.users.index',compact('users'));
    }

    public function add_user(Request $req)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('admin.user');
    }

    public function verify_status($id)
    {
        $user = User::find($id);
        if ($user->verify_status == 0) {
            $update = ['verify_status' => 1];
            $user->update($update);
        }else{
            dd($user->verify_status);
            $update = ['verify_status' => 0];
            $user->update($update);
        }
        return redirect()->route('admin.user');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('admin.user');
    }

    public function changePassword(Request $req)
    {
        $user = User::find($req->id);
        dd($user);
    }

}
