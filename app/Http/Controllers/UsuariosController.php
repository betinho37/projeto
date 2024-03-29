<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Estado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


/**
 * Class UsuariosController
 * @package App\Http\Controllers
 */
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $usuario, $estado;


    /**
     * UsuariosController constructor.
     * @param User $usuario
     * @param Estado $estado
     */
    public function __construct(User $usuario, Estado $estado)
    {
        $this->middleware('auth');

        $this->usuario = $usuario;
        $this->estado = $estado;


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $usuario = User::paginate(10);
        $list_estado = $this->estado->listEstado();
        return view('admin.index', compact('usuario', 'total_ids', 'list_estado'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_estado = $this->estado->listEstado();


        return view('admin.create', compact('list_estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $validator = $this->validator($inputs);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();


        }

        $inputs['password'] = bcrypt($inputs['password']);
        $this->usuario->create($inputs);

        $credentials = $request->only('email', 'password');

        if (Auth::check()) {
            return redirect()->action('UsuariosController@index')->with('sucesso', 'Usuário Inserído!');;

        } else {
            if (Auth::attempt($credentials)) {

                return redirect()->intended('/api/home');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_estado = $this->estado->listEstado();
        $usuario = User::find($id);

        return view('admin.show', compact('usuario', 'list_estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_estado = $this->estado->listEstado();
        $usuario = User::find($id);
        return view('admin.edit', compact('usuario', 'list_estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->fill($request->all());

        $usuario->save();
        return redirect()->action('UsuariosController@index')->with('sucesso', 'Usuário Atualizado!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->action('UsuariosController@index')->with('sucesso', 'Usuário Excluido!');;
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pesquisa = $request->pesquisar;

        $usuario = User::pesquisa($request->pesquisar);

        if (count($usuario) > 0) {
            return view('admin/search', compact('usuario', 'pesquisa'));
        } else {
            return redirect()->action('UsuariosController@index')
                ->with("mensagem", "Resource not found");
        }
    }

    public function updateprofile(Request $request)
    {
        $usuario = Auth::user(); // resgata o usuario
        $list_estado = $this->estado->listEstado();


        if (!(new $request)->input('password') == '') // verifica se a senha foi alterada
        {
            $usuario->password = bcrypt((new $request)->input('password')); // muda a senha do seu usuario já criptografada pela função bcrypt
        }

        $usuario->save(); // salva o usuario alterado =)
        return view('admin.updateprof', compact('usuario', 'list_estado'));
    }


}


