<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function index(Request $req)
    {
        $url = $req->domain_name;
        $parse = parse_url($url);
        if (isset($parse['host'])) {
            $domain_name = $parse['host'];
        }else{
            $domain_name = $parse['path'];
        }
        $domain_name = str_ireplace('www.', '', $domain_name);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"https://api.semrush.com/analytics/v1/?key=96b52a9e29c90a808c6908acff37521a&type=backlinks_overview&target=".$domain_name."&target_type=root_domain&export_columns=ascore,total,domains_num,urls_num,ips_num,ipclassc_num,follows_num,nofollows_num,sponsored_num,ugc_num,texts_num,images_num,forms_num,frames_num");
		curl_setopt($ch, CURLOPT_POST, 1);

		// In real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS,
		//          http_build_query(array('postvar1' => 'value1')));

		// Receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);
        curl_close ($ch);

        $traffic = [];
        $server_output = preg_replace("/[^0-9\.]/", " ", $server_output);
        $server_output = trim(preg_replace('/\s+/u', ' ', $server_output));
        $server_output = explode(' ', $server_output);
        foreach ($server_output as $server) {
            if (is_numeric($server)) {
                $traffic[] = $server;
            }
        }
        // dd($traffic);
        $traffic = implode(",",$traffic);

        $chr = curl_init();

		curl_setopt($chr, CURLOPT_URL,"https://api.semrush.com/?type=domain_adwords&key=96b52a9e29c90a808c6908acff37521a&display_limit=10&export_columns=Ph,Po,Pp,Pd,Nq,Cp,Vu,Tr,Tc,Co,Nr,Td&domain=".$domain_name."&display_sort=po_asc&database=us");
		curl_setopt($chr, CURLOPT_POST, 1);

		// In real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS,
		//          http_build_query(array('postvar1' => 'value1')));

		// Receive server response ...
		curl_setopt($chr, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($chr);
        curl_close ($chr);

        $keyword = [];
        $server_output = preg_replace("/[^0-9\.]/", " ", $server_output);
        $server_output = trim(preg_replace('/\s+/u', ' ', $server_output));
        $server_output = explode(' ', $server_output);
        foreach ($server_output as $server) {
            if (is_numeric($server)) {
                $keyword[] = $server;
            }
        }
        $keyword = implode(",",$keyword);

        $apiURL = 'https://api1.seobserver.com/backlinks/metrics.json';
        $postInput = [["item_type"=>"domain", "item_value"=>$domain_name], ["item_type"=>"domain", "item_value"=>$domain_name], ["item_type"=>"subdomain", "item_value"=>$domain_name], ["item_type"=>"url", "item_value"=>$domain_name]];

        $headers = [
            'X-SEObserver-key' => '61fd06df5f469a815b8b4598L1b7fbb560184b55a799be51baadc0386'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        // dd($responseBody);
        return view('admin.sales.chart',compact('traffic','domain_name','responseBody','keyword'));
    }
}
