<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
              'phone' => $data['phone'],
              'address' => $data['address'],
               'is_admin'=>0,
            'status'=>0,
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->intended('/');
    }



       /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    public function login(Request $request)

    {

        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);


        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))

        {
  if(auth()->user()->is_admin == '1')
    {
       return redirect('/runnaz_backend'); 
       } 
            return redirect()->intended('/process');

        }else{
            Session::flash('warning',"please check your username and password.");
            return back();

        }

    }

   
}
