<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\User;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $categoria,  $publicacao;


    public function __construct( Categoria $categoria, Publicacao $publicacao )
    {
        //obriga esta logado
        $this->middleware('auth');
        $this->publicacao = $publicacao;
        $this->categoria = $categoria;
    }

    public function index()
    {

        $categoria = $this->categoria->all();
        return view('publicacoes.categorias.index', compact('categoria'));

    }



    /*
        public function documentos()
        {
            $publicacao = Publicacao::where('categoriaid', '=', 1)->Simplepaginate(6);

            return view('publicacoes.categorias.imagem', compact('publicacao'));

        }
    */

    public function imagens()
    {


        $publicacao = Publicacao::get('categoriaid');

        $this->categoriaid = $publicacao;

        return view('publicacoes.categorias.imagem', compact( 'publicacao'));

    }
    /*
    public function musicas()
    {
        $publicacao = Publicacao::where('categoriaid', '=', 3)->Simplepaginate(6);

        return view('publicacoes.categorias.imagem', compact('publicacao'));

    }
    public function videos()
    {
        $publicacao = Publicacao::where('categoriaid', '=', 4)->Simplepaginate(6);

        return view('publicacoes.categorias.video', compact('publicacao'));

    }*/

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
