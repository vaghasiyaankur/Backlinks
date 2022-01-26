<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OldClientController extends Controller
{
    public function index()
    {
        $project = Project::where('status',1)->get();
        return view('admin.old_client.index',compact('project'));
    }
}
