<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class StockHistory extends BaseController
{
    protected $mainPage = 'investorrelations'; // mainpage
    protected $redirectTo = 'stockhistory'; // REDIRECT URL
    protected $redirectIndex = 'stockhistory.index'; // View index
    protected $redirectEditable = 'stockhistory.editable'; // vied add and update
    protected $redirectShow = 'stockhistory.show'; // vied add and update

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
        // $list['stockhistory'] = \App\Models\TextBank::where('key', 'fullReports')->get()->first();
        return $list;
    }

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\StockHistory(); 
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('totalStock', function ($item)
            {
                return formatNumber($item->totalStock);
            })
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('stockhistory.index').'/'.$item->stockhistoryId.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('stockhistory.index').'/'.$item->stockhistoryId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\''.$item->stockhistoryId.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$stockhistoryId}}')
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
        return \App\Models\StockHistory::find($id);
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
        $item = new \App\Models\StockHistory();
        
        if($id > 0) $item = $item->find($id);

        if ($request->order)
            $item->order = $request->order;

        $item->corporateAction = $request->corporateAction;
        $item->corporateActionInd = $request->corporateActionInd;
        $item->date = $request->date;
        $item->totalStock = rupiahToNumber($request->totalStock);
        if ($request->isTotal)
        {
            $item->isTotal = 1;
        } else {
            $item->isTotal = 0;
        }
        $item->userId = $this->Auth::user()->id;
        $item->save();
    }
}