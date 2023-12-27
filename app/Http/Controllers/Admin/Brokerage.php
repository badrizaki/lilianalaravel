<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Brokerage extends BaseController
{
    protected $mainPage = 'financialservices'; // mainpage
    protected $redirectTo = 'brokerage'; // REDIRECT URL
    protected $redirectIndex = 'brokerage.index'; // View
    protected $redirectEditable = 'brokerage.editable'; // vied add and update
    protected $redirectShow = 'brokerage.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $item['brokerage'] = \App\Models\TextBank::where('key', 'brokerage')->get()->first();
        $item['equity'] = \App\Models\TextBank::where('key', 'equity')->get()->first();
        $item['fixedIncome'] = \App\Models\TextBank::where('key', 'fixedIncome')->get()->first();
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

        $item = \App\Models\TextBank::where('key', 'brokerage')->update($data);

        $item = \App\Models\TextBank::where('key', 'equity')->update([
            'title' => $request->titleEquity,
            'titleInd' => $request->titleEquityInd,
            'content' => $request->contentEquity,
            'contentInd' => $request->contentEquityInd,
        ]);
        
        $item = \App\Models\TextBank::where('key', 'fixedIncome')->update([
            'title' => $request->titleFixedIncome,
            'titleInd' => $request->titleFixedIncomeInd,
            'content' => $request->contentFixedIncome,
            'contentInd' => $request->contentFixedIncomeInd,
        ]);
    }
}