<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class MetaKey extends BaseController
{
    protected $mainPage = 'sitename'; // mainpage
    protected $page = 'metakey'; // mainpage
    protected $redirectTo = 'metakey'; // REDIRECT URL
    protected $redirectIndex = 'metakey.index'; // View
    protected $redirectEditable = 'metakey.editable'; // vied add and update
    protected $redirectShow = 'metakey.show'; // vied add and update

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'metaKeywords')
        ->update(['value' => $request->value]);
    }
}