<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Management extends BaseController
{
    protected $mainPage = 'profile'; // mainpage
    protected $redirectTo = 'management'; // REDIRECT URL
    protected $redirectIndex = 'management.index'; // View index
    protected $redirectEditable = 'management.editable'; // vied add and update
    protected $redirectShow = 'management.show'; // vied add and update

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
        $list['management'] = \App\Models\TextBank::where('key', 'management')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\Management(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('age', function ($item)
            {
                return getAge($item->dob);
            })
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('management.index').'/'.$item->managementId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('management.index').'/'.$item->managementId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->managementId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$managementId}}')
            ->rawColumns(['action', 'shortDescription']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        $data['experience'] = \App\Models\ManagementExperience::where('managementId', $this->id)->orderBy('managementexperience.order', 'asc')->get();
        return $data;
    }

    protected function find($id)
    {
        return \App\Models\Management::find($id);
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
        $item = new \App\Models\Management();

        if($id > 0) {
            $item = $item->find($id);
            \App\Models\ManagementExperience::where('managementId', $id)->delete();
        }

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

        $item->type = $request->type;
		$item->name = $request->name;
        $item->shortDescription = $request->shortDescription;
        $item->shortDescriptionInd = $request->shortDescriptionInd;
        $item->nationality = $request->nationality;
        $item->dob = $request->dob;
        $item->lastEducation = $request->lastEducation;
        $item->lastEducationInd = $request->lastEducationInd;
        $item->appointmentHistory = $request->appointmentHistory;
        $item->appointmentHistoryInd = $request->appointmentHistoryInd;
        $item->currentPosition = $request->currentPosition;
        $item->currentPositionInd = $request->currentPositionInd;
        $item->affiliate = $request->affiliate;
        $item->affiliateInd = $request->affiliateInd;
		$item->mpiShare = $request->mpiShare;
		$item->userId = $this->Auth::user()->id;
        $item->save();
        $id = $item->managementId;

        $data = [];
        if ($request->from)
        {
            foreach ($request->from as $key => $from)
            {
                $data[] = [
                    "managementId" => $id,
                    "from" => $from,
                    "to" => isset($request->to[$key]) ? $request->to[$key] :'',
                    "experienceDescription" => isset($request->experienceDescription[$key]) ? $request->experienceDescription[$key] :'',
                    "experienceDescriptionInd" => isset($request->experienceDescriptionInd[$key]) ? $request->experienceDescriptionInd[$key] :'',
                    "order" => isset($request->orderExperience[$key]) ? $request->orderExperience[$key] :'',
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")
                ];
            }
            \App\Models\ManagementExperience::insert($data);
        }
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

        $item = \App\Models\TextBank::where('key', 'management')->update($data);
        return Redirect::to("admin/management");
    }
}