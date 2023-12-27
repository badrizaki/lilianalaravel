<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class AccountOpening extends BaseController
{
    protected $mainPage = 'home'; // mainpage
    protected $redirectTo = 'accountopening'; // REDIRECT URL
    protected $redirectIndex = 'accountopening.index'; // View index
    protected $redirectEditable = 'accountopening.editable'; // vied add and update
    protected $redirectShow = 'accountopening.show'; // vied add and update

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
        // $list['accountopening'] = \App\Models\TextBank::where('key', 'fullReports')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\AccountOpening(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('accountopening.index').'/'.$item->accountopeningId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('accountopening.index').'/'.$item->accountopeningId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->accountopeningId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$accountopeningId}}')
            ->rawColumns(['action', 'content', 'contentInd']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\AccountOpening::find($id);
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
        $item = new \App\Models\AccountOpening();
        
        if($id > 0) $item = $item->find($id);

        if ($request->file1)
        {
            $file1          = $request->file1;
            $filename       = time().$file1->getClientOriginalName();
            // $filename      = md5($file1->getClientOriginalName().time()).'.'.$file1->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.pdf');
            $result         = $file1->move($destinationPath, $filename);
            $fileurl        = $destinationPath."/".$filename;
            $item->pdfUrl   = $fileurl;
        } elseif ($request->deletefile1 == 'HAPUS') {
            $item->pdfUrl = "";
        }

        if ($request->order)
            $item->order = $request->order;

        $buttonUrl = str_replace('https://', '', $request->buttonUrl);
        $buttonUrl = str_replace('http://', '', $buttonUrl);
        $item->titleHome = $request->titleHome;
		$item->titleHomeInd = $request->titleHomeInd;
        $item->contentHome = $request->contentHome;
        $item->contentHomeInd = $request->contentHomeInd;
        $item->title = $request->title;
		$item->titleInd = $request->titleInd;
        $item->content = $request->content;
        $item->contentInd = $request->contentInd;
        $item->pdfText = $request->pdfText;
        $item->pdfTextInd = $request->pdfTextInd;
        $item->buttonUrl = $buttonUrl;
		$item->userId = $this->Auth::user()->id;
        $item->save();
    }
}