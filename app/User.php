<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = [
        'updated_at',
        'created_at',
        'email_verified_at',
        'last_login_at',
    ];
    protected $fillable = [
        'nome',
        'email',
        'password',
        'cep',
        'endereco',
        'telefone',
        'tipousuario',
        'estadoid',
        'cidade',
        'created_at',
        'updated_at',
        'remember_token',
        'email_verified_at',
        'last_login_at',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public static function listUser() {
        
        return static::orderBy('nome')->pluck('nome', 'id');
    }

    public function estado(){
        
        return $this->belongsTo('App\Estado', 'estadoid');
    }
    
    public function publicacoes(){

        return $this->hasMany(Publicacao::class, 'userid');
    }
    
    public static function pesquisa($pesquisar){
        return static::where('nome', 'LIKE', '%' . $pesquisar . '%')
                        ->orWhere('email','LIKE','%'.$pesquisar.'%')->paginate(10);
    }

}
