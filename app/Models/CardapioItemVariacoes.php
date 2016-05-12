<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardapioItemVariacoes extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Models\CardapioItem','cardapio_items_id');
    }
}
