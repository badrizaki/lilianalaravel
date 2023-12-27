<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Gallery extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        $list['gallery'] = \App\Models\Gallery::orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        
        return view('front.gallery.index', compact('list', 'data'));
    }
}