<?php

namespace App;
use Illuminate\Auth\Notifications\ResetPassword;
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
        'last_login_at',
    ];

    //campos que devem ser salvos no banco
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
        'remember_token',
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

        //Ordena o droplist pelo nome
        return static::orderBy('nome')->pluck('nome', 'id');
    }

    public function estado(){
        //Relaciona o model Estado ao User com o campo estado id
        return $this->belongsTo('App\Estado', 'estadoid');
    }

    public static function pesquisa($pesquisar){
        return static::where('nome', 'LIKE', '%' . $pesquisar . '%')
                        ->orWhere('email','LIKE','%'.$pesquisar.'%')->paginate(10);
    }
    public function sendPasswordResetNotification($token)
    {
        // Não esquece: use App\Notifications\ResetPassword;
        $this->notify(new ResetPassword($token));
    }
}
