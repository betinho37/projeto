<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicacao;

class Categoria extends Model
{
    protected $fillable = ['nome'];

	public static function listCategoria()
	{
		return static::orderBy('id')->pluck('nome', 'id');
	}
}
