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
        'arquivoid',
        'pdf',
        'tipousuario',
        'userid',
        'situacao',
        'categoriaid'
    ];
        public function user()
    {
            return $this->belongsTo(User::class, 'userid');
    }
 

}
