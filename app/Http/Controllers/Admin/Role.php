<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class Role extends BaseController
{
    protected $page = 'role'; // mainpage
    protected $redirectTo = 'role'; // REDIRECT URL
    protected $redirectIndex = 'role.index'; // View user
    protected $redirectEditable = 'role.editable'; // vied add and update
    protected $redirectShow = 'role.show'; // vied add and update

    /**
    * list ajax for datatables
    */
    protected function listAjax()
    {
        $item = new \App\Models\Role(); 
        $item = $item->select(['id', 'name', 'display_name', 'description']);

        return Datatables::of($item)
            ->addColumn('action', function ($item)
            {
                $action = '';
                $action .= '<a href="'.route('role.index').'/'.$item->id.'/edit" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['edit'].'"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                // $action .= '<a href="'.route('role.index').'/'.$item->id.'" class="btn btn-xs btn-primary"><i class="'.$this->icon['tables']['detail'].'"></i> Detail</a>&nbsp;&nbsp;&nbsp;';
                if ($item->id != '4' && $item->id != '5' && $item->id != '15' && $item->id != '16')
                {
                    $action .= '<a href="#" class="btn btn-xs btn-danger" onClick="listManager.delete(\''.$item->id.'\')"><i class="'.$this->icon['tables']['delete'].'"></i> Delete</a>';
                }
                return $action;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $id = $this->id;
        $data = array();
        $data['permission'] = array();
        $data['current_permission'] = array();
        $permissions = new \App\Models\Permission();
        $permissions = $permissions->leftJoin('permission_role', function($leftJoin) use ($id)
            {
                $leftJoin->on('permissions.id', '=', 'permission_role.permission_id');
                $leftJoin->on(\DB::raw('permission_role.role_id'), \DB::raw('='), \DB::raw("'".$id."'"));
            });
        $permissions = $permissions->get();
        $permissions = $permissions->toArray();
        foreach ($permissions as $permission)
        {
            $data['permission'][$permission['category']][$permission['type']] = $permission;
            if ($permission['permission_role_id'])
                $data['permission'][$permission['category']][$permission['type']]['checked'] = ' checked="checked" ';
            else 
                $data['permission'][$permission['category']][$permission['type']]['checked'] = '';
        }

        return $data; // data
    }

    protected function find($id)
    {
        return \App\Models\Role::find($id);
    }

    protected function validateData(Request $request, $id)
    {
        return Validator::make($request->all(), [
            'name'          => 'required|string|max:30|unique:roles,name,'.$id.',id|without_spaces',
            'display_name'  => 'required|string',
            'description'   => 'nullable|string',
        ]);
    }

    protected function saveData(Request $request, $id)
    {
        $item = new \App\Models\Role();
        
        if($id > 0)
        {   
            $item = $item->find($id);
            \App\Models\PermissionRole::where('role_id', $id)->delete(); 
        }

		$item->name = $request->name;
		$item->display_name = $request->display_name;
		$item->description = $request->description;
        $item->save();

        if ($request->permission) $item->attachPermissions($request->permission);
    }

    public function destroy($id)
    {
        \App\Models\Role::whereId($id)->delete();
        $response = [
            'statusCode' => '200',
            'message' => 'Successfully deleted the item!'
        ];
        return response()->json($response); 
    }
}