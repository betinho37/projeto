<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';

    protected $fillable = [
        'nome',
        'titulo',
        'descricao',
        'arquivo',
        'pdf',
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
 

}
