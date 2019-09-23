<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publicacao extends Model
{
    protected $table = 'publicacoes';

    protected $fillable = [
        'nome',
        'titulo',
        'descricao',
        'arquivo',
        'tipousuario',
        'userid',
        'situacao',
        'categoriaid',
        'posicaoimagem'
    ];
        public function user()
    {
            return $this->belongsTo(User::class, 'userid');
    }

    public static function pesquisa($pesquisar){

        return static::where('nome', 'LIKE', '%' . $pesquisar . '%')
            ->orWhere('created_at','LIKE','%'.$pesquisar.'%');
    }



}
