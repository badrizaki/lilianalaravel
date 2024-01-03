<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class MetaDesc extends BaseController
{
    protected $mainPage = 'sitename'; // mainpage
    protected $page = 'metadesc'; // mainpage
    protected $redirectTo = 'metadesc'; // REDIRECT URL
    protected $redirectIndex = 'metadesc.index'; // View
    protected $redirectEditable = 'metadesc.editable'; // vied add and update
    protected $redirectShow = 'metadesc.show'; // vied add and update

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'metaDesc')
        ->update(['value' => $request->value]);
    }
}