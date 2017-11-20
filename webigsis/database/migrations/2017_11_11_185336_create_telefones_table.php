<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discipulo_id')->unsigned();
            $table->enum('tipo', ['Celular', 'Residencial', 'Comercial', 'Outros']);
            $table->string('descricao', 255);
            $table->string('numero', 20);

            $table->timestamps();

            $table->foreign('discipulo_id')
                ->references('id')
                ->on('discipulos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
