<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PanAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $access_token;
	public function __contruct()
	{
		$this->access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MjUzOTIyMTYsImp0aSI6IjhkOWZmNTFiLTJiYmItNDc4My1iYmI5LTg5ZWMzNGY3MDNmZiIsImlkZW50aXR5IjoiZGV2LmRvY2JveXpAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwiaWF0IjoxNTkzODU2MjE2LCJuYmYiOjE1OTM4NTYyMTYsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19LCJ0eXBlIjoiYWNjZXNzIn0.f0Ea5UmL_DQsSCBF6sWJzU-n7NPT9TL_IkKFY_a-3KQ";
    }

    public function authenticate(Request $request)
	{

		$checkAuth = DB::table('zapfin_ext_apis_authentication')
		->where('username',$request->username)
		->where('password',$request->password)
		->first();

       // return response()->json(array("uname" => $request->username, "token" => $request->password),200);
		if (!$checkAuth) return response()->json(array("error" => 1, "message" => 'username or password is incorrect'),401);

		$token = bin2hex(openssl_random_pseudo_bytes(64));

		$checkAuth = DB::table('zapfin_ext_apis_authentication')
		->where('username',$request->username)
		->where('password',$request->password)
		->update(['token' => $token]);

		return response()->json(array("error" => 0, "token" => $token),200);

    }


    //Panlite Apli Implementation
    public function panlite(Request $request){
    	
		$body = json_encode(array(
			"id_number" => $request->id_number,

		));

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


		if (!$request->id_number) {
			return json_encode(['message'=>"Pan id Not found"], true);
        }

        return $get_data;


    }

    //pan upload api implementation
    public function panupload(Request $request){
        //checking if file exists or not
        if (!$request->hasFile('file')) {
            return json_encode(['message'=>"file not found"], true);
        }


        $curl1 = curl_init();
		curl_setopt_array($curl1, array(
			CURLOPT_URL => "https://sandbox.flowboard.in/api/v1/pan/pan-upload",
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
        $get_data1 = curl_exec($curl1);

        return $get_data1;

    }


}
