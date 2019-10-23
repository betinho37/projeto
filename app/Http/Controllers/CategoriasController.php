<?php

namespace App\Http\Controllers;

use App\Publicacao;
use Illuminate\Http\Request;
use App\Categoria;

/**
 * Class CategoriasController
 * @package App\Http\Controllers
 */
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $categoria,  $publicacao;


    /**
     * CategoriasController constructor.
     * @param Categoria $categoria
     * @param Publicacao $publicacao
     */
    public function __construct(Categoria $categoria, Publicacao $publicacao )
    {
        //obriga esta logado
        $this->middleware('auth');
        $this->publicacao = $publicacao;
        $this->categoria = $categoria;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $categoria = $this->categoria->all();
        return view('publicacoes.categorias.index', compact('categoria'));

    }




        public function documentos()
        {
            $publicacao = Publicacao::where('categoriaid', '=', 1)->where('situacao', '=', 1)->Simplepaginate(6);

            return view('publicacoes.categorias.documento', compact('publicacao'));

        }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function imagens()
    {


        $publicacao = Publicacao::where('categoriaid', '=', 2)->where('situacao', '=', 1)->simplePaginate(6);

        return view('publicacoes.categorias.imagem', ['publicacao' => $publicacao]);



    }


    public function musicas()
    {
        $publicacao = Publicacao::where('categoriaid', '=', 3)->Simplepaginate(7);

        return view('publicacoes.categorias.musica', compact('publicacao'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videos()
    {
        /** @var TYPE_NAME $publicacao */

        $publicacao = Publicacao::where('categoriaid', '=', 4)->where('situacao', '=', 1)->Simplepaginate(10);

        return view('publicacoes.categorias.video', compact('publicacao'));

    }






    }
