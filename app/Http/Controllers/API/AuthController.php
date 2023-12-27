<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
	    $user = User::where('email', $request->email)->first();
	    if ($user)
	    {
	        if (password_verify($request->password, $user->password))
            {
	            $token = $user->createToken(\Config::get('app.accessTokenKey'))->accessToken;
                $data = [
                    'id' => $user->id,
                    'nik' => $user->nik,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'locationId' => $user->locationId,
                    'isActive' => $user->isActive,
                    'imageUrl' => $user->imageUrl,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'token' => $token,
                ];
                return \APIHelper::setResponse([
                    "statusCode" => 200,
                    "message" => trans('response.login-success'),
                    "data" => $data
                ]);
	        } else {
                return \APIHelper::setResponse([
                    "statusCode" => 403,
                    "message" => trans('response.login-fail')
                ]);
	        }
	    } else {
            return \APIHelper::setResponse([
                "statusCode" => 403,
                "message" => trans('response.login-fail')
            ]);
	    }
	}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken(\Config::get('app.accessTokenKey'))->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], 200);
    }

    public function logout(Request $request)
    {
	    $token = $request->user()->token();
	    $token->revoke();

        return \APIHelper::setResponse(["message" => trans('response.logout-success')]);
    }
    
    public function details()
    {
        $user = \Auth::user();
        return \APIHelper::setResponse(["data" => $user]);
    }
}