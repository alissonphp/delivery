<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPorcaoColumnCardapioItem extends Migration
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
            $table->string('porcao')->nullable();
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
            $table->dropColumn('porcao');
        });
    }
}
