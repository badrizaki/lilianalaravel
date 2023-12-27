<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class SupportingInstitutions extends BaseController
{
    protected $mainPage = 'investorrelations'; // mainpage
    protected $redirectTo = 'supportinginstitutions'; // REDIRECT URL
    protected $redirectIndex = 'supportinginstitutions.index'; // View index
    protected $redirectEditable = 'supportinginstitutions.editable'; // vied add and update
    protected $redirectShow = 'supportinginstitutions.show'; // vied add and update

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
        $list['supportingInstitutions'] = \App\Models\TextBank::where('key', 'supportinginstitutions')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\SupportingInstitutions();
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('supportinginstitutions.index').'/'.$item->supportinginstitutionsId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('supportinginstitutions.index').'/'.$item->supportinginstitutionsId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->supportinginstitutionsId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$supportinginstitutionsId}}')
            ->rawColumns(['action', 'address']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\SupportingInstitutions::find($id);
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
        $item = new \App\Models\SupportingInstitutions();
        
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
        }

        if ($request->file1)
        {
            $file1          = $request->file1;
            $filename       = time().$file1->getClientOriginalName();
            // $filename      = md5($file1->getClientOriginalName().time()).'.'.$file1->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.pdf');
            $result         = $file1->move($destinationPath, $filename);
            $fileurl        = $destinationPath."/".$filename;
            $item->pdfUrl   = $fileurl;
        }

        if ($request->file2)
        {
            $file2          = $request->file2;
            $filename       = time().$file2->getClientOriginalName();
            // $filename      = md5($file2->getClientOriginalName().time()).'.'.$file2->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.pdf');
            $result         = $file2->move($destinationPath, $filename);
            $fileurl        = $destinationPath."/".$filename;
            $item->pdfUrlInd   = $fileurl;
        }

        if ($request->order)
            $item->order = $request->order;

        $item->title = $request->title;
		$item->titleInd = $request->titleInd;
        $item->location = $request->location;
        $item->address = $request->address;
		$item->phone = $request->phone;
		$item->email = $request->email;
		$item->userId = $this->Auth::user()->id;
        $item->save();
    }

    public function storeMain(Request $request)
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
            $data = $data + [ "imageUrl" => $imageUrl ];
        }

        $item = \App\Models\TextBank::where('key', 'supportinginstitutions')->update($data);
        return Redirect::to("admin/supportinginstitutions");
    }
}