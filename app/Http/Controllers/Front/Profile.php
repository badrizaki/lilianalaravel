<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Profile extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        // $list['why'] = \App\Models\Why::orderBy('order', 'ASC')->orderBy("created_at", "DESC")->get();
        
        return view('front.profile.index', compact('list', 'data'));
    }
}