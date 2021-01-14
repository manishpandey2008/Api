<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OcrController extends Controller
{
    public function OcrAadhaar(Request $request)
    {
    	if(!$request->hasFile('file'))
    	{
    		return json_encode(['message'=>"File Not found"],true);
    	}


    	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/ocr/aadhaar",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
                "file" => new \CURLFILE($_FILES['file']['tmp_name'],$_FILES['file']['type'],$_FILES['file']['name']),
			),
			CURLOPT_HTTPHEADER => array(
				//"Content-Type:  application/x-www-form-urlencoded",
				"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ",
			),
		));

        		$getdata=curl_exec($curl);
        		return $getdata;
    }

public function OcrVoter(Request $request)
    {
    	if(!$request->hasFile('file'))
    	{
    		return json_encode(['message'=>"File Not found"],true);
    	}


    	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/ocr/voter",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
                "file" => new \CURLFILE($_FILES['file']['tmp_name'],$_FILES['file']['type'],$_FILES['file']['name']),
			),
			CURLOPT_HTTPHEADER => array(
				//"Content-Type:  application/x-www-form-urlencoded",
				"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ",
			),
		));

        		$getdata=curl_exec($curl);
        		return $getdata;



    }

 public function OcrLicense(Request $request)
    {
    	if(!$request->hasFile('front'))
    	{
    		return json_encode(['message'=>"Front File Not found"],true);
    	}
    	if(!$request->hasFile('back'))
    	{
    		return json_encode(['message'=>"Back Not found"],true);
    	}


    	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/ocr/license",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>json_encode(array(
                "front" => new \CURLFILE($_FILES['front']['tmp_name'],$_FILES['front']['type'],$_FILES['front']['name']),
                "back" => new \CURLFILE($_FILES['back']['tmp_name'],$_FILES['back']['type'],$_FILES['back']['name']),
			)),
			CURLOPT_HTTPHEADER => array(
				//"Content-Type:  application/x-www-form-urlencoded",
				"Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ",
			),
		));

        		$getdata=curl_exec($curl);
        		return "$getdata";
    }
}
