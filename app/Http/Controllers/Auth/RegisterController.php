<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Mail\Register;
use Mail;
use Config;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:50',
            'company'       => 'required|string',
            'typeOfCompany' => 'required|string',
            'email'         => 'required|string|email|max:50|unique:users|confirmed',
            'username'      => 'required|string|max:50|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'accept_terms'  => 'required',
            'g-recaptcha-response' => 'required',
        ],
        [
            'g-recaptcha-response.required' => 'Captcha is required',
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $result = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => Config::get('role.member.code'),
            'emailConfirmed' => 1,
            'password' => bcrypt($data['password']),
        ]);
        Mail::to($data['email'])->send(new Register($data));

        return $result;
    }
}