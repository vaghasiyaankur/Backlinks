<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpotList;
use App\Imports\SpotListImport;
use Excel;

class SpotListController extends Controller
{
    public function index(Request $request)
    {
        $spotlist = SpotList::all();
        $thematic = SpotList::select('thematic')->groupBy('thematic')->get();
       return view('admin.spotlist.list', compact('spotlist', 'thematic'));
    }
    public function excel(Request $request)
    {
        return view('admin.spotlist.excel');
    }

    public function excelstore(Request $request)
    {
        Excel::import(new SpotListImport,request()->file('excel'));
               
        return redirect()->route('admin.list.spot')->with("status", "Spot  list Added Using Excel Successfully");
    }

    public function csvdownload(Request $request)
    {
        $fileName = 'spotlist.csv';



        $spotlist = SpotList::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Spot','Prix','Profile Facebook','Ref Domains','Trust Flow','Citation Flow','Majestic Flow','Keywords');

        $callback = function() use($spotlist, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($spotlist as $sl) {
                $row['Spot']  = $sl->spot;
                $row['Prix']    = $sl->prix;
                $row['Profile Facebook']  = $sl->profile_facebook;
                $row['Ref Domains']  = $sl->ref_domain;
                $row['Trust Flow']  = $sl->trust_flow;
                $row['Citation Flow']  = $sl->citation_flow;
                $row['Majestic Flow']  = $sl->majestic_flow;
                $row['Keywords']  = $sl->keywords;

                fputcsv($file, array($row['Spot'], $row['Prix'], $row['Profile Facebook'], $row['Ref Domains'], $row['Trust Flow'], $row['Citation Flow'], $row['Majestic Flow'], $row['Keywords']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function filters(Request $request)
    {
        $list = SpotList::orderBy('id', 'ASC');


        if($request->prix){
            $list->where('prix', '>=', $request->prix);
        }

        if($request->trafic){
            // $trafic = 0;
            // $list->where('trafic', '<=', $request->trafic);
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
        $spotlist = $list->get();

        $table = view('admin.spotlist.table', compact('spotlist'))->render();

        return $table;
    }
}
