<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiagnosticController extends Controller
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

		curl_setopt($ch, CURLOPT_URL,"https://api.semrush.com/?type=domain_organic_subdomains&key=96b52a9e29c90a808c6908acff37521a&display_limit=10&export_columns=Ur,Pc,Tg,Tr&domain=".$domain_name."&database=us");
		curl_setopt($ch, CURLOPT_POST, 1);
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
        $traffic = implode(",",$traffic);

        $apiURL = 'https://api1.seobserver.com/backlinks/metrics.json';
        $postInput = [["item_type"=>"domain", "item_value"=>"seobserver.com"], ["item_type"=>"domain", "item_value"=>"seobserver.com"], ["item_type"=>"subdomain", "item_value"=>"www.seobserver.com"], ["item_type"=>"url", "item_value"=>$domain_name]];

        $headers = [
            'X-SEObserver-key' => '61fd06df5f469a815b8b4598L1b7fbb560184b55a799be51baadc0386'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        return view('sales.diagnostic.chart',compact('traffic','domain_name','responseBody'));
    }
}
