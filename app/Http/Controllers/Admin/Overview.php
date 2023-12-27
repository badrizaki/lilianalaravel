<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Overview extends BaseController
{
    protected $mainPage = 'profile'; // mainpage
    protected $redirectTo = 'overview'; // REDIRECT URL
    protected $redirectIndex = 'overview.index'; // View
    protected $redirectEditable = 'overview.editable'; // vied add and update
    protected $redirectShow = 'overview.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['overview'] = \App\Models\TextBank::where('key', 'overview')->get()->first();
        $item['vision'] = \App\Models\TextBank::where('key', 'vision')->get()->first();
        $item['mission'] = \App\Models\TextBank::where('key', 'mission')->get()->first();
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

        $item = \App\Models\TextBank::where('key', 'overview')->update($data);

        $item = \App\Models\TextBank::where('key', 'vision')->update([
            'content' => $request->contentVision,
            'contentInd' => $request->contentVisionInd,
        ]);
        
        $item = \App\Models\TextBank::where('key', 'mission')->update([
            'content' => $request->contentMission,
            'contentInd' => $request->contentMissionInd,
        ]);
    }
}