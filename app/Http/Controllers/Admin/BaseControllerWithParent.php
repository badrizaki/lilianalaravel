<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BaseControllerWithParent extends Controller
{
    use RESTfull;

    protected $mainPage = '';
    protected $parentId = 0;
    protected $id = 0;
    protected $item = null;
    protected $visitor;

    public function __construct()
    {
        // $this->middleware('auth');
        $this->Auth     = new \Auth();
        $this->Config   = new \Config();
        $this->icon     = $this->Config::get('icon');
        $this->text     = $this->Config::get('text');
        $this->visitor  = [];
    }

    public function index($parentId)
    {
        $list = $this->getList($parentId);
        return view($this->redirectIndexPath(), compact('list'));
    }

    public function listData($parentId)
    {
        return $this->listAjax($parentId);
    }

    public function create($parentId)
    {
        return $this->edit($parentId, 0);
    }

    public function edit($parentId, $id)
    {
        $mainPage       = $this->mainPage;
        $this->id       = $id;
        $this->parentId = $parentId;
        $item           = $this->find($parentId, $id);
        $this->item     = $item;
        $lookupTable    = $this->getLookUp();
        $list           = $this->getList($parentId);
        $data['parentId'] = $parentId;
        if ($id > 0)
        {
            if (isset($item) && is_array($item) && count($item) == 0)
            {
                return Redirect::to($this->redirectPath());
            }
        }
        return view($this->redirectEditablePath(), compact('item', 'id', 'lookupTable', 'list', 'mainPage', 'data'));
    }
    
    public function store($parentId, Request $request)
    {
        return $this->save($parentId, $request, 0);
    }

    public function update($parentId, Request $request, $id)
    {
        return $this->save($parentId, $request, $id);
    }

    public function show($parentId, $id)
    {
        $mainPage       = $this->mainPage;
        $this->id       = $id;
        $this->parentId = $parentId;
        $item           = $this->find($parentId, $id);
        $this->item     = $item;
        $lookupTable    = $this->getLookUp();
        $list           = $this->getList($parentId);
        if ($id > 0)
        {
            if (isset($item) && is_array($item) && count($item) == 0)
            {
                return Redirect::to($this->redirectPath());
            }
        }
        return view($this->redirectShowPath(), compact('item', 'id', 'lookupTable', 'list', 'mainPage'));
    }

    public function destroy($parentId, $id)
    {
        $this->id   = $id;
        $item       = $this->find($parentId, $id);
        $item->delete();

        // Session::flash('message', 'Successfully deleted the item!');
        $response = [
            'statusCode' => '200',
            'message' => 'Successfully deleted the item!'
        ];
        return response()->json($response); 
        // return Redirect::to($this->redirectPath());
    }

    protected function isActive($item, $table = '')
    {
        if ($table != '')
        {
            $item = $item->where($table.'.isActive', '=', '1');
        }
        else {
            $item = $item->where('isActive', '=', '1');
        }
        return $item;
    }

    protected function getList($parentId)
    {
        return null;
    }

    protected function listAjax()
    {
        return null;
    }

    protected function getLookUp()
    {
        return null;
    }
    
    protected function find($parentId, $id) {
        return null;
    }

    public function save($parentId, Request $request, $id)
    {
        $validator = $this->validateData($request, $id);
        if ($validator != null && $validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $this->saveData($parentId, $request, $id);
            Session::flash('message', 'Successfully saved the item!');
            return Redirect::to($this->redirectPath());
        }
    }

    protected function validateData(Request $request, $id)
    {
        return null;
    }

    protected function saveData($parentId, Request $request, $id) { }
}