<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['sigla', 'descricao'];
    
	public static function listEstado()
	{
		return static::orderBy('sigla')->pluck('sigla', 'id');
	} 

}
