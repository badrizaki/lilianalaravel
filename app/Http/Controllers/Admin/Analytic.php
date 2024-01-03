<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class Analytic extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $page = 'analytic'; // mainpage
    protected $redirectTo = 'analytic'; // REDIRECT URL
    protected $redirectIndex = 'analytic.index'; // View sitename
    protected $redirectEditable = 'analytic.editable'; // vied add and update
    protected $redirectShow = 'analytic.show'; // vied add and update

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'analytic')->update(['value' => $request->value]);
    }
}