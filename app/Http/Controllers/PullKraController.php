<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class PullKraController extends Controller
{
     private $access_token;
    	public function __contruct()
    	{
    		$this->access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ";
        }

        public function PullKra(Request $request)
        {
        		$body = json_encode(array(
        			"id_number" => $request->id_number,
        			"dob"=>$request->dob
        		));

        		 $rules=[
        				'id_number'=>'required',
        				'dob'=>'required'
        				];

    			$validator=Validator::make($request->all(),$rules);
    			if ($validator->fails()) {
        			return response()->json( $validator->errors(),400);
    			}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/pull-kra/pull-kra",
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
                return $get_data;	
        }


        public function PullKraConfig(Request $request)
        {
        		$body = json_encode(array(
        			"kra_authority" => $request->kra_authority,
        			"kra_user"=>$request->kra_user,
        			"kra_password"=>$request->kra_password,
        			"kra_additional"=>$request->kra_additional

        		));

        		 $rules=[
        				'kra_authority'=>'required',
        				'kra_user'=>'required',
        				'kra_password'=>'required',
        				'kra_additional'=>'required'
        				];

    			$validator=Validator::make($request->all(),$rules);
    			if ($validator->fails()) {
        			return response()->json( $validator->errors(),400);
    			}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/pull-kra/config",
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
                return $get_data;	
        }
}
