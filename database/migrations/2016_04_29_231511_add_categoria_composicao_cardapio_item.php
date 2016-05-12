<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaComposicaoCardapioItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cardapio_items', function(Blueprint $table)
        {
            $table->string('categoria')->nullable();
            $table->text('composicao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cardapio_items', function(Blueprint $table)
        {
            $table->dropColumn('categoria');
            $table->dropColumn('composicao');
        });
    }
}
