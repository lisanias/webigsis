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
            $table->integer('lider_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('avatar')->default('default.jpg');
            $table->boolean('sexo');
            $table->date('nascimento_data')->nullable();
            $table->string('nascimento_cidade',100)->nullable();
            $table->string('nascimento_uf',2)->nullable();
            $table->integer('recebidoModo_id')->unsigned()->nullable();
            $table->boolean('encontro')->nullable();
            $table->boolean('escolaMinisterios')->nullable();
            $table->boolean('batismo')->nullable();

            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            
            $table->foreign('lider_id')
                ->references('id')
                ->on('discipulos');

            $table->foreign('recebidoModo_id')
                ->references('id')
                ->on('recebido_modos');
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
