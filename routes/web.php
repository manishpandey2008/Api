<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('apival',function(){
		//$api='https://api.covid19api.com/country/india/status/confirmed/live';
		$country='india';
		$api='https://api.covid19api.com/total/dayone/country/'.$country;

		$responce=	Http::get($api);
		$x=$responce->json();

		dd($x[count($x)-1]['Confirmed']);
});
