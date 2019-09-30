<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * @package App
 */
class Estado extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sigla', 'descricao'];

    /**
     * @return mixed
     */
    public static function listEstado()
	{
		return static::orderBy('sigla')->pluck('sigla', 'id');
	} 

}
