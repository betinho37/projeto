<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Publicacao
 * @package App
 */
class Publicacao extends Model
{
    /**
     * @var string
     */
    protected $table = 'publicacoes';

    /**
     * @var array
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
            return $this->belongsTo(User::class, 'userid');
    }

    /**
     * @param $pesquisar
     * @return mixed
     */
    public static function pesquisa($pesquisar){

        return static::where('nome', 'LIKE', '%' . $pesquisar . '%')
            ->orWhere('created_at','LIKE','%'.$pesquisar.'%');
    }



}
