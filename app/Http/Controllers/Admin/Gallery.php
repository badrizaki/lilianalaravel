<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Gallery extends BaseController
{
    protected $mainPage = 'gallery'; // mainpage
    protected $page = 'gallery'; // mainpage
    protected $redirectTo = 'gallery'; // REDIRECT URL
    protected $redirectIndex = 'gallery.index'; // View
    protected $redirectEditable = 'gallery.editable'; // vied add and update
    protected $redirectShow = 'gallery.show'; // vied add and update

    /**
     * list ajax for datatables
     */
    protected function listAjax()
    {
        $item = new \App\Models\Gallery();
        $item = $item->select(['*']);

        return Datatables::of($item)
            ->addColumn('thumbUrl', function ($item) {
                $thumbUrl = '<img src="' . url('' . $item->thumbUrl) . '" width="100px" />';
                return $thumbUrl;
            })
            ->addColumn('action', function ($item) {
                $action = '';
                $action .= '<a href="' . route('gallery.index') . '/' . $item->galleryId . '/edit" class="btn btn-xs btn-primary"><i class="' . $this->icon['tables']['edit'] . '"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('gallery.index').'/'.$item->galleryId.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                $action .= '<a href="#" class="btn btn-xs btn-primary" onClick="listManager.delete(\'' . $item->galleryId . '\')"><i class="' . $this->icon['tables']['delete'] . '"></i> Delete</a>';
                return $action;
            })
            ->editColumn('id', 'ID: {{$galleryId}}')
            ->rawColumns(['action', 'content', 'contentInd', 'shortDescInd', 'thumbUrl']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\Gallery::find($id);
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
        $item = new \App\Models\Gallery();

        if ($id > 0)
            $item = $item->find($id);

        if ($request->order)
            $item->order = $request->order;
        else
            $item->order = 0;

        if ($request->Filedata) {
            $image = $request->Filedata;
            $imageName = time() . $image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = $this->Config::get('app.directory.images');
            $image->move($destinationPath, $imageName);
            $imageUrl = $destinationPath . "/" . $imageName;
            $item->imageUrl = $imageUrl;
        }

        if ($request->Filedata2) {
            $image = $request->Filedata2;
            $imageName = time() . $image->getClientOriginalName();
            // $imageName      = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = $this->Config::get('app.directory.images');
            $image->move($destinationPath, $imageName);
            $imageUrl = $destinationPath . "/" . $imageName;
            $item->thumbUrl = $imageUrl;
        }

        $item->titleInd = $request->titleInd;
        $item->galleryType = $request->galleryType;

        $item->userId = \Auth::user()->id;
        $item->save();
    }
}