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
        $mes = Carbon::now();
        $primeiroDiaDoMes = Carbon::now()->startOfMonth();
        $ultimoDiaDoMes = Carbon::now()->endOfMonth();
        ////////////////////////////////////////////////////////////////
        $semana = Carbon::now();
        $primeiroDiaDaSemana = Carbon::now()->startOfWeek();
        $ultimoDiaDaSemana = Carbon::now()->endOfWeek();
        ////////////////////////////////////////////////////////////////

        $registrosmensais = DB::table('users')
        ->whereDate('created_at', '>=', $primeiroDiaDoMes)
        ->sum('id');

        $registrossemanais = DB::table('users')
        ->whereDate('created_at', '>=', $primeiroDiaDaSemana)
        ->sum('id');
        
        return view('home', compact(
                                    'usuario',
                                    'registrosmensais',
                                    'registrossemanais'
                                
                                
                                    ));
    }
}
