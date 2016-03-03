<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketClubItem extends Model
{
    public function cota()
    {
        return $this->belongsTo('App\Models\EmpresaTicketClub','empresa_ticket_club_id');
    }
}
