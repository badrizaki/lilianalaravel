<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class SiteName extends BaseController
{
    protected $mainPage = 'sitename'; // mainpage
    protected $page = 'sitename'; // mainpage
    protected $redirectTo = 'sitename'; // REDIRECT URL
    protected $redirectIndex = 'sitename.index'; // View sitename
    protected $redirectEditable = 'sitename.editable'; // vied add and update
    protected $redirectShow = 'sitename.show'; // vied add and update

    public function index()
    {
        $item['siteName'] = \App\Models\Setting::where('key', 'siteName')->get()->first();
        return $this->view($this->redirectIndexPath(), compact('item'));
    }

    protected function saveData(Request $request, $id)
    {
        $item = \App\Models\Setting::where('key', 'siteName')
        ->update(['value' => $request->value]);
    }
}