<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Request $request)
    {
        
        return view('clients.project.project_show');
    }
}
