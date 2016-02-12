<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaPlano extends Model
{
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa','empresa_id');
    }
    public function plano()
    {
        return $this->belongsTo('App\Models\Plano','plano_id');
    }
}
