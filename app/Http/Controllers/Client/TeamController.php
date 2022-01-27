<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Validator;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team_data = Team::paginate(12);
        return view('clients.team.index',compact('team_data'));
    }
    public function create(Request $req)
    {
        $rules = [
            'first_name' => 'required|unique:teams',
            'last_name' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }

        if ($req->image) {
            $imageName = rand().'.'.$req->image->extension();
            $req->image->move(public_path('template/images/team'), $imageName);
        }

        $data = new Team;
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->title = $req->title;
        $data->email = $req->first_name.'@impulsion-seo.com';
        $data->image = $imageName;
        $data->save();
        return redirect()->route('client.team');
    }
    public function team_edit($id)
    {
        $edit_team = Team::find($id);
        return view('clients.team.team_add',compact('edit_team'));
    }

    public function update_team(Request $req)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }

        $data = Team::find($req->id);

        if ($req->image) {
            if (file_exists(public_path('template/images/team/'.$data->image))) {
                unlink(public_path('template/images/team/'.$data->image));
            }
            $imageName = rand().'.'.$req->image->extension();
            $req->image->move(public_path('template/images/team'), $imageName);
        }else{
            $imageName = $data->image;
        }
        $update_data = ['first_name' => $req->first_name,'last_name' => $req->last_name,'email' => $req->first_name.'@impulsion-seo.com','image' => $imageName];
        $data->update($update_data);
        return redirect()->route('client.team');
    }
    public function team_delete($id)
    {
        $data = Team::find($id);
        if (isset($data)) {
            if (file_exists(public_path('template/images/team/'.$data->image))) {
                unlink(public_path('template/images/team/'.$data->image));
            }
        }
        $data->delete();
        return redirect()->route('client.team');
    }
}
