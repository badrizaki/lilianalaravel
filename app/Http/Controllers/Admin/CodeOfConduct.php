<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class CodeOfConduct extends BaseController
{
    protected $mainPage = 'corporategovernance'; // mainpage
    protected $redirectTo = 'coc'; // REDIRECT URL
    protected $redirectIndex = 'coc.index'; // View index
    protected $redirectEditable = 'coc.editable'; // vied add and update
    protected $redirectShow = 'coc.show'; // vied add and update

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
        $list['coc'] = \App\Models\TextBank::where('key', 'coc')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\CodeOfConduct(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('coc.index').'/'.$item->codeofconductId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('coc.index').'/'.$item->codeofconductId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->codeofconductId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$codeofconductId}}')
            ->rawColumns(['action', 'description', 'descriptionInd']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\CodeOfConduct::find($id);
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
        $item = new \App\Models\CodeOfConduct();
        
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

        $item->title = $request->title;
		$item->titleInd = $request->titleInd;
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
        ];

        if ($request->file1)
        {
            $file1          = $request->file1;
            $filename      = time().$file1->getClientOriginalName();
            // $filename      = md5($file1->getClientOriginalName().time()).'.'.$file1->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.pdf');
            $result         = $file1->move($destinationPath, $filename);
            $fileurl       = $destinationPath."/".$filename;
            $data = $data + [ "content2" => $fileurl ];
        } elseif ($request->deletefile1 == 'HAPUS') {
            $data = $data + [ "content2" => "" ];
        }

        if ($request->file2)
        {
            $file2          = $request->file2;
            $filename2      = time().$file2->getClientOriginalName();
            // $filename2      = md5($file2->getClientOriginalName().time()).'.'.$file2->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.pdf');
            $result         = $file2->move($destinationPath, $filename2);
            $fileurl2       = $destinationPath."/".$filename2;
            $data = $data + [ "content2Ind" => $fileurl2 ];
        } elseif ($request->deletefile2 == 'HAPUS') {
            $data = $data + [ "content2Ind" => "" ];
        }

        if ($request->Filedata)
        {
            $image          = $request->Filedata;
            $imageName      = time().$image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath= $this->Config::get('app.directory.images');
            $result         = $image->move($destinationPath, $imageName);
            $imageUrl       = $destinationPath."/".$imageName;
            $data = $data + [ "imageUrl" => $imageUrl ];
        } elseif ($request->deleteFiledata == 'HAPUS') {
            $data = $data + [ "imageUrl" => "" ];
        }

        $item = \App\Models\TextBank::where('key', 'coc')->update($data);
        return Redirect::to("admin/coc");
    }
}