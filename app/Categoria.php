<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicacao;

/**
 * Class Categoria
 * @package App
 */
class Categoria extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nome'];

    /**
     * @return mixed
     */
    public static function listCategoria()
	{
		return static::orderBy('id')->pluck('nome', 'id');
	}
}
