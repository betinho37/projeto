<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
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
    public function edit(Publicacao $publicacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacao $publicacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacao $publicacao)
    {
        //
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
