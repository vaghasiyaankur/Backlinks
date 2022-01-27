<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Team;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->project = Project::where('email',Auth::user()->email)->first();
            return $next($request);
        });
    }
    public function add_team()
    {
        $project = $this->project;
        return view('clients.team.team_add',compact('project'));

    }
    public function index()
    {
        $project = $this->project;
        $team_data = Team::paginate(10);
        return view('clients.team.index',compact('team_data','project'));
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
            $req->image->move('template/images/team', $imageName);
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
}
