<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Datatables;

class HomeBanner extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'homebanner'; // REDIRECT URL
    protected $redirectIndex = 'homebanner.index'; // View slider
    protected $redirectEditable = 'homebanner.editable'; // vied add and update
    protected $redirectShow = 'homebanner.show'; // vied add and update

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
        $list['slider'] = \App\Models\Slider::where('sliderType', 'main')->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return $list;
        // return \App\Models\Slider::all(); 
    }

    protected function find($id)
    {
        return \App\Models\Slider::find($id);
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
        $item = new \App\Models\Slider();
        
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
            if ($image->getClientOriginalExtension() != 'mp4')
            {
                $thumbUrl = image_thumb($imageUrl, 320, 150, true, 'filename');
                $item->thumbUrl = $thumbUrl;
                $item->sliderFileType = "image";
            } else {
                $item->sliderFileType = "video";
            }
        }

        $item->sliderTitle = $request->sliderTitle;
        $item->sliderText = $request->sliderText;
		$item->url = $request->url;
        $item->sliderType = "main";

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
                $item = new \App\Models\Slider();
                $item = $item->find($sliderId);
                $item->order = $order;
                $item->save();
                $order++;
            }
        }
    }
}