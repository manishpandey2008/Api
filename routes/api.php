<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::post('/bankvalidation', 'BankController@BankVali');



Route::post('/v1/driving-license/driving-license', 'LicenseController@license');


Route::post('/v1/rc/rc','RcController@rc');
Route::get('/v1/rc/rc/{client_id}','RcController@RcClient');



Route::post('/v1/customer','CustomerController@Customer');
Route::get('/v1/customer/{customer_id}','CustomerController@Customer_details');


Route::post('/customer/generate-otp','CustomerRequestController@CustomerCreatOtp');
Route::post('/customer/submit-otp','CustomerRequestController@CustomerSubmitOtp');
Route::post('/customer/pan','CustomerRequestController@CustomerPan');
Route::post('/customer/voter','CustomerRequestController@CustomerVoter');
Route::post('/customer/license','CustomerRequestController@CustomerLicense');
Route::post('/customer/aadhaar','CustomerRequestController@CustomerAadhaar');



// Route::post('/pullkra','PullKraController@PullKra');
// Route::post('/pullkra/config','PullKraController@PullKraConfig');



// Route::post('/webhooks','WebhooksController@Webhook');


Route::post('/aadhaar','AadharController@Aadhaar');
// Route::post('/eaadhaar','AadharController@Eaadhaar');


Route::POST('v1/ocr/aadhaar','OcrController@OcrAadhaar');
Route::POST('v1/ocr/voter','OcrController@OcrVoter');
Route::POST('/ocr/license','OcrController@OcrLicense');


Route::POST('/v1/face/face-match','FaceBetaController@FaceBeta');