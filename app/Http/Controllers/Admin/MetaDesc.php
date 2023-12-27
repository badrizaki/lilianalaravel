<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class MetaDesc extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'metadesc'; // REDIRECT URL
    protected $redirectIndex = 'metadesc.index'; // View sitename
    protected $redirectEditable = 'metadesc.editable'; // vied add and update
    protected $redirectShow = 'metadesc.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['metaDesc'] = \App\Models\Setting::where('key', 'metaDesc')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'metaDesc')
        ->update(['value' => $request->value]);
    }
}