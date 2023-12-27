<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class MetaKey extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'metakey'; // REDIRECT URL
    protected $redirectIndex = 'metakey.index';
    protected $redirectEditable = 'metakey.editable'; // vied add and update
    protected $redirectShow = 'metakey.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['metaKeywords'] = \App\Models\Setting::where('key', 'metaKeywords')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'metaKeywords')
        ->update(['value' => $request->value]);
    }
}