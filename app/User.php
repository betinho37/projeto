<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cep',
        'endereco',
        'telefone',
        'tipousuario',
        'estadoid',
        'cidade'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function listUser() {
        
        return static::orderBy('name')->pluck('name', 'id');
    }

    public function estado(){
        
        return $this->belongsTo('App\Estado', 'estadoid');
    }
    
    public function publicacoes(){

        return $this->hasMany(Publicacao::class, 'userid');
    }

}
