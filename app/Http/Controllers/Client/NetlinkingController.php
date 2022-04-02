<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetlinkingController extends Controller
{
    public function index()
    {
        $project = Project::where('email',Auth::user()->email)->first();
        $ProjectList = Project::where('email',Auth::user()->email)->get();
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
        return view("clients.netlinking_credit",compact('project','ProjectList','data'));
    }
}
