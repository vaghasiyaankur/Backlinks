<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        
        $ProjectList = Project::all();
        return view('admin.chart.index', compact('ProjectList'));
    }
}
