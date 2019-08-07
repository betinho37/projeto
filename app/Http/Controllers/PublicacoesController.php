<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\Categoria;
use App\Arquivo;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;


class PublicacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $publicacao, $user, $categoria, $arquivo;


    public function __construct(Publicacao $publicacao, User $user, Categoria $categoria, Arquivo $arquivo)
    {
        //obriga esta logado
        $this->middleware('auth');

        $this->publicacao = $publicacao;
        $this->arquivo = $arquivo;
        $this->user = $user;
        $this->categoria = $categoria;
    }


    public function index()
    {


        $publicacao = Publicacao::where('situacao', '=', 1)->get();
        return view('publicacoes.index', ['publicacao' => $publicacao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicacao = Publicacao::get();
        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();
        return view('publicacoes.create', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (blank($request->arquivo) && blank($request->pdf)) {
            return redirect()->action('PublicacoesController@controle')->with('error', 'Nenhum arquivo foi enviado.');

        }

        $publicacao = Publicacao::create($request->all());

        if ($request->hasFile('arquivo')) {

            $arquivo = new Arquivo();
            $path = $request->arquivo->store('/uploads');
            $arquivo->nome = $path;
        }

        if ($request->hasFile('pdf')) {
            $path = $request->pdf->store('/');
            $publicacao->pdf = $path;
        }

        if ($publicacao &&  $arquivo ){
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Salva!');
    }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacao $publicacao, $id)
    {
        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();
        $publicacao = Publicacao::find($id);
        return view('publicacoes.edit', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $publicacao = Publicacao::find($id);

        if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->getClientOriginalExtension();
            $path = $request->arquivo->store('/');
            $publicacao->arquivo = $extension;
            $publicacao->arquivo = $path;
            $publicacao->save();
        }


        if ($request->hasFile('pdf')) {
            $extension = $request->arquivo->getClientOriginalExtension();
            $path = $request->pdf->store('/');
            $publicacao->arquivo = $extension;
            $publicacao->pdf = $path;
            $publicacao->save();
        }


        $publicacao->situacao = $request->situacao;
        $publicacao->categoriaid = $request->categoriaid;
        $publicacao->posicaoimagem = $request->posicaoimagem;
        $publicacao->descricao = $request->descricao;
        $publicacao->titulo = $request->titulo;
        $publicacao->nome = $request->nome;
        $publicacao->save();

        if ($publicacao ){
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Atualizada!!');
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function deletfile($nome)
    {
        $publicacao = Publicacao::where('arquivo', $nome)->first();
        $publicacao->arquivo = null;
        unlink(public_path('uploads/' . $nome));
        $publicacao->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $publicacao = Publicacao::find($id);

        if ($publicacao->arquivo) {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
        }
        if ($publicacao->pdf) {
            unlink(public_path('uploads/' . $publicacao->pdf));
            $publicacao->delete();
        }

        $publicacao->delete();

        if ($publicacao ){
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
                                        ->simplePaginate(10);
        return view('publicacoes.controle', compact('publicacao'));
    }






}
