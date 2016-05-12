<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapioItemVariacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_item_variacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cardapio_items_id');
            $table->string('rotulo');
            $table->decimal('preco');
            $table->timestamps();
            $table->foreign('cardapio_items_id')
                ->references('id')
                ->on('cardapio_items')
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
        Schema::drop('cardapio_item_variacoes');
    }
}
