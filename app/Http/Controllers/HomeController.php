<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

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


        $number_blocks = [
            [
                'title' => 'Usuários conectados hoje',
                'number' => User::whereDate('last_login_at', today())->count()
            ],
            [
                'title' => 'Conectados nos últimos 7 dias',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(7))->count()
            ],
            [
                'title' => 'Conectados nos últimos 30 dias',
                'number' => User::whereDate('last_login_at', '>', today()->subDays(30))->count()
            ],
        ];

        $list_blocks = [
            [
                'title' => 'Últimos usuários conectados',
                'entries' => User::orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get(),
            ],
            [
                'title' => 'Usuários não conectados por 30 dias',
                'entries' => User::where('last_login_at', '<', today()->subDays(30))
                    ->orwhere('last_login_at', null)
                    ->orderBy('last_login_at', 'desc')
                    ->take(5)
                    ->get()
            ],
        ];        
     return view('home', compact('number_blocks', 'list_blocks', 'chart'));

    }
}
