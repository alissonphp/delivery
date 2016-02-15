<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardapioItem extends Model
{
    public function cardapio()
    {
        return $this->belongsTo('App\Models\EmpresaCardapio', 'cardapio_id');
    }
}
