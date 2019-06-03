<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        $users = DB::table('users')->count();
        

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
                    ->take(5)
                    ->get(),
            ],
        ];        
     return view('home', compact('blocosnumericos', 'blocoslista', 'users'));

    }
}
