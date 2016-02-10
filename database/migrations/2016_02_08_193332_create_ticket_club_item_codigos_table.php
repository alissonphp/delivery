<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketClubItemCodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_club_item_codigos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_ticket_club_item_id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('codigo');
            $table->dateTime('validade');
            $table->enum('status', ['emitido','aplicado','vencido']);
            $table->foreign('empresa_ticket_club_item_id')
                ->references('id')
                ->on('ticket_club_items')
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
        Schema::drop('ticket_club_item_codigos');
    }
}
