<?php

namespace App\Http\Controllers;
use App\Publicacao;
use DB;
use App\User;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $publicacao;


    /**
     * HomeController constructor.
     * @param Publicacao $publicacao
     */
    public function __construct(Publicacao $publicacao)
    {
        //obriga esta logado
        $this->middleware('auth');
        $this->publicacao = $publicacao;


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tipousuario = auth()->user()->tipousuario;
        $users = DB::table('users')->count();
        $publicacaoes = DB::table('publicacoes')->count();
        $publipendentes = DB::table('publicacoes')->where('situacao', '=', 0)->count();


        $blocosnumericos = [
            [
                'title' => 'Usuários conectados hoje',
                'number' => User::whereDate('last_login_at', today())->count()
            ],
            [
                'title' => 'Conectados nos últimos 30 dias',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(30))->count()
            ],
        ];

        $blocoslista = [
            [
                'title' => 'Últimos usuários conectados',
                'registro' => User::orderBy('last_login_at', 'desc')
                    ->take(3)
                    ->get(),
            ],
        ];

        $publicacoesdia = [
            [
                'title' => 'Publicações hoje',
                'number' => Publicacao::whereDate('created_at', today())->where('situacao', '=', 1)->count()
            ],
        ];

        $publicacao = Publicacao::where('situacao', '=', 0)->get();



        return view('home', compact('blocosnumericos',
            'blocoslista',
            'users',
            "publicacao",
            "publicacoesdia",
            "publicacaoes",
            "publipendentes"));

    }
}
