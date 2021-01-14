<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class CustomerRequestController extends Controller
{
     private $access_token;
    	public function __contruct()
    	{
    		$this->access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ";
        }

        public function CustomerCreatOtp(Request $request)
        {
        		$body = json_encode(array(
        			"id_number" => $request->id_number,
        		));

        		if(!$request->id_number)
        		{
        			return json_encode(['message'=>"Aadhaar No Not found"], true);
        		}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/aadhaar-v2/generate-otp",
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


          public function CustomerSubmitOtp(Request $request)
        {
                $body = json_encode(array(
                    "client_id" => $request->client_id,
                    "otp"=>$request->otp
                ));

                 $rules=[
                        'client_id'=>'required',
                        'otp'=>'required'
                        ];

                $validator=Validator::make($request->all(),$rules);
                if ($validator->fails()) {
                    return response()->json( $validator->errors(),400);
                }

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/aadhaar-v2/submit-otp",
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




         public function CustomerPan(Request $request)
        {
        		$body = json_encode(array(
        			"id_number" => $request->id_number,
        		));

        		if(!$request->id_number)
        		{
        			return json_encode(['message'=>"Pan No Not found"], true);
        		}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/pan/pan",
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

        public function CustomerLicense(Request $request)
        {
        		$body = json_encode(array(
        			"id_number" => $request->id_number,
        			"additional_details"=>array(

        				"full_name"=>$request->full_name,
        				"dob"=>$request->dob,
        			)
        		));
        		if(!$request->id_number)
        		{
        			return json_encode(['message'=>"License No Not found"], true);
        		}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/driving-license/driving-license",
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


         public function CustomerVoter(Request $request)
        {
        		$body = json_encode(array(
        			"id_number" => $request->id_number,
        			"additional_details"=>array(

        				"full_name"=>$request->full_name,
        				"dob"=>$request->dob,
        			)
        		));
        		if(!$request->id_number)
        		{
        			return json_encode(['message'=>"Epic No Not found"], true);
        		}

        		$curl = curl_init();
        		curl_setopt_array($curl, array(
        			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/voter-id/voter-id",
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


     public function CustomerAadhaar(Request $request)
    {
            $body = json_encode(array(
                "id_number" => $request->id_number
            ));
            if(!$request->id_number)
            {
                return json_encode(['message'=>"Aadhaar No Not found"], true);
            }

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/aadhaar-validation/aadhaar-validation",
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
