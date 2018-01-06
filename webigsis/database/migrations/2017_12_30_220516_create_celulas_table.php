<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->nullable();
            $table->enum('diaDaSemana', ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado']);
            $table->datetime('horario');
            $table->integer('lider_id')->unsigned(); //lider de celula
            $table->integer('anfiteão_id')->unsigned()->nullable();

            $table->string('logradouro', 200)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('bairro', 150)->nullable();
            $table->string('cidade', 150)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 9)->nullable();

            $table->text('obs');

            $table->timestamps();

            $table->foreign('lider_id')
                ->references('id')
                ->on('discipulos');

            $table->foreign('anfiteão_id')
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
        Schema::dropIfExists('celulas');
    }
}
