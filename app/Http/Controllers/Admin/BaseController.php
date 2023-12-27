<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    use RESTfull;

    protected $mainPage = '';
    protected $page = '';
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
        // $this->setVisitorInfo();
    }

    protected function setVisitorInfo()
    {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $record = geoip()->getLocation($ip);

        $this->visitor['ipAddress']     = $record->ip;
        $this->visitor['latitude']      = $record->lat;
        $this->visitor['longitude']     = $record->lon;
        $this->visitor['country']       = $record->country;
        $this->visitor['city']          = $record->city;
        $this->visitor['timezone']      = $record->timezone;
    }

    public function index()
    {
        $list = $this->getList();
        return $this->view($this->redirectIndexPath(), compact('list'));
    }

    public function listData()
    {
        return $this->listAjax();
    }

    public function create()
    {
        return $this->edit(0);
    }

    public function edit($id)
    {
        $mainPage       = $this->mainPage;
        $this->id       = $id;
        $item           = $this->find($id);
        $this->item     = $item;
        $lookupTable    = $this->getLookUp();
        $list           = $this->getList();
        if ($id > 0)
        {
            if (isset($item) && is_array($item) && count($item) == 0)
            {
                return Redirect::to($this->redirectPath());
            }
        }
        return $this->view($this->redirectEditablePath(), compact('item', 'id', 'lookupTable', 'list'));
    }
    
    public function store(Request $request)
    {
        return $this->save($request, 0);
    }

    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function show($id)
    {
        $mainPage       = $this->mainPage;
        $this->id       = $id;
        $item           = $this->find($id);
        $this->item     = $item;
        $lookupTable    = $this->getLookUp();
        $list           = $this->getList();
        if ($id > 0)
        {
            if (isset($item) && is_array($item) && count($item) == 0)
            {
                return Redirect::to($this->redirectPath());
            }
        }
        return view($this->redirectShowPath(), compact('item', 'id', 'lookupTable', 'list', 'mainPage'));
    }

    public function destroy($id)
    {
        $this->id   = $id;
        $item       = $this->find($id);
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

    /**
    * Send data to view
    */
    protected function getList()
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
    
    protected function find($id) {
        return null;
    }

    public function save(Request $request, $id)
    {
        $validator = $this->validateData($request, $id);
        if ($validator != null && $validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $this->saveData($request, $id);
            Session::flash('message', 'Successfully saved the item!');
            return Redirect::to($this->redirectPath());
        }
    }

    protected function validateData(Request $request, $id)
    {
        return null;
    }

    protected function saveData(Request $request, $id) { }

    public function view($viewFile, $compact)
    {
        if ($compact != "") {
            return view($viewFile, $compact)->with('page', $this->page)->with('mainPage', $this->mainPage);
        } else {
            return view($viewFile)->with('page', $this->page)->with('mainPage', $this->mainPage);
        }
    }
}