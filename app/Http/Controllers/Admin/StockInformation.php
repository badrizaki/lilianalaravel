<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StockInformation extends BaseController
{
    protected $mainPage = 'investorrelations'; // mainpage
    protected $redirectTo = 'stockinformation'; // REDIRECT URL
    protected $redirectIndex = 'stockinformation.index'; // View
    protected $redirectEditable = 'stockinformation.editable'; // vied add and update
    protected $redirectShow = 'stockinformation.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['stockinformation'] = \App\Models\TextBank::where('key', 'stockInformation')->get()->first();
        return view($this->redirectIndexPath(), compact('list', 'mainPage', 'item'));
    }

    protected function saveData(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'titleInd' => $request->titleInd,
            'content' => $request->content,
            'contentInd' => $request->contentInd,
            'content2' => $request->content2,
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
        } elseif ($request->deleteFiledata == 'HAPUS') {
            $data = $data + [
                "imageUrl" => ""
            ];
        }

        $item = \App\Models\TextBank::where('key', 'stockInformation')->update($data);
    }
}