<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpotList;
use App\Models\ProjectData;
use App\Imports\SpotListImport;
use Excel;
use Illuminate\Support\Facades\Redirect;
use Response;
use App\Imports\SpotListUpdateImport;

class SpotListController extends Controller
{
    public function index(Request $request)
    {

        $url_spot = ProjectData::pluck('url_spot');


        $spotlist = SpotList::whereNotIn('spot', $url_spot)->get();
        $thematic = SpotList::select('thematic')->groupBy('thematic')->get();
       return view('admin.spotlist.list', compact('spotlist', 'thematic'));
    }

    public function edit(Request $request, $id)
    {
       $spotlist = SpotList::where('id', $id)->first();
       return view('admin.spotlist.edit', compact('spotlist'));
    }
    public function update(Request $request, $id)
    {
        $spotlist = SpotList::where('id', $id)->first();
        $listupdatearray = [
            'spot' => $request->spot ?: $spotlist->spot,
            'prix' => $request->prix ?: $spotlist->prix,
            'ref_domain' => $request->ref_domain ?: $spotlist->ref_domain,
            'trust_flow' => $request->trust_flow ?: $spotlist->trust_flow,
            'citation_flow' => $request->citation_flow ?: $spotlist->citation_flow,
            'majestic_flow' => $request->majestic_flow ?: $spotlist->majestic_flow,
            'keywords' => $request->keywords ?: $spotlist->keywords,
            'trafic' => $request->trafic ?: $spotlist->trafic,
            'gnews' => $request->gnews ?: $spotlist->gnews,
            'thematic' => $request->thematic ?: $spotlist->thematic,
            'provider' => $request->provider ?: $spotlist->provider,
        ];
        $spotlist = SpotList::where('id', $id)->update($listupdatearray);
        return Redirect::to('/admin/spot-list');

    }

    public function delete(Request $request, $id)
    {
        $spotlist = SpotList::where('id', $id)->delete();
        return Redirect::to('/admin/spot-list');
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

    public function exceldemo(Request $request)
    {
        $filePath = public_path("template/demoexel.xlsx");
        return Response::download($filePath);
    }

    public function csvdownload(Request $request)
    {
        $fileName = 'spotlist.csv';


        $url_spot = ProjectData::pluck('url_spot');


        $spotlist = SpotList::whereNotIn('spot', $url_spot)->get();

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
        $spotlist = $list->get();

        $table = view('admin.spotlist.table', compact('spotlist'))->render();

        return $table;
    }

    public function exceldownload()
    {
        $fileName = 'update-spotlist.csv';

        $spotlist = SpotList::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Spot','Prix','Profile Facebook','Ref Domains','Trust Flow','Citation Flow','Majestic Flow','Keywords','Trafic','Gnews','Thematic','Provider');

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
                $row['Trafic']  = $sl->trafic;
                $row['Gnews']  = $sl->gnews;
                $row['Thematic']  = $sl->thematic;
                $row['Provider']  = $sl->provider;

                fputcsv($file, array($row['Spot'], $row['Prix'], $row['Profile Facebook'], $row['Ref Domains'], $row['Trust Flow'], $row['Citation Flow'], $row['Majestic Flow'], $row['Keywords'],$row['Trafic'],$row['Gnews'],$row['Thematic'],$row['Provider']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function storeexcel(Request $request)
    {
        Excel::import(new SpotListUpdateImport,$request->file('excel'));

        return redirect()->route('admin.list.spot')->with("status", "Spot  list Added Using Excel Successfully");
    }
}
