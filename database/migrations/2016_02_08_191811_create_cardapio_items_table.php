<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cardapio_id');
            $table->string('item');
            $table->text('descricao');
            $table->decimal('preco');
            $table->enum('ativo', ['0','1']);
            $table->foreign('cardapio_id')
                ->references('id')
                ->on('empresa_cardapios')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cardapio_items');
    }
}
