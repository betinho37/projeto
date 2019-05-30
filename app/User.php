<?php

namespace App;

use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
        'last_login_at',
    ];

    protected $fillable = [
        'name',
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
        'deleted_at',
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
        
        return static::orderBy('name')->pluck('name', 'id');
    }

    public function estado(){
        
        return $this->belongsTo('App\Estado', 'estadoid');
    }
    
    public function publicacoes(){

        return $this->hasMany(Publicacao::class, 'userid');
    }

}
