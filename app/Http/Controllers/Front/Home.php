<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Mail\Contact;
use Datatables;
use Mail;
use DB;

class Home extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        
        return view('front.home', compact('list', 'data'));
    }

    public function lang(Request $request)
    {
        $data = $request->all();
        Session::put('lang', $data['lang']);
        return Redirect::back();
    }
}