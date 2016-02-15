<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaCardapio extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa','empresa_id');
    }
    public function itens()
    {
        return $this->hasMany('App\Models\CardapioItem','cardapio_id');
    }
}
