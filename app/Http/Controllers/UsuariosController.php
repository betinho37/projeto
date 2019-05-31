<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Estado;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
use Illuminate\Support\Facades\Input;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $usuario, $estado;


    public function __construct(User $usuario, Estado $estado)
    {

        $this->usuario = $usuario;
        $this->estado = $estado;

    }

    public function index()
    {
        

        $ids = DB::table('users')->select('id')->get();
        $total_ids = $ids->sum('id');

        $usuario = $this->usuario->all();
        $list_estado = $this->estado->listEstado();
        return view('admin.index', compact('usuario', 'total_ids','list_estado'));

       
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* $inputs = $request->all();

          $validator = $this->validator($inputs);

                if ($validator->fails()) {
                    return redirect('usuario/create')
                                ->withErrors($validator)
                                ->withInput();
                }

          $inputs['password'] = bcrypt($inputs['password']);

           $this->usuario->create($inputs);
                
          $credentials = $request->only('email', 'password');
          if (Auth::check()) {
                return redirect()->action('UsuariosController@index');

              } else {
                      if (Auth::attempt($credentials)) {

                      return redirect()->intended('api/home');
                }
              } */

              $input = $request->all();

              $validator = $this->validator($input);
              if ($validator->fails()) {
                  return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
              } else {
                  echo "Passei";
                  $input = $request->all();
                  $input->name = $request->name;
                  $input->email = $request->email;
                  $input->cep = $request->cep;
                  $input->endereco = $request->endereco;
                  $input->telefone = $request->telefone;
                  $input->tipousuario = $request->tipousuario;
                  $input->estadoid = $request->estadoid;
                  $input->cidade = $request->cidade;
                  $input['password'] = bcrypt($input['password']);
                  $input->save();
                  return response()->json($input);
              }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
         $usuario->fill($request->all());

         if ($usuario['password'] != null){
             $usuario['password'] = bcrypt($usuario['password']);
         }
         else
         unset($usuario['password']);

         $usuario->cidade= $request->cidade;

         $usuario->save();
         return redirect()->action('UsuariosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario, $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function perfil($id)
    {

        $list_estado = $this->estado->listEstado();
        $usuario = User::find($id);
        return view('admin.create', compact('usuario', 'list_estado'));

    }



    public function changeStatus() 
    {
        $id = Input::get('id');

        $usuario = User::findOrFail($id);
        $usuario->is_published = !$usuario->is_published;
        $usuario->save();

        return response()->json($usuario);
    }
}
