<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Project;
use App\Models\Sale;

class UserController extends Controller
{
    public function index()
    {
        $users['user'] = User::select('id','name','email')->get()->toarray();
        $project['project'] = Project::select('id','name','email')->get()->toarray();
        $admin['admin'] = Admin::select('id','name','email')->get()->toarray();
        $sales['sales'] = Sale::select('id','name','email')->get()->toarray();
        $users = array_merge($users,$project,$admin,$sales);
        return view('admin.users.index',compact('users'));
    }

    public function add_user(Request $req)
    {
        if ($req->user_type == 'administrator') {
            $unique = 'unique:admins';
        }elseif($req->user_type == 'user'){
            $unique = 'unique:users';
        }else{
            $unique = 'unique:sales';
        }
        $rules = [
            'name' => 'required',
            'email' => 'required|'.$unique.'',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }
        if ($req->user_type == 'administrator') {
            $user = new Admin;
        }elseif($req->user_type == 'user'){
            $user = new User;
        }else{
            $user = new Sale;
        }
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('admin.user');
    }

    public function changePassword(Request $req)
    {
        if ($req->user == 'administrator') {
            $user = Admin::find($req->id);
        }elseif($req->user == 'user'){
            $user = User::find($req->id);
        }else{
            $user = Sale::find($req->id);
        }
        $password = ['password' => Hash::make($req->password)];
        $user->update($password);

        $data = array('name'=>$user->name, "body" => $req->password);
        $to_name = "Sky desk";
        $to_email =  $user->email;
        Mail::send('admin.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Change Password');
        });

        return redirect()->route('admin.user');
    }

    public function edit_user($id,$user)
    {
        if ($user == 'user') {
            $user_data = User::find($id);
        }elseif ($user == 'project') {
            $user_data = Project::find($id);
        }elseif($user == 'admin'){
            $user_data = Admin::find($id);
        }else{
            $user_data = Sale::find($id);
        }
        return view('admin.users.add_user',compact('user','user_data'));
    }

    public function update_user(Request $req)
    {
        if ($req->user == 'project') {
            if ($req->user_type == 'administrator') {
                $unique = 'unique:admins';
            }elseif($req->user_type == 'user'){
                $unique = 'unique:users';
            }else{
                $unique = 'unique:sales';
            }
            $rules = [
                'name' => 'required',
                'email' => 'required|'.$unique.'',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ];
            $validator = Validator::make($req->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect()->back()->withErrors($validator);
            }
            if ($req->administrator) {
                $user = new Admin;
            }else{
                $user = new User;
            }
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->route('admin.user');
        }else{
            if ($req->user_type == 'administrator') {
                $unique = 'unique:admins,email,'.$req->id.',id';
            }elseif($req->user_type == 'user'){
                $unique = 'unique:users,email,'.$req->id.',id';
            }else{
                $unique = 'unique:sales,email,'.$req->id.',id';
            }
            $rules = [
                'name' => 'required',
                'email' => 'required|'.$unique.'',
            ];
            $validator = Validator::make($req->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect()->back()->withErrors($validator);
            }
            $update_data = ['name'=>$req->name,'email'=>$req->email];
            if ($req->administrator) {
                $user = Admin::find($req->id)->update($update_data);
            }else{
                $user = User::find($req->id)->update($update_data);
            }
        }
        return redirect()->route('admin.user');
    }

}
