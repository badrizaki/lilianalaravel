<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class FinancialServices extends Controller
{
    public function brokerage()
    {
        $list = [];
        $data = [];
        
        return view('front.financialservices.brokerage', compact('list', 'data'));
    }

    public function underwriting()
    {
        $list = [];
        $data = [];
        // $list['underwriting'] = \App\Models\Why::orderBy('order', 'ASC')->get();
        
        return view('front.financialservices.underwriting', compact('list', 'data'));
    }
}