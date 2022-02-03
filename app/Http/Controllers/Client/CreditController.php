<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function index()
    {
        $project = Project::where('email',Auth::user()->email)->first();
        return view('clients.credits.index',compact('project'));
    }
}
