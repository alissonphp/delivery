<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnValidadeTicketClubItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_club_items', function(Blueprint $table)
        {
            $table->dateTime('validade');
            $table->string('cover');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_club_items', function(Blueprint $table)
        {
            $table->dropColumn('validade');
            $table->dropColumn('cover');
        });
    }
}
