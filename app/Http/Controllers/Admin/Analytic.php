<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class Analytic extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'analytic'; // REDIRECT URL
    protected $redirectIndex = 'analytic.index'; // View sitename
    protected $redirectEditable = 'analytic.editable'; // vied add and update
    protected $redirectShow = 'analytic.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['analytic'] = \App\Models\Setting::where('key', 'analytic')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'analytic')->update(['value' => $request->value]);
    }
}