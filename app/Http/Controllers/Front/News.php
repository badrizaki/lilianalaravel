<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class News extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        $list['news'] = \App\Models\News::orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        
        return view('front.news.index', compact('list', 'data'));
    }
    
    public function detail($id='')
    {
        $list = [];
        $data = [];
        // $data = \App\Models\News::where("programId", $id)->first();
        // $data = $data->toArray();

        return view('front.news.detail', compact('list', 'data'));
    }
}