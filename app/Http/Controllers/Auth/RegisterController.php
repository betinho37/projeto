<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Estado;
use View;
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
    protected $redirectTo = '/api/home';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);  
        User::create($inputs);

        $credentials = $request->only('email', 'password');

        if (Auth::check()) {
            return redirect()->action('UsuariosController@index');

        } else {
            if (Auth::attempt($credentials)) {

                return redirect()->intended( '/api/home');
            }
        }


    }
}
