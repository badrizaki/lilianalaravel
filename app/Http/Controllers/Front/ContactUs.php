<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\Contact;
use Mail;

class ContactUs extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        
        return view('front.contact', compact('list', 'data'));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name'          => 'required|string',
    		'email'         => 'required|email',
    		'subject'       => 'required|string',
    		'pesan'       => 'required|string',
    		'g-recaptcha-response' => 'required'
    	],
    	[
    		'g-recaptcha-response.required' => 'Captcha is required',
    	]);
    	if ($validator->fails())
    	{
    		$statusCode = 400;
    		// $statusCode = $this->Config::get('statusCode.file_invalid.code');
    		$message    = '<ul>';
    		$errors     = $validator->errors();
    		foreach ($errors->all() as $msg)
    		{
    			$message .= '<li>'.$msg.'</li>';
    		}
    		$message .= '</ul>';
    		$response = [
    			'statusCode'    => $statusCode,
    			'message'       => $message,
    		];
    		return response()->json($response, 201);
    	}

    	$contactEmail = \GetData::setting()->contactEmail['value'];
    	if ($contactEmail)
    	{
    		$contactEmailArr = explode(',', $contactEmail);
    		$emails = [];
    		foreach($contactEmailArr as $key => $val)
    		{
    			$ua = [];
    			$ua['email']    = trim($val);
    			$ua['name']     = trim($val);
    			$emails[$key]   = (object)$ua;
    		}
    		Mail::to($emails)->send(new Contact($request->all()));
    	}

    	$response = [
    		'statusCode'    => 200,
    		'message'       => 'Success',
    	];
    	return response()->json($response, 200);
    }
}