<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaTicketClub extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Modes\Empresa', 'empresa_id');
    }
}
