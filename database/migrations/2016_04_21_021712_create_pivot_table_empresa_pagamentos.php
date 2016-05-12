<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTableEmpresaPagamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_pagamentos', function(Blueprint $table)
        {
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('pagamento_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');
            $table->foreign('pagamento_id')
                ->references('id')
                ->on('pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresa_pagamentos');
    }
}
