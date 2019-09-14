<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\Categoria;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;


class PublicacoesController extends Controller
{

    private $publicacao, $user, $categoria;


    public function __construct(Publicacao $publicacao, User $user, Categoria $categoria)
    {
        //obriga esta logado
        $this->middleware('auth');

        $this->publicacao = $publicacao;
        $this->user = $user;
        $this->categoria = $categoria;
    }


    public function index()
    {

        $publicacao = Publicacao::where('situacao', '=', 1)->get();

        return view('publicacoes.index', ['publicacao' => $publicacao]);

    }


    public function create()
    {
        $publicacao = Publicacao::get();

        $list_user = $this->user->listUser();

        $list_categoria = $this->categoria->listCategoria();

        return view('publicacoes.create', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }


    public function store(Request $request)
    {

        if (blank($request->arquivo)) {
            return redirect()->action('PublicacoesController@controle')->with('error', 'Nenhum arquivo foi enviado.');

        }


        $publicacao = Publicacao::create($request->all());

        //verifica se o input arquivo esta preechido

        if ($request->hasFile('arquivo')) {
            $path = $request->arquivo->store('/arquivos');
            $publicacao->arquivo = $path;
            $publicacao->save();
        }

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Salva!');
        }

    }


    public function home()
    {
        $tipousuario = auth()->user()->tipousuario;

        $publicacao = $this->publicacao;
        if ($tipousuario != 0) {
            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                ->orderBy('situacao', 'asc')
                ->simplePaginate(100);
            return view('publicacoes.controle', compact('publicacao'));
        }
        $publicacao = $publicacao->orderBy('situacao', 'asc')->get();
        return view('admin.home', compact('publicacao'));
    }


    public function show(Publicacao $publicacao)
    {
        $limite = $this->publicacao->limite();
        return (compact('limite'));

    }


    public function edit(Publicacao $publicacao, $id)
    {
        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();
        $publicacao = Publicacao::find($id);
        return view('publicacoes.edit', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }

    public function update(Request $request, $id)
    {
        $publicacao = Publicacao::find($id);
        $file = $request->hasFile('arquivo');
        if ($file != "") {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
            $path = $request->arquivo->store('/arquivos');
            $publicacao->arquivo = $path;
        }
        $publicacao->update($request->all());
        $publicacao->save();

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Atualizada!!');
        }
    }


    public function destroy($id)
    {
        $publicacao = Publicacao::find($id);

        if ($publicacao->arquivo) {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
        }

        $publicacao->delete();

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Excluida!');
        }
    }


    public function controle()
    {
        $tipousuario = auth()->user()->tipousuario;
        $publicacao = $this->publicacao;

        if ($tipousuario != 0) {
            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                ->orderBy('situacao', 'asc')
                ->orderBy('created_at', 'desc');
        }

        $publicacao = $publicacao->orderBy('situacao', 'asc')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(6);
        return view('publicacoes.controle', compact('publicacao'));
    }






}
