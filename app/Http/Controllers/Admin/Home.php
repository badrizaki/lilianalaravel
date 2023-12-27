<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;

class Home extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $page = 'home'; // mainpage
    protected $redirectTo = 'homecontent'; // REDIRECT URL
    protected $redirectIndex = 'home.home'; // View home
    protected $redirectEditable = 'home.editable'; // vied add and update
    protected $redirectShow = 'home.show'; // vied add and update

	public function index()
	{
		$list = [];
        return $this->view('admin.home.home', compact('list'));
	}

	public function accessDenied()
	{
		$list = [];
        return $this->view('admin.home.accessdenied', compact('list'));
	}
}