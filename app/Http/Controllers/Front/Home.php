<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Home extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        $list['program'] = \App\Models\Program::take(3)->orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        $list['gallery'] = \App\Models\Gallery::take(3)->orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        $list['news'] = \App\Models\News::take(3)->orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        
        return view('front.home', compact('list', 'data'));
    }

    public function lang(Request $request)
    {
        $data = $request->all();
        Session::put('lang', $data['lang']);
        return Redirect::back();
    }
}