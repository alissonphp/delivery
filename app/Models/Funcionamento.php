<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionamento extends Model
{
    public $table = "empresa_funcionamento";
    public $timestamps = false;
    public function empresas()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }

}
