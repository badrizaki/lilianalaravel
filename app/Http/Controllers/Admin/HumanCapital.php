<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class HumanCapital extends BaseController
{
    protected $mainPage = 'profile'; // mainpage
    protected $redirectTo = 'humancapital'; // REDIRECT URL
    protected $redirectIndex = 'humancapital.index'; // View index
    protected $redirectEditable = 'humancapital.editable'; // vied add and update
    protected $redirectShow = 'humancapital.show'; // vied add and update

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
        $list['humancapital'] = \App\Models\TextBank::where('key', 'humancapital')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\Applicant(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('age', function ($item)
            {
                return getAge($item->dob);
            })
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('humancapital.index').'/'.$item->applicantId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('humancapital.index').'/'.$item->applicantId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->applicantId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$applicantId}}')
            ->rawColumns(['action', 'description']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data;
    }

    protected function find($id)
    {
        return \App\Models\Applicant::find($id);
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
        $item = new \App\Models\Applicant();

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

        if ($request->order)
            $item->order = $request->order;

        $item->year = $request->year;
		$item->description = $request->description;
        $item->descriptionInd = $request->descriptionInd;
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
            'title2' => $request->title2,
            'title2Ind' => $request->title2Ind,
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

        $item = \App\Models\TextBank::where('key', 'humancapital')->update($data);
        return Redirect::to("admin/humancapital");
    }
}