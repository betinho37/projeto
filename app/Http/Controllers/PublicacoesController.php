<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;
use Response;

class PublicacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('publicacoes.create', compact('publicacao', 'list_user', 'list_categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $publicacao = new Publicacao;

        $publicacao->nome = $request->nome;
        $publicacao->titulo = $request->titulo;
        $publicacao->descricao = $request->descricao;
        $publicacao->userid = $request->userid;
        $publicacao->categoriaid = $request->categoriaid;

        if ($request->hasFile('arquivo')) {

            $path = $request->arquivo->store('/');
            $publicacao->arquivo = $path;

            $publicacao->save();
        }

        if ($request->hasFile('pdf')) {
            $path = $request->pdf->store('/');
            $publicacao->pdf = $path;
            $publicacao->save();
        }


        if (empty($request->arquivo && $request->hasFile('arquivo'))) {
            return Response::json(array('errors' => abort(400, 'Nenhum arquivo foi enviado.')));
        }


        return redirect()->action('PublicacoesController@controle');

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
        return view('publicacoes.edit', compact('publicacao', 'list_user', 'list_categoria'));
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
        return redirect()->action('PublicacoesController@controle');
    }

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
        return redirect()->action('PublicacoesController@controle');
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
