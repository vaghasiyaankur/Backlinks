<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->project = Project::where('email',Auth::user()->email)->first();
            return $next($request);
        });
    }
    public function index()
    {
        $project = $this->project;
        return view('clients.welcome',compact('project'));
    }
}
