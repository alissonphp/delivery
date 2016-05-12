<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardapioItem extends Model
{
    public function cardapio()
    {
        return $this->belongsTo('App\Models\EmpresaCardapio', 'cardapio_id');
    }

    public function variacao()
    {
        return $this->hasMany('App\Models\CardapioItemVariacoes','cardapio_items_id');
    }
}
