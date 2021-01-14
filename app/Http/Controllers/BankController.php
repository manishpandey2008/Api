<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BankController extends Controller
{

	private $access_token;
	public function __contruct()
	{
		$this->access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ";
    }

    public function BankVali(Request $request)
    {
    		$body = json_encode(array(
    			"id_number" => $request->id_number,
    			"ifsc" => $request->ifsc,
    		));

    		$curl = curl_init();
    		curl_setopt_array($curl, array(
    			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/bank-verification",
    			CURLOPT_RETURNTRANSFER => true,
    			CURLOPT_ENCODING => "",
    			CURLOPT_MAXREDIRS => 10,
    			CURLOPT_TIMEOUT => 0,
    			CURLOPT_FOLLOWLOCATION => true,
    			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    			CURLOPT_CUSTOMREQUEST => "POST",
    			CURLOPT_POSTFIELDS => $body,
    			CURLOPT_HTTPHEADER => array(
    				"Content-Type: application/json",
    				"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ",
                ),

    		));

            $get_data = curl_exec($curl);
            $initializeResponse = json_decode($get_data, true);


    		if (!$request->id_number) {
    			return json_encode(['message'=>"Account Number Not found"], true);
            }

            if (!$request->ifsc) {
    			return json_encode(['message'=>"IFSC Not found"], true);
            }

            return $get_data;	
    }





}
