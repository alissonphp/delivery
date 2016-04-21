<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTelefoneTaxaEmpresaTable extends Migration
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
            $table->string('telefone_delivery2');
            $table->decimal('taxa_entrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function(Blueprint $table)
        {
            $table->dropColumn('telefone_delivery2');
            $table->dropColumn('taxa_entrega');
        });
    }
}
