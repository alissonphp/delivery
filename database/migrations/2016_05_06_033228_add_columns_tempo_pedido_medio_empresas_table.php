<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTempoPedidoMedioEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function(Blueprint $table)
        {
            $table->string('tempo_medio');
            $table->decimal('pedido_medio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa', function(Blueprint $table)
        {
            $table->dropColumn('tempo_medio');
            $table->dropColumn('pedido_medio');
        });
    }
}
