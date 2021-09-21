<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect; 
use Mail; 
use File;
use Carbon\Carbon;
use ZipArchive;

class ProjectController extends Controller
{
    public function list(Request $request)
    {
        $ProjectList = Project::all();
        return view('admin.project.project_list', compact('ProjectList'));
    }

    public function add(Request $request)
    {
        $ProjectType = ProjectType::all();
        return view('admin.project.project_add', compact('ProjectType'));
    }

    public function store(Request $request)
    {
     
        $project = new Project();
        $project->name = $request->name;
        $project->website = $request->website ;
        $project->email = $request->email ;
        $project->month = $request->month ;
        $project->price = $request->price ;
        $project->project_type_id = $request->projectType;
        $project->save();
        

        $public_dir=public_path();
        $zipFileName = Carbon::now().'.zip';
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {    
            $zip->addFile('file_path','file_name');        
             $zip->close();
        }
         $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
        $filetopath=$public_dir.'/'.$zipFileName;
        dd($filetopath);
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
        return ['status'=>'file does not exist'];







        $path = public_path().'/'.$project->name;

        
        if(!is_dir($path)){
            File::makeDirectory($path);
            $randomNumber = random_int(100000, 999999);
            $subpath = $path .'/'.$randomNumber;
            if(!is_dir($subpath)){
                File::makeDirectory($subpath);
            }
        }else{
            $randomNumber = random_int(100000, 999999);
            $subpath = $path .'/'.$randomNumber;
            if(!is_dir($subpath)){
                File::makeDirectory($subpath);
            }
        }

        // $file = public_path($project->name);


        // Mail::send('admin.project.mail', ['project' => $project], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Crate A Project');
        // });


        return Redirect::to('/admin/project');
    }

    public function edit(Request $request)
    {
        return view('admin.project.project_edit');
    }

    public function delete(Request $request)
    {
        return view('admin.project.project_list');
    }
}
