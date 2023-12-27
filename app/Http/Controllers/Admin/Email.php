<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class Email extends BaseController
{
    protected $mainPage = 'contact'; // mainpage
    protected $redirectTo = 'emails'; // REDIRECT URL
    protected $redirectIndex = 'email.index'; // View emails
    protected $redirectEditable = 'email.editable'; // vied add and update
    protected $redirectShow = 'email.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['contactEmail'] = \App\Models\Setting::where('key', 'contactEmail')->get()->first();
        $item['adminEmail'] = \App\Models\Setting::where('key', 'adminEmail')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        \App\Models\Setting::where('key', 'contactEmail')->update(['value' => $request->contactEmail]);
        \App\Models\Setting::where('key', 'adminEmail')->update(['value' => $request->adminEmail]);
    }
}