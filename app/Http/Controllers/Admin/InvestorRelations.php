<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class InvestorRelations extends BaseController
{
    protected $mainPage = 'investorrelations'; // mainpage
    protected $redirectTo = 'investorrelations'; // REDIRECT URL
    protected $redirectIndex = 'investorrelations.index'; // View
    protected $redirectEditable = 'investorrelations.editable'; // vied add and update
    protected $redirectShow = 'investorrelations.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['investorrelations'] = \App\Models\TextBank::where('key', 'investorRelations')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'titleInd' => $request->titleInd,
            'content' => $request->content,
            'contentInd' => $request->contentInd,
        ];
        if ($request->Filedata)
        {
            $image          = $request->Filedata;
            $imageName      = time().$image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $data = $data + [
                "imageUrl" => $imageUrl
            ];
        }

        $item = \App\Models\TextBank::where('key', 'investorRelations')->update($data);
    }
}