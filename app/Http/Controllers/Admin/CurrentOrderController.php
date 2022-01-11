<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;

class CurrentOrderController extends Controller
{
    public function index(Request $request)
    {
        $project = Project::with('projectData')->get();
        $current = Carbon::now();
        $data = [];
        $project_data = [];
        $prev_year = $current->year - 1;
        $current_year = $current->year;
        $next_year = $current->year + 1;

        foreach ($project as $val) {
            // $end = strtotime(date($val->begining_month));
            // $start = $months = strtotime("-".$val->month." months", $end);

            $start = strtotime($val->begining_month);
            $end = strtotime("+".$val->month." months", $start);

            $data[$prev_year][$val->id] = [];
            $data[$current_year][$val->id] = [];
            $data[$next_year][$val->id] = [];


            while($start < $end)
            {
                $year = date('Y', $start);
                $month = date('m', $start);
                if($prev_year == $year){
                   array_push($data[$prev_year][$val->id], $month);
                }

                if($current_year == $year){
                    array_push($data[$current_year][$val->id], $month);
                }

                if($next_year == $year){
                    array_push($data[$next_year][$val->id], $month);
                }

                if(($year == $current_year) && ($month == date('m'))){
                    $project_data = Project::with('projectData')->orWhereMonth('begining_month', '=', date('m'))->get();
                }
                $start = strtotime("+1 month", $start);
            }
        }
        return view('admin.currentorder.index',compact('project_data'));
    }
}
