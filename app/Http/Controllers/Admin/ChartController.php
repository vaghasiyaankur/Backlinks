<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(Request $request)
    {

        $ProjectList = Project::where('status',0)->get();
        $current = Carbon::now();
        $data = [];
        $prev_year = $current->year - 1;
        $current_year = $current->year;
        $next_year = $current->year + 1;


        // $year = date('Y', strtotime($ProjectList->begining_month));


        foreach($ProjectList as $project){
            $end = strtotime(date($project->begining_month));
            $start = $months = strtotime("-".$project->month." months", $end);


            $start = strtotime($project->begining_month);
            $end = strtotime("+".$project->month." months", $start);

            $data[$prev_year][$project->id] = [];
            $data[$current_year][$project->id] = [];
            $data[$next_year][$project->id] = [];


            while($start < $end)
            {
                $year = date('Y', $start);
                $month = date('m', $start);

                if($prev_year == $year){
                   array_push($data[$prev_year][$project->id], $month);
                }

                if($current_year == $year){
                    array_push($data[$current_year][$project->id], $month);
                }

                if($next_year == $year){
                    array_push($data[$next_year][$project->id], $month);
                }

                $start = strtotime("+1 month", $start);
            }

        }

        return view('admin.chart.index', compact('data','ProjectList'));

    }

    public function changecolor(Request $request)
    {

        // dd($request->all());
        // $updatecolor = Project::where('id', $request->id)->update([$request->type => $request->color_code]);
        $project = Project::where('id', $request->id)->first();
        $type = $request->type;

        if($request->color_code == 1){

            $greentype = $type."_green";
            $green = explode(',',$project->$greentype);

            if (($key = array_search($request->month, $green)) !== false) {
                unset($green[$key]);
            }


            $orangetype = $type."_orange";
            $orange = explode(',',$project->$orangetype);

            if (($key = array_search($request->month, $orange)) !== false) {
                unset($orange[$key]);
            }

            $implodeorange = implode(',', $orange);
            $implodegreen = implode(',', $green);
            $update = Project::where('id', $request->id)->update([$greentype => $implodegreen, $orangetype => $implodeorange]);

        }

        if($request->color_code == 2){
            $orangetype = $type."_orange";
            $orange = explode(',',$project->$orangetype);

            if (($key = array_search($request->month, $orange)) !== false) {
                unset($orange[$key]);
            }
            array_push($orange,$request->month);

            $greentype = $type."_green";
            $green = explode(',',$project->$greentype);

            if (($key = array_search($request->month, $green)) !== false) {
                unset($green[$key]);
            }


            $implodeorange = implode(',', $orange);
            $implodegreen = implode(',', $green);
            $update = Project::where('id', $request->id)->update([$greentype => $implodegreen, $orangetype => $implodeorange]);
        }

        if($request->color_code == 3){
            $greentype = $type."_green";
            $green = explode(',',$project->$greentype);

            if (($key = array_search($request->month, $green)) !== false) {
                unset($green[$key]);
            }
            array_push($green,$request->month);

            $orangetype = $type."_orange";
            $orange = explode(',',$project->$orangetype);

            if (($key = array_search($request->month, $orange)) !== false) {
                unset($orange[$key]);
            }


            $implodeorange = implode(',', $orange);
            $implodegreen = implode(',', $green);
            $update = Project::where('id', $request->id)->update([$greentype => $implodegreen, $orangetype => $implodeorange]);
        }
        return 1;
    }
}
