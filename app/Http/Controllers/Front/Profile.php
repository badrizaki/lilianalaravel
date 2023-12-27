<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Profile extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        $list['trackRecord'] = \App\Models\TrackRecord::orderBy("date", "DESC")->get()->toArray();
        $list['program'] = \App\Models\Program::take(3)->orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        
        return view('front.profile.index', compact('list', 'data'));
    }
}