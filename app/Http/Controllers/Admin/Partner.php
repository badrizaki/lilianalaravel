<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Partner extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'partner'; // REDIRECT URL
    protected $redirectIndex = 'partner.index'; // View index
    protected $redirectEditable = 'partner.editable'; // vied add and update
    protected $redirectShow = 'partner.show'; // vied add and update

    public function index()
    {
        $mainPage = $this->mainPage;
        $list = [];
        $list = $this->getList();
        return view($this->redirectIndexPath(), compact('list', 'mainPage'));
    }

    /**
    * Send data to view
    */
    protected function getList()
    {
        $list = [];
        $list['partner'] = \App\Models\TextBank::where('key', 'partner')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\Partner(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('imageUrl', function ($item)
            {
            	$imageUrl = '<img src="' . url(''.$item->imageUrl) . '">';
            	return $imageUrl;
            })
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('partner.index').'/'.$item->partnerId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->partnerId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$partnerId}}')
            ->rawColumns(['action', 'imageUrl']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\Partner::find($id);
    }

    protected function validateData(Request $request, $id)
    {
        /*if($id > 0) return null;*/
        /*return Validator::make($request->all(), [
            'image'         => 'required|mimetypes:image/jpeg,image/jpg',
            'sample1'       => 'required_without_all:sample2|numeric',
            'sample2'       => 'required_without_all:sample1|numeric',
            'string'        => 'required|string',
            'numeric'       => 'required|numeric|max:100',
            'nullable'      => 'nullable|numeric',
            'uniqueField'   => 'nullable|max:20|unique:nametables',
            'email'         => 'required|string|email|max:50|unique:users,email,dataValue',// unique with value $datavalue
            'password'      => 'required|string|min:6|confirmed', // with field name password_confirm
        ],
        [
            // custome message
            'numeric.required'   => 'Please fill numeric',
            'uniqueField.unique' => 'Must unique',
        ]);*/
    }

    protected function saveData(Request $request, $id)
    {
        $item = new \App\Models\Partner();
        
        if($id > 0) $item = $item->find($id);

        if ($request->Filedata)
        {
            $image          = $request->Filedata;
            $imageName      = time().$image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $item->imageUrl = $imageUrl;
        } elseif ($request->deleteFiledata == 'HAPUS') {
            $item->imageUrl = "";
        }

        if ($request->order)
            $item->order = $request->order;

        $item->url = $request->url;
        $item->name = $request->name;
        $item->userId = $this->Auth::user()->id;
        $item->save();
    }
}