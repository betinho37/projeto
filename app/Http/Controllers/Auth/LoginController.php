<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        $email = [
            "email" => "required|exists:users",
        ];

        $validator = Validator::make($request->all(), $email);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', 'Email inválido !');
        }



        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/api/publicacao');
        } else {

            return redirect()->back()->withInput()->with('errors', 'Senha inválida !');

        };



    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        

    }
}
