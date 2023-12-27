<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Datatables;

class CorporateGovernanceFile extends BaseController
{
    protected $mainPage = 'corporategovernance'; // mainpage
    protected $redirectTo = 'corporategovernancefile'; // REDIRECT URL
    protected $redirectIndex = 'corporategovernancefile.index'; // View
    protected $redirectEditable = 'corporategovernancefile.editable'; // vied add and update
    protected $redirectShow = 'corporategovernancefile.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = $this->getList();
        return view($this->redirectIndexPath(), compact('list', 'mainPage'));
    }

    /**
    * Send data to view
    */
    protected function getList()
    {
        $list['slider'] = \App\Models\File::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return $list;
    }

    protected function find($id)
    {
        return \App\Models\File::find($id);
    }

    protected function validateData(Request $request, $id)
    {
    }

    public function save(Request $request, $id)
    {
        $validator = $this->validateData($request, $id);
        if ($validator != null && $validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $filename = $this->saveData($request, $id);
            Session::flash('message', 'Successfully saved the item!');
            if ($filename == 'edit')
                return redirect()->back();
            else
                return "";
        }
    }

    protected function saveData(Request $request, $id)
    {
        $item = new \App\Models\File();
        
        if($id > 0) $item = $item->find($id);

        if ($request->Filedata)
        {
            $image          = $request->Filedata;
            $imageName      = time() . '.' . $image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $item->imageUrl = $imageUrl;
            $item->sliderFilename = $imageName;
        }

        if ($request->order)
            $item->order = $request->order;

		$item->userId = $this->Auth::user()->id;
        $item->save();
        if ($request->Filedata) return $thumbUrl;
        else return "edit";
    }

    public function order(Request $request)
    {
        $sortId = $request->sort_id;
        $sliderIdArray = explode(',', $sortId);
        $order = 1;
        foreach ($sliderIdArray as $key => $sliderId)
        {
            if ($sliderId)
            {
                $item = new \App\Models\File();
                $item = $item->find($sliderId);
                $item->order = $order;
                $item->save();
                $order++;
            }
        }
    }
}