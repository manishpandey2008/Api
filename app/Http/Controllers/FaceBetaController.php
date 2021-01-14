<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Validator;
class FaceBetaController extends Controller
{
    private $access_token;
	public function __contruct()
	{
		$this->access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ";
    }

    public function FaceBeta(Request $request)
    {
    	$rules=[
       			'selfie'=>'required',
       			'id_card'=>'required',
       			'selfie_2'=>'required',

       			];

   			$validator=Validator::make($request->all(),$rules);
   			if ($validator->fails()) {
       			return response()->json( $validator->errors(),400);
   			}
   			
    	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/face/face-match",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
                "selfie" => new \CURLFILE($_FILES['selfie']['tmp_name'],$_FILES['selfie']['type'],$_FILES['selfie']['name']),
                "id_card" => new \CURLFILE($_FILES['id_card']['tmp_name'],$_FILES['id_card']['type'],$_FILES['id_card']['name']),
                "selfie_2" => new \CURLFILE($_FILES['selfie_2']['tmp_name'],$_FILES['selfie_2']['type'],$_FILES['selfie_2']['name']),
			),
			CURLOPT_HTTPHEADER => array(
				//"Content-Type:  application/x-www-form-urlencoded",
				"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ",
			),
		));

        		$getdata=curl_exec($curl);
        		return $getdata;
    }


}
