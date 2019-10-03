<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('titulo');
            $table->string('descricao',500);
            $table->string('arquivo');
            $table->string('capa');
            $table->integer('posicaoimagem')->nullable();
            $table->integer('situacao')->default(0);
            $table->integer('userid')->unsigned()->nullable();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('categoriaid')->unsigned()->nullable();
            $table->foreign('categoriaid')->references('id')->on('categorias')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacoes');
    }
}
