<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;

class Contact extends BaseController
{
	public function index()
	{
		$mainPage = "contact";
		$list = [];
        return view('admin.contact.index', compact('list', 'mainPage'));
	}
}