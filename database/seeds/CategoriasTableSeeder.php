<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(array('nome' => 'Documento'));
        Categoria::create(array('nome' => 'Imagem'));
        Categoria::create(array('nome' => 'Musica'));
        Categoria::create(array('nome' => 'Video'));
    }
}
