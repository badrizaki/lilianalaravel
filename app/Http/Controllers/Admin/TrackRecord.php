<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class TrackRecord extends BaseController
{
    protected $mainPage = 'about'; // mainpage
    protected $page = 'trackrecord'; // mainpage
    protected $redirectTo = 'trackrecord'; // REDIRECT URL
    protected $redirectIndex = 'trackrecord.index'; // View
    protected $redirectEditable = 'trackrecord.editable'; // vied add and update
    protected $redirectShow = 'trackrecord.show'; // vied add and update

    /**
     * list ajax for datatables
     */
    protected function listAjax()
    {
        $item = new \App\Models\TrackRecord();
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('action', function ($item) {
                $action = '';
                $action .= '<a href="' . route('trackrecord.index') . '/' . $item->trackrecordId . '/edit" class="btn btn-xs btn-primary"><i class="' . $this->icon['tables']['edit'] . '"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('trackrecord.index').'/'.$item->trackrecordId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\'' . $item->trackrecordId . '\')"><i class="' . $this->icon['tables']['delete'] . '"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$trackrecordId}}')
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
        return \App\Models\TrackRecord::find($id);
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
        $item = new \App\Models\TrackRecord();

        if ($id > 0)
            $item = $item->find($id);

        if ($request->order)
            $item->order = $request->order;
        else
            $item->order = 0;

        $item->contentInd = $request->contentInd;
        $item->date = $request->date;

        $item->userId = \Auth::user()->id;
        $item->save();
    }
}