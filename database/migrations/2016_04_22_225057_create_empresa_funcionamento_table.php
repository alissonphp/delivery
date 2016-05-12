<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaFuncionamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_funcionamento', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->integer('dia');
            $table->time('abertura');
            $table->time('fechamento');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresa_funcionamento');
    }
}
