<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;
use App\Models\ProjectData;
use App\Models\ProjectMonth;
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
        
        $count = Project::where('name',$request->name)->count();
        if($count){
            return Redirect::back()->withErrors(['msg' => 'This Project Name Already Exits']);
        }
        $project = new Project();
        $project->name = $request->name;
        $project->website = $request->website ;
        $project->email = $request->email ;
        $project->month = $request->month ;
        $project->price = $request->price ;
        $project->project_type_id = $request->projectType;
        $project->save();

        $projectdata = new ProjectMonth();
        $projectdata->months = $request->month;
        $projectdata->project_id = $project->id;
        $projectdata->save();
        

        // $path = public_path().'/'.$project->name;
        $path = storage_path('app/public/'.$request->name);

        
        if(!is_dir($path)){
            File::makeDirectory($path);
        }   

        $subpath = $path .'/Communication';

        if(!is_dir($subpath)){
            File::makeDirectory($subpath);  
        }

        // $user = Auth::user();

        // $path = storage_path('app/public/docs/user_docs/'.$user->id);
        $csvfiles = [];
        for($i = 1;$i<=$request->month;$i++)
        {
            $fileName = $i.'.csv';
    
            $file = fopen($subpath.'/'.$fileName, 'w');
        
            $columns = array('No','URL', 'Ancre', 'Spot Url', 'Num of Month', 'Prestataire','price');
        
            fputcsv($file, $columns);
        
                $data = [
                    'No' => '',  
                    'URL' => '',  
                    'Ancre' => '',  
                    'Spot Url' => '',  
                    'Num of Month' => '',    
                    'Prestataire' => '',    
                    'price' => '',    
                ];
        
        
            fputcsv($file, $data);
        
            fclose($file);

            array_push($csvfiles, $subpath.'/'.$fileName);
        }
    
        // $symlink = $subpath.'/';
    
        // $fileModel = new UserDocument;
        // $fileModel->name = 'csv';
        // $fileModel->file_path = $symlink.$fileName;
        // $fileModel->save();


        // $html = view('users.edit', compact('user'))->render();

        
        // $data = json_encode(['Element 1','Element 2','Element 3','Element 4','Element 5']);
        // $file = time() .rand(). '_file.json';
        // $destinationPath=public_path()."/upload/";
        // if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        // File::put($destinationPath.$file,$data);
        // return response()->download($destinationPath.$file);





        
        // $zip = new ZipArchive;
   
        // $fileName = 'myNewFile.zip';
   
        // if ($zip->open(public_path($ ), ZipArchive::CREATE) === TRUE)
        // {   
        //     $files = File::files(public_path('myFiles'));
   
        //     foreach ($files as $key => $value) {
        //         $relativeNameInZipFile = basename($value);
        //         $zip->addFile($value, $relativeNameInZipFile);
        //     }adminadmin
             
        //     $zip->close();
        // }
        // return response()->download(public_path($fileName));








        // $path = public_path().'/'.$project->name;

        
        // if(!is_dir($path)){
        //     File::makeDirectory($path);
        // }   
        // $randomNumber = random_int(100000, 999999).'.csv';

        // $subpath = $path .'/'.$randomNumber;

        // if(!is_dir($subpath)){
        //     File::makeDirectory($subpath);  
        // }

        // $fileName = 'tasks.csv';
     
        //      $headers = array(
        //          "Content-type"        => "text/csv",
        //          "Content-Disposition" => "attachment; filename=$fileName",
        //          "Pragma"              => "no-cache",
        //          "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        //          "Expires"             => "0"
        //      );
     
        //      $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');
     
        //      $callback = function() use($columns) {
        //          $file = fopen('php://output', 'w');
        //          fputcsv($file, $columns);
     
        //              $row['Title']  = '$task->title';
        //              $row['Assign']    = '$task->assign->name';
        //              $row['Description']    = '$task->description';
        //              $row['Start Date']  = '$task->start_at';
        //              $row['Due Date']  = '$task->end_at';
     
        //              fputcsv($file, array($row['Title'], $row['Assign'], $row['Description'], $row['Start Date'], $row['Due Date']));
                 
     
        //          fclose($file);
                 
        //      }; 

            //  return response()->stream($callback, 200, $headers);

        // $file = public_path($project->name);
        
        // for($i = 1;$i<=$request->month;$i++)

        Mail::send('admin.project.mail', ['project' => $project], function($message) use($request,$csvfiles){
            $message->to($request->email);
            $message->subject('Crate A Project');
            foreach ($csvfiles as $cf){
                $message->attach($cf);
            }
        });


        return Redirect::to('/admin/project');
    }

    public function show(Request $request, $id, $month)
    {
        $projectdata = ProjectData::where('month',$month)->where('project_id',$id)->get();
        
        $datamonths = ProjectMonth::where('project_id',$id)->first();
        
        $project = Project::where('id', $id)->first();

        $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"https://api.semrush.com/analytics/v1/?key=96b52a9e29c90a808c6908acff37521a&type=backlinks&target=".$project->website."&target_type=root_domain&export_columns=page_ascore,source_title,source_url,target_url,anchor,external_num,internal_num,first_seen,last_seen&display_limit=5");
		curl_setopt($ch, CURLOPT_POST, 1);

		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);
        if($server_output == 'Validation Error : target'){
            $notexitsdomain = 1;
        }else{
            $notexitsdomain = 0;
        }


        $projectdatasaved = ProjectData::where('month',$month)->where('project_id',$id)->first();
        if($projectdatasaved){

            if($projectdatasaved->saved == '1'){
                $saved = 1;
            }else{
                $saved = 0;
            }
        }else{
            $saved = 0;
        }

        return view('admin.project.project_show', compact('id', 'month','projectdata','datamonths','notexitsdomain','saved'));
    }
    
    public function showDataMonthViseForm(Request $request, $id, $month)
    {
        return view('admin.project.project_data_add', compact('id', 'month'));
    }

    public function addDataEntryMonthVise(Request $request)
    {
        // dd($request->all());
       $projectdata = new ProjectData();
       $projectdata->url = $request->url;
       $projectdata->ancre = $request->ancre;
       $projectdata->url_spot = $request->url_spot;
       $projectdata->prestataire = $request->prestataire;
       $projectdata->price = $request->price;
       $projectdata->month= $request->month;
       $projectdata->project_id= $request->id;
       $projectdata->save();

       return Redirect::to('admin/project/show/'.$request->id.'/'.$request->month);


    }

    public function savedDataMonthVise(Request $request, $dataid, $month)
    {
        $projectdata = ProjectData::where('project_id',$dataid)->where('month', $month)->first();

        if($projectdata->saved == 0){
            $projectdatas = ProjectData::where('project_id',$dataid)->where('month', $month)->update(['saved'=> 1]);
            return Redirect::to('admin/project/show/'.$dataid.'/'.$month);
        }else{
            $projectdatas = ProjectData::where('project_id',$dataid)->where('month', $month)->update(['saved'=> 0]);
            return Redirect::to('admin/project/show/'.$dataid.'/'.$month);
        }

    }

    public function editDataMonthViseForm(Request $request, $id, $month, $dataid)
    {
       $projectdata = ProjectData::where('id',$dataid)->first();

       return view('admin.project.project_data_edit', compact('id','month','dataid','projectdata'));
    }

    public function updateDataMonthViseForm(Request $request)
    {
       $projectdata = ProjectData::where('id',$request->dataid)->first();
       $projectdata->url = $request->url;
       $projectdata->ancre = $request->ancre;
       $projectdata->url_spot = $request->url_spot;
       $projectdata->prestataire = $request->prestataire;
       $projectdata->price = $request->price;
       $projectdata->month= $request->month;
       $projectdata->project_id= $request->id;
       $projectdata->save();

       return Redirect::to('admin/project/show/'.$request->id.'/'.$request->month);
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
