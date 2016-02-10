<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketClubItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_club_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_ticket_club_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('tipo', ['oferta','combinado']);
            $table->decimal('preco_normal');
            $table->decimal('preco_ticket');
            $table->foreign('empresa_ticket_club_id')
                ->references('id')
                ->on('empresa_ticket_clubs')
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
        Schema::drop('ticket_club_items');
    }
}
