<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Project;
use App\Models\ProjectData;
use App\Models\ProjectMonth;
use App\Models\ProjectTypeDropify;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->project = Project::where('email',Auth::user()->email)->first();
            return $next($request);
        });
    }
    public function show(Request $request, $id, $month)
    {

        $project = $this->project;

        if (isset($project)) {

        $projectdata = ProjectData::where('month',$month)->where('project_id',$project->id)->get();

        $datamonths = ProjectMonth::where('project_id',$project->id)->first();

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


        $projectdatasaved = ProjectData::where('month',$month)->where('project_id',$project->id)->first();
        if($projectdatasaved){

            if($projectdatasaved->saved == '1'){
                $saved = 1;
            }else{
                $saved = 0;
            }
        }else{
            $saved = 0;
        }
        }else{
            $projectdata = '';
            $datamonths = '';
            $notexitsdomain = '';
            $saved = '';
        }

        return view('clients.project.project_show', compact('id', 'project','month','projectdata','datamonths','notexitsdomain','saved'));
    }

    public function csvddownload(Request $request, $id, $month)
    {
        $fileName = $month.'.csv';

        $email = auth()->user()->email;

        $project = Project::where('email', $email)->first();

        $projectdata = ProjectData::where('project_id', $project->id)->where('month', $month)->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('No', 'Url', 'Ancre', 'Spot Url', 'Num of Month', 'Prestataire', 'price');

        $callback = function() use($projectdata, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($projectdata as $pd) {
                $row['No']  = $pd->id;
                $row['Url']    = $pd->url;
                $row['Ancre']  = $pd->ancre;
                $row['Spot Url']  = $pd->url_spot;
                $row['Num of Month']  = $pd->month;
                $row['Prestataire']  = $pd->prestataire;
                $row['price']  = $pd->price;

                fputcsv($file, array($row['No'], $row['Url'], $row['Ancre'], $row['Spot Url'], $row['Num of Month'], $row['Prestataire'], $row['price']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }

    public function project_type($id,$type)
    {
        $project = Project::where('email',Auth::user()->email)->first();
        $data_project = ProjectTypeDropify::where('project_id',$id)->where('project_type',$type)->get();
        return view('clients.project.project_type',compact('project','data_project','type'));
    }
}
