<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Underwriting extends BaseController
{
    protected $mainPage = 'financialservices'; // mainpage
    protected $redirectTo = 'underwriting'; // REDIRECT URL
    protected $redirectIndex = 'underwriting.index'; // View
    protected $redirectEditable = 'underwriting.editable'; // vied add and update
    protected $redirectShow = 'underwriting.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['underwriting'] = \App\Models\TextBank::where('key', 'underwriting')->get()->first();
        $item['ipo'] = \App\Models\TextBank::where('key', 'ipo')->get()->first();
        $item['rightIssue'] = \App\Models\TextBank::where('key', 'rightIssue')->get()->first();
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
            'content2Ind' => $request->content2Ind,
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

        $item = \App\Models\TextBank::where('key', 'underwriting')->update($data);

        $item = \App\Models\TextBank::where('key', 'ipo')->update([
            'title' => $request->titleIpo,
            'titleInd' => $request->titleIpoInd,
            'content' => $request->contentIpo,
            'contentInd' => $request->contentIpoInd,
        ]);
        
        $item = \App\Models\TextBank::where('key', 'rightIssue')->update([
            'title' => $request->titleRightIssue,
            'titleInd' => $request->titleRightIssueInd,
            'content' => $request->contentRightIssue,
            'contentInd' => $request->contentRightIssueInd,
        ]);
    }
}