<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrganizationChart extends BaseController
{
    protected $mainPage = 'profile'; // mainpage
    protected $redirectTo = 'organizationchart'; // REDIRECT URL
    protected $redirectIndex = 'organizationchart.index'; // View
    protected $redirectEditable = 'organizationchart.editable'; // vied add and update
    protected $redirectShow = 'organizationchart.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['organizationchart'] = \App\Models\TextBank::where('key', 'organizationChart')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        if ($request->content2)
        {
            $image          = $request->content2;
            $imageName      = time().$image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $data = [
                "content2" => $imageUrl
            ];
            $item = \App\Models\TextBank::where('key', 'organizationChart')->update($data);
        } elseif ($request->deletecontent2 == 'HAPUS') {
            $data = [
                "content2" => ""
            ];
            $item = \App\Models\TextBank::where('key', 'organizationChart')->update($data);
        }
    }
}