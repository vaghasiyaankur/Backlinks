<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Carbon;
use App\Models\ProjectData;
use Illuminate\Auth\Access\Response;
use App\Models\SpotList;

class CurrentOrderController extends Controller
{
    public function index()
    {
        $project = Project::with('projectData')->get();
        $current = Carbon::now();
        $project_data = [];
        $provider = [];
        $current_year = $current->year;

        foreach ($project as $val) {

            $start = strtotime($val->begining_month);
            $end = strtotime("+".$val->month." months", $start);

            $project_data[$val->name] = [];

            $i = 1;
            while($start < $end)
            {
                $year = date('Y', $start);
                $month = date('m', $start);
                if(($year == $current_year) && ($month == date('m'))){
                    $project_data[$val->name] = ProjectData::where('month', $i)->where('project_id', $val->id)->select('url','ancre','url_spot','prestataire','price')->get();
                    $provider[] = ProjectData::where('month', $i)->where('project_id', $val->id)->select('prestataire')->get()->groupBy('prestataire');
                }
                $start = strtotime("+1 month", $start);
                $i += 1;
            }
        }
        $provider_data = [];
        foreach ($provider as $data) {
            foreach ($data as $key => $val) {
                if (!in_array($key,$provider_data)) {
                    $provider_data[] = $key;
                }
            }
        }
        $spot_list = SpotList::select('spot')->get();
        $spotlist = [];
        foreach ($spot_list as $index => $value) {
            $spotlist[$index] = $value->spot;

        }
        return view('admin.currentorder.index',compact('project_data','provider_data','spotlist'));
    }
    public function filter(Request $request)
    {
        $project = Project::with('projectData')->where('name', 'LIKE','%'. $request->project . '%')->get();
        if ($request->date) {
            $date = $request->date;
        }else{
            $date = Carbon::now()->format('m/d/Y');
        }
        $project_data = [];

        $current_month = Carbon::createFromFormat('m/d/Y', $date)->format('m');
        $current_year = Carbon::createFromFormat('m/d/Y', $date)->format('Y');

        foreach ($project as $val) {

            $start = strtotime($val->begining_month);
            $end = strtotime("+".$val->month." months", $start);

            $project_data[$val->name] = [];

            $i = 1;
            while($start < $end)
            {
                $year = date('Y', $start);
                $month = date('m', $start);
                if(($year == $current_year) && ($month == $current_month)){
                    $project_data[$val->name] = ProjectData::where('month', $i)->where('project_id', $val->id)->where('prestataire','LIKE','%'.$request->provider.'%')->select('url','ancre','url_spot','prestataire','price')->get();
                }
                $start = strtotime("+1 month", $start);
                $i += 1;
            }
        }
        $spot_list = SpotList::select('spot')->get();
        $spotlist = [];
        foreach ($spot_list as $index => $value) {
            $spotlist[$index] = $value->spot;

        }
        return view('admin.currentorder.table',compact('project_data','spotlist'))->render();
    }

    public function download_csv(Request $request)
    {
        $fileName = 'currentorder.csv';

        $project = Project::with('projectData')->where('name', 'LIKE','%'. $request->csv_project . '%')->get();
        if ($request->csv_date) {
            $date = $request->csv_date;
        }else{
            $date = Carbon::now()->format('m/d/Y');
        }
        $project_data = [];

        $current_month = Carbon::createFromFormat('m/d/Y', $date)->format('m');
        $current_year = Carbon::createFromFormat('m/d/Y', $date)->format('Y');
        foreach ($project as $val) {

            $start = strtotime($val->begining_month);
            $end = strtotime("+".$val->month." months", $start);

            $project_data[$val->name] = [];

            $i = 1;
            while($start < $end)
            {
                $year = date('Y', $start);
                $month = date('m', $start);
                if(($year == $current_year) && ($month == $current_month)){
                    $project_data[$val->name] = ProjectData::where('month', $i)->where('project_id', $val->id)->where('prestataire','LIKE','%'.$request->csv_provider.'%')->select('url','ancre','url_spot','prestataire','price')->get();
                }
                $start = strtotime("+1 month", $start);
                $i += 1;
            }
        }
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name','URL','Ancre','Url Spot','Prestataire','Price');
        $callback = function() use($project_data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($project_data as $key => $pd) {
                foreach($pd as $p){
                    $row['Name']  = $key;
                    $row['URL']    = $p->url;
                    $row['Ancre']  = $p->ancre;
                    $row['Url Spot']  = $p->url_spot;
                    $row['Prestataire']  = $p->prestataire;
                    $row['Price']  = $p->price;
                    fputcsv($file, array($row['Name'], $row['URL'], $row['Ancre'], $row['Url Spot'], $row['Prestataire'], $row['Price']));
                }

            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
