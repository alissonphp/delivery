<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaImagem extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa','empresa_id');
    }
}
