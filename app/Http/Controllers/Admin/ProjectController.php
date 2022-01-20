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
use App\Models\SpotList;

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

        $projCheck = '';

        if($request->projectType == '1' || $request->projectType == '2'){
            if($request->projectCheckbox){
                $projCheck = implode(",",$request->projectCheckbox);
            }
        }


        $count = Project::where('name',$request->name)->count();
        if($count){
            return Redirect::back()->withErrors(['msg' => 'This Project Name Already Exits']);
        }
        // dd($request->begining_month);
        $project = new Project();
        $project->begining_month = Carbon::parse($request->begining_month);
        $project->name = $request->name;
        $project->website = $request->website ;
        $project->email = $request->email ;
        $project->month = $request->month ;
        $project->price = $request->price ;
        $project->number_of_backlinks = $request->number_of_backlinks ;
        $project->project_type_id = $request->projectType;
        $project->project_type_checkbox = $projCheck ? $projCheck : '';
        // $project->refonte = $request->refonte;
        $project->total_price = $request->total_price;
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

        // $ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL,"https://api.semrush.com/analytics/v1/?key=96b52a9e29c90a808c6908acff37521a&type=backlinks&target=".$project->website."&target_type=root_domain&export_columns=page_ascore,source_title,source_url,target_url,anchor,external_num,internal_num,first_seen,last_seen&display_limit=5");
		// curl_setopt($ch, CURLOPT_POST, 1);


		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// $server_output = curl_exec($ch);

		// curl_close ($ch);
        // if($server_output == 'Validation Error : target'){
        //     $notexitsdomain = 1;
        // }else{
        //     $notexitsdomain = 0;
        // }


        $projectdatasaved = ProjectData::where('month',$month)->where('project_id',$id)->first();
        $saved = 0;
        if($projectdatasaved){

            if($projectdatasaved->saved == '1'){
                $saved = 1;
            }
        }else{
            $saved = 0;
        }
        $spot_list = SpotList::select('spot')->get();

        $spotlist = [];
        foreach ($spot_list as $index => $value) {
            $spotlist[$index] = $value->spot;

        }
        $thematic = SpotList::select('thematic')->groupBy('thematic')->get();
        return view('admin.project.project_show', compact('id', 'month','projectdata','datamonths','project','saved','spotlist','thematic'));
    }

    public function showDataMonthViseForm(Request $request, $id, $month)
    {
        return view('admin.project.project_data_add', compact('id', 'month'));
    }

    public function addDataEntryMonthVise(Request $request)
    {
        $url = explode("\n", str_replace("\r", "",$request->url));
        $ancre = explode("\n", str_replace("\r", "",$request->ancre));
        $url_spot = explode("\n", str_replace("\r", "",$request->url_spot));
        $prestataire = explode("\n", str_replace("\r", "",$request->prestataire));
        $price = explode("\n", str_replace("\r", "",$request->price));

        foreach($url as $index=>$value){
            $projectdata = new ProjectData();
            $projectdata->url = $value;
            $projectdata->ancre = isset($ancre[$index]) ?  $ancre[$index] : '';
            $projectdata->url_spot = isset($url_spot[$index]) ?  $url_spot[$index] : '';
            $projectdata->prestataire = isset($prestataire[$index]) ?  $prestataire[$index] : '';
            $projectdata->price = isset($price[$index]) ?  $price[$index] : '';
            $projectdata->month= $request->month;
            $projectdata->project_id= $request->id;
            $projectdata->save();
        }

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

    public function deleteDataMonthViseForm(Request $request, $id, $month, $dataid)
    {
        ProjectData::where('id',$dataid)->delete();
        $projectdata = ProjectData::where('project_id',$id)->where('month', $month)->get();

        $datamonths = ProjectMonth::where('project_id',$id)->first();

        $project = Project::where('id', $id)->first();

        $projectdatasaved = ProjectData::where('month',$month)->where('project_id',$id)->first();
        $saved = 0;
        if($projectdatasaved){
            if($projectdatasaved->saved == '1'){
                $saved = 1;
            }
        }else{
            $saved = 0;
        }
        $thematic = SpotList::select('thematic')->groupBy('thematic')->get();
        $spot_list = SpotList::select('spot')->get();
        $spotlist = [];
        foreach ($spot_list as $index => $value) {
            $spotlist[$index] = $value->spot;

        }
       return view('admin.project.project_show', compact('id', 'month','projectdata','datamonths','project','saved','thematic','spotlist'));
    }

    public function showDetailDataMonthViseForm(Request $request, $id, $month, $dataid)
    {
        $projectdata = ProjectData::where('id',$dataid)->first();
        $project = Project::where('id', $projectdata->project_id)->first();
// dd($projectdata);
        return view('admin.project.project_detail', compact('id', 'month','projectdata','project'));
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

    public function edit(Request $request, $id)
    {
        $ProjectType = ProjectType::all();
        $project = Project::where('id', $id)->first();
        $arraycheckbox = explode(',',$project->project_type_checkbox);

        return view('admin.project.project_edit', compact('ProjectType','project','arraycheckbox'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $projCheck = '';

        if($request->projectType == '1' || $request->projectType == '2'){
            if($request->projectCheckbox){
                $projCheck = implode(",",$request->projectCheckbox);
            }
        }

        $update_array = [
            'begining_month' => Carbon::parse($request->begining_month),
            'name' => $request->name,
            'website' => $request->website ,
            'email' => $request->email ,
            'month' => $request->month ,
            'price' => $request->price ,
            'number_of_backlinks' => $request->number_of_backlinks ,
            'project_type_id' => $request->projectType,
            // 'refonte' => $request->refonte,
            'total_price' => $request->total_price,
            'project_type_checkbox' => $projCheck ? $projCheck : '',
        ];
        $project = Project::where('id', $id)->update($update_array);

        $projectdata = ProjectMonth::where('project_id', $id)->update(['months' => $request->month]);


        return Redirect::to('/admin/project');

    }

    public function delete($id)
    {
        $projectdata = ProjectData::where('project_id',$id)->delete();

        $datamonths = ProjectMonth::where('project_id',$id)->delete();

        $project = Project::where('id', $id)->delete();
        $ProjectList = Project::all();
        return view('admin.project.project_list', compact('ProjectList'));
    }
    public function checkwebsite(Request $request)
    {
        $website = explode(",",$request->website);
        # code...

        $ch = curl_init();

        $notexitsdomain = [];
        foreach ($website as $webs) {
            curl_setopt($ch, CURLOPT_URL,"https://api.semrush.com/analytics/v1/?key=96b52a9e29c90a808c6908acff37521a&type=backlinks&target=".$webs."&target_type=root_domain&export_columns=page_ascore,source_title,source_url,target_url,anchor,external_num,internal_num,first_seen,last_seen&display_limit=5");
            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            if($server_output == 'Validation Error : target'){
                $notexitsdomain[] = 1;
            }else{
                $notexitsdomain[] = 0;
            }
        }
        curl_close ($ch);

        return $notexitsdomain;

    }

    public function filter(Request $request)
    {
        // $projectdata = ProjectData::orderBy('id','ASC');
        // if ($req->url) {
        //     $projectdata->where('url', 'like', '%' . $req->url . '%');
        // }
        // if ($req->ancre) {
        //     $projectdata->where('ancre', 'like', '%' . $req->ancre . '%');
        // }
        // if ($req->urlspot) {
        //     $projectdata->where('url_spot', 'like', '%' . $req->urlspot . '%');
        // }
        // if ($req->prestataire) {
        //     $projectdata->where('prestataire', 'like', '%' . $req->prestataire . '%');
        // }
        // if ($req->pricefrom) {
        //     $projectdata->where('price', '>=', $req->pricefrom);
        // }
        // if ($req->priceto) {
        //     $projectdata->where('price', '<=', $req->priceto);
        // }
        // $projectdata = $projectdata->where('project_id', $req->id)->where('month', $req->month)->get();

        // $id = $req->id;
        // $month = $req->month;

        // $table = view('admin.project.table', compact('projectdata','id','month'))->render();

        // return $table;
        $url_spot = ProjectData::pluck('url_spot');

        $list = SpotList::whereNotIn('spot', $url_spot);


        if($request->prixFrom){
            $list->where('prix', '>=', $request->prixFrom);
        }

        if($request->prixTo){
            $list->where('prix', '<=', $request->prixTo);
        }
        if($request->refFrom){
            $list->where('ref_domain', '>=', $request->refFrom);
        }

        if($request->refTo){
            $list->where('ref_domain', '<=', $request->refTo);
        }
        if($request->trustFrom){
            $list->where('trust_flow', '>=', $request->trustFrom);
        }

        if($request->trustTo){
            $list->where('trust_flow', '<=', $request->trustTo);
        }
        if($request->citationFrom){
            $list->where('citation_flow', '>=', $request->citationFrom);
        }

        if($request->citationTo){
            $list->where('citation_flow', '<=', $request->citationTo);
        }
        if($request->majesticFrom){
            $list->where('majestic_flow', '>=', $request->majesticFrom);
        }

        if($request->majesticTo){
            $list->where('majestic_flow', '<=', $request->majesticTo);
        }
        if($request->keywordsFrom){
            $list->where('keywords', '>=', $request->keywordsFrom);
        }

        if($request->keywordsTo){
            $list->where('keywords', '<=', $request->keywordsTo);
        }

        if($request->traficFrom){
            // $trafic = 0;
            $list->where('trafic', '>=', $request->traficFrom);
        }

        if($request->traficTo){
            $list->where('trafic', '<=', $request->traficTo);
        }

        if($request->thematic){
            $list->where('thematic', $request->thematic);
        }

        if($request->gnews){
            $list->whereNotNull('gnews');
        }

        if($request->spot){
            $list->Where('spot', 'like', '%' . $request->spot . '%');
        }

        $spot = $list->pluck('spot');

        return $spot;
    }

    public function spot_url_update(Request $req)
    {
        $id = explode(",",$req->id);
        $spot_url = explode(",",$req->spot_url);
        foreach ($spot_url as $index=>$val) {
            ProjectData::where('id',$id[$index])->update(['url_spot'=>$val]);
        }
    }

}
