<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect; 
use Mail; 
use Carbon\Carbon;
use File;
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
        


        // $html = view('users.edit', compact('user'))->render();

        
        // $data = json_encode(['Element 1','Element 2','Element 3','Element 4','Element 5']);
        // $file = time() .rand(). '_file.json';
        // $destinationPath=public_path()."/upload/";
        // if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        // File::put($destinationPath.$file,$data);
        // return response()->download($destinationPath.$file);





        
        // $zip = new ZipArchive;
   
        // $fileName = 'myNewFile.zip';
   
        // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        // {   
        //     $files = File::files(public_path('myFiles'));
   
        //     foreach ($files as $key => $value) {
        //         $relativeNameInZipFile = basename($value);
        //         $zip->addFile($value, $relativeNameInZipFile);
        //     }
             
        //     $zip->close();
        // }
        // return response()->download(public_path($fileName));








        $path = public_path().'/'.$project->name;

        
        if(!is_dir($path)){
            File::makeDirectory($path);
        }   
        $randomNumber = random_int(100000, 999999).'.csv';

        $subpath = $path .'/'.$randomNumber;

        if(!is_dir($subpath)){
            File::makeDirectory($subpath);  
        }

        $fileName = 'tasks.csv';
     
             $headers = array(
                 "Content-type"        => "text/csv",
                 "Content-Disposition" => "attachment; filename=$fileName",
                 "Pragma"              => "no-cache",
                 "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                 "Expires"             => "0"
             );
     
             $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');
     
             $callback = function() use($columns) {
                 $file = fopen('php://output', 'w');
                 fputcsv($file, $columns);
     
                     $row['Title']  = '$task->title';
                     $row['Assign']    = '$task->assign->name';
                     $row['Description']    = '$task->description';
                     $row['Start Date']  = '$task->start_at';
                     $row['Due Date']  = '$task->end_at';
     
                     fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
                 
     
                 fclose($file);
                 
             }; 

            //  return response()->stream($callback, 200, $headers);

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
