<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscipulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipulos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('e_lider')->nullable();
            $table->integer('lider_id')->unsigned()->nullable();
            $table->integer('celula_id')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('sexo', 1);

            $table->date('nascimento_data')->nullable();
            $table->string('nascimento_cidade',100)->nullable();
            $table->string('nascimento_uf',2)->nullable();

            $table->boolean('encontro')->nullable();
            $table->boolean('escolaMinisterios')->nullable();
            $table->boolean('batismo')->nullable();
            $table->date('batismo_data')->nullable();
            $table->integer('recebidoModo_id')->unsigned()->nullable();
            $table->boolean('ativo')->nullable();
            $table->string('logradouro', 200)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('bairro', 150)->nullable();
            $table->string('cidade', 150)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 9)->nullable();

            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            
            $table->foreign('lider_id')
                ->references('id')
                ->on('discipulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discipulos');
    }
}
