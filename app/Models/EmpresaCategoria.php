<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaCategoria extends Model
{
    public $timestamps = false;
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa','empresa_id');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias','categoria_id');
    }
}
