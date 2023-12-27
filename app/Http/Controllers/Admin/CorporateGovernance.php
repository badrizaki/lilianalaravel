<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CorporateGovernance extends BaseController
{
    protected $mainPage = 'corporategovernance'; // mainpage
    protected $redirectTo = 'corporategovernance'; // REDIRECT URL
    protected $redirectIndex = 'corporategovernance.index'; // View
    protected $redirectEditable = 'corporategovernance.editable'; // vied add and update
    protected $redirectShow = 'corporategovernance.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['corporategovernance'] = \App\Models\TextBank::where('key', 'gcc')->get()->first();
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

        $item = \App\Models\TextBank::where('key', 'gcc')->update($data);
    }
}