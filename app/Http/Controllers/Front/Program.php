<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Program extends Controller
{
    public function index()
    {
        $list = [];
        $data = [];
        $list['program'] = \App\Models\Program::orderBy('order', 'DESC')->orderBy("created_at", "DESC")->get()->toArray();
        
        return view('front.program.index', compact('list', 'data'));
    }
    
    public function detail($id='')
    {
        $list = [];
        $data = [];
        // $data = \App\Models\Program::where("programId", $id)->first();
        // $data = $data->toArray();

        return view('front.program.detail', compact('list', 'data'));
    }
}