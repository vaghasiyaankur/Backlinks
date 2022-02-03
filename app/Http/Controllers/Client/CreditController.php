<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CreditController extends Controller
{
    public function index()
    {
        $project = Project::where('email',Auth::user()->email)->first();
        return view('clients.credits.index',compact('project'));
    }

    public function add_credit()
    {
        $project = Project::where('email',Auth::user()->email)->first();
        $credit = Credit::where('user_id',Auth::id())->first();
        return view('clients.credits.add_credit',compact('project','credit'));
    }

    public function credit_add(Request $req)
    {
        $credit = new Credit;
        $credit->user_id = Auth::id();
        $credit->domain_name = $req->demain_name;
        $credit->save();
        return Redirect::back();
    }

    public function parchese_credit()
    {
        Credit::where('user_id',Auth::id())->update(['credit_status'=>1]);
        return Redirect::back();
    }
}
