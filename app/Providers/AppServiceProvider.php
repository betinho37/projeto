<?php

namespace App\Providers;
use App\Publicacao;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Dispatcher $events,User $user)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add('AVISOS');

            $items = Publicacao::all()->map(function (Publicacao $aviso) {
                //Busca a sessao do usuario logado e verifica o campo tipo usuario
                $user = Auth::user()->tipousuario;

                //se o usuario logado for admin e tiver alguma publicacao pendente
                if ($user == 0 && $aviso->situacao == 1) {

                    return [
                        'icon_color' => 'red',
                        'text' => 'Novas Publicações Pendentes',
                        'url'  => 'api/publicacoes/controle',
                    ];

                }
                return [
                    'text' => '',
                    'icon_color' => 'black',


                ];

            });
            $event->menu->add(...$items);
        });
    }



}
