<?php

namespace App\Helpers;
 
/**
 *  Name         : APIHelper.
 *  Description  : This class for send response standard API.
 *  @copyright   : Badri Zaki
 *  @version     : 1.0
 *  @author      : Badri Zaki - badrizaki@gmail.com
**/

class APIHelper
{
	/* BASIC AUTH
	return \APIHelper::setResponse([
                "statusCode" => "401",
                "message" => trans('response.401'),
                "data" => [],
            ]);
	*/
    public static function setResponse($request = [])
    {
    	$response = [
    		"statusCode" => isset($request['statusCode']) ? $request['statusCode'] :200,
    		"message" => isset($request['message']) ? $request['message'] :trans('response.200'),
    		"data" => isset($request['data']) ? $request['data'] :'',
    	];

        return response()->json($response, $response['statusCode']);
    }
}