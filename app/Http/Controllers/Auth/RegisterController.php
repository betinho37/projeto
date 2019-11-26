<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Estado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


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
    private  $estado;
    protected $redirectTo = '/api/publicacao';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Estado $estado)
    {
        $this->middleware('guest');
        $this->estado = $estado;

        $list_estado = $this->estado->listEstado();
        
        View::share('list_estado', $list_estado);

    }

    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $inputs = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('api/register')
                ->withErrors($validator)
                ->withInput();
        }
        $inputs['password'] = bcrypt($inputs['password']);

        User::create($inputs);

        $credentials = $request->only('email', 'password');

        if (Auth::check() ) {
            return redirect()->action('UsuariosController@index');

        } else {
            if (Auth::attempt($credentials)) {

                return redirect()->intended( '/api/publicacao');
            }
        }


    }

}
