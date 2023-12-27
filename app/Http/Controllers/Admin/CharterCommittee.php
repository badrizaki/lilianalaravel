<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class CharterCommittee extends BaseController
{
    protected $mainPage = 'corporategovernance'; // mainpage
    protected $redirectTo = 'ccc'; // REDIRECT URL
    protected $redirectIndex = 'ccc.index'; // View index
    protected $redirectEditable = 'ccc.editable'; // vied add and update
    protected $redirectShow = 'ccc.show'; // vied add and update

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
        $list['ccc'] = \App\Models\TextBank::where('key', 'ccc')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\CorporateCharter(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('ccc.index').'/'.$item->corporatecharterId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('ccc.index').'/'.$item->corporatecharterId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->corporatecharterId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$corporatecharterId}}')
            ->rawColumns(['action', 'description', 'descriptionInd']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        $data['file'] = \App\Models\File::where('id', $this->id)->where('type', 'corporatecharter')->orderBy('order', 'asc')->get();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\CorporateCharter::find($id);
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
        $item = new \App\Models\CorporateCharter();
        
        if($id > 0) {
            $item = $item->find($id);
            \App\Models\File::where('type', 'corporatecharter')->where('id', $id)->delete();
        }

        if ($request->order)
            $item->order = $request->order;

        $item->title = $request->title;
		$item->titleInd = $request->titleInd;
        $item->description = $request->description;
		$item->descriptionInd = $request->descriptionInd;
		$item->userId = $this->Auth::user()->id;
        $item->save();
        $id = $item->corporatecharterId;

        $data = [];
        if ($request->orderFile)
        {
            foreach ($request->orderFile as $key => $orderFile)
            {
                $file[$key] = isset($request->FilePDFOld[$key]) ? $request->FilePDFOld[$key] :'';
                $filename[$key] = isset($request->FileNamePDFOld[$key]) ? $request->FileNamePDFOld[$key] :'';
                if (isset($request->FilePDF[$key]) && $request->FilePDF[$key])
                {
                    $file2          = $request->FilePDF[$key];
                    $filename2      = time().$file2->getClientOriginalName();
                    // $filename2      = md5($file2->getClientOriginalName().time()).'.'.$file2->getClientOriginalExtension();
                    $destinationPath= $this->Config::get('app.directory.pdf');
                    $result         = $file2->move($destinationPath, $filename2);
                    $file[$key]     = $destinationPath."/".$filename2;
                    $filename[$key] = $filename2;
                }

                $imageUrl[$key] = isset($request->FiledataOld[$key]) ? $request->FiledataOld[$key] :'';
                if (isset($request->Filedata[$key]) && $request->Filedata[$key])
                {
                    $image          = $request->Filedata[$key];
                    $imageName      = time().$image->getClientOriginalName();
                    // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
                    $destinationPath= $this->Config::get('app.directory.images');
                    $result         = $image->move($destinationPath, $imageName);
                    $imageUrl[$key] = $destinationPath."/".$imageName;
                }

                $data[] = [
                    "type" => "corporatecharter",
                    "id" => $id,
                    "filetype" => "PDF",
                    "filename" =>  $filename[$key],
                    "fileUrl" =>  $file[$key],
                    "imageUrl" =>  $imageUrl[$key],
                    // "experienceDescription" => isset($request->experienceDescription[$key]) ? $request->experienceDescription[$key] :'',
                    // "experienceDescriptionInd" => isset($request->experienceDescriptionInd[$key]) ? $request->experienceDescriptionInd[$key] :'',
                    "order" => $orderFile,
                    "userId" => $this->Auth::user()->id,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")
                ];
            }
            \App\Models\File::insert($data);
        }
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

        $item = \App\Models\TextBank::where('key', 'ccc')->update($data);
        return Redirect::to("admin/ccc");
    }
}