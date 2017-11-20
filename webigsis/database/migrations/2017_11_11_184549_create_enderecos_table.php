<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discipulo_id')->unsigned();
            $table->string('logradouro', 200);
            $table->string('numero', 20);
            $table->string('bairro', 150);
            $table->string('cidade', 150);
            $table->string('uf', 2);
            $table->string('cep', 9);

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
        Schema::dropIfExists('enderecos');
    }
}
