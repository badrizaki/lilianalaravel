<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class User extends BaseController
{
    protected $page = 'user'; // mainpage
    protected $redirectTo = 'user'; // REDIRECT URL
    protected $redirectIndex = 'user.index'; // View user
    protected $redirectEditable = 'user.editable'; // vied add and update
    protected $redirectShow = 'user.show'; // vied add and update

    /**
     * list ajax for datatables
     */
    protected function listAjax()
    {
        $item = new \App\Models\User();
        $item = $item->leftJoin('role_user', 'role_user.user_id', '=', 'users.id');
        $item = $item->leftJoin('roles', 'roles.id', '=', 'role_user.role_id');
        $item = $item->select(['users.id', 'users.name', 'users.email', 'roles.display_name']);
        $item = $this->isActive($item, 'users');

        return Datatables::of($item)
            ->addColumn('action', function ($item) {
                $action = '';
                if ($item->id != '1') {
                    $action .= '<a href="' . route('user.index') . '/' . $item->id . '/edit" class="btn btn-xs btn-primary"><i class="' . $this->icon['tables']['edit'] . '"></i> Edit</a>&nbsp;&nbsp;&nbsp;';
                    $action .= '<a href="#" class="btn btn-xs btn-danger" onClick="listManager.delete(\'' . $item->id . '\')"><i class="' . $this->icon['tables']['delete'] . '"></i> Delete</a>';
                }
                return $action;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['role', 'action']) // raw show html
            ->make(true);
    }

    protected function getLookUp()
    {
        $data = array();
        $data['current_role'] = array();
        $data['role_id'] = '';

        $data['roles'] = \App\Models\Role::get();
        $current_role = \App\Models\Role::join('role_user', 'id', 'role_id')->where('role_user.user_id', $this->id)->select('id', 'name', 'display_name')->get()->last();
        if ($current_role) {
            $data['current_role'] = $current_role->toArray();
            $data['role_id'] = $data['current_role']['id'];
        }

        return $data;
    }

    protected function find($id)
    {
        return \App\Models\User::find($id);
    }

    protected function validateData(Request $request, $id)
    {
        /*if($id > 0) return null;*/
        $password_validation = [];
        $validation = [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'role_id' => 'required|string'
        ];

        // if($id === 0)
        if ($request->password != '')
            $password_validation = ['password' => 'required|string|min:6|confirmed'];

        $validation += $password_validation;
        return Validator::make($request->all(), $validation);
    }

    protected function saveData(Request $request, $id)
    {
        $item = new \App\Models\User();
        if ($id > 0) {
            \App\Models\RoleUser::where('user_id', $id)->delete();
            $item = $item->find($id);
            if ($request->password)
                $item->password = bcrypt($request->password);
        } else {
            $item->password = bcrypt($request->password);
        }

        $item->name = $request->name;
        $item->username = $request->username;
        $item->email = $request->email;
        $item->save();

        $item->attachRole($request->role_id);
    }

    public function changePassword()
    {
        $mainPage = 'home';
        return $this->view('admin.user.changepassword', compact('list', 'mainPage'));
    }

    public function changePasswordStore(Request $request)
    {
        if ($request->password) {
            $id = $this->Auth::user()->id;
            $item = new \App\Models\User();
            $item = $item->find($id);

            $validator = Validator($request->all(), [
                'password' => 'required|string|min:4|confirmed',
            ], [
                'password.required' => 'Old Password cannot empty',
                'password.confirmed' => 'Password confirmation doesn\'t match',
            ]);
            $validator->after(function ($validator) use ($request) {
                $check = auth()->validate([
                    'username' => $this->Auth::user()->username,
                    'password' => $request->current_password
                ]);

                if (!$check)
                    $validator->errors()->add('current_password', 'Old Password doesn\'t match');
            });
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            if ($request->password)
                $item->password = bcrypt($request->password);

            $item->save();
            return redirect()->back();
        } else
            return redirect()->back();
    }

    public function addUser()
    {
        $result = getFile('batch/USER/user.txt', false);
        $dataArray = explode("\n", $result['content']);
        foreach ($dataArray as $key => $data) {
            // INSERT
            /*list($nik, $name, $role_id) = explode("\t", $data);

            $user = new \App\Models\User();
            $user->nik = $nik;
            $user->name = $name;
            $user->save();
            $userId = $user->id;

            $roleUser = new \App\Models\RoleUser();
            $roleUser->user_id = $userId;
            $roleUser->role_id = $role_id;
            $roleUser->save();*/

            list($nik, $name, $email, $role_id) = explode("\t", $data);

            $user = \App\Models\User::where('nik', $nik)
                ->update([
                    'name' => $name,
                    'email' => $email
                ]);

            /*$user = new \App\Models\User();
            $user->nik = $nik;
            $user->name = $name;
            $user->save();*/
            // $userId = $user->id;

            /*$roleUser = new \App\Models\RoleUser();
            $roleUser->user_id = $userId;
            $roleUser->role_id = $role_id;
            $roleUser->save();*/

        }

        $role = \App\Models\RoleUser::where('role_id', 17)
            ->update([
                'role_id' => 16
            ]);
    }

    public function destroy($id)
    {
        $user = \App\Models\User::where('id', $id)
            ->update(['isActive' => '0']);

        // Session::flash('message', 'Successfully deleted the item!');
        $response = [
            'statusCode' => '200',
            'message' => 'Successfully deleted the item!'
        ];
        return response()->json($response);
        // return Redirect::to($this->redirectPath());
    }

}