<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaTicketClub extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
    public function ofertas()
    {
        return $this->hasMany('App\Models\TicketClubItem', 'empresa_ticket_club_id');
    }
}
