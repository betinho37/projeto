<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Laraerp\Ordination\OrdinationTrait;

/**
 * Class Publicacao
 * @package App
 */
class Publicacao extends Model
{
    use OrdinationTrait;

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
        'capa',
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
