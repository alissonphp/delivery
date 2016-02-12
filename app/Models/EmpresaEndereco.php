<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaEndereco extends Model
{
    protected $fillable = ['empresa_id','endereco','numero','complemento','bairro','cidade','estado','cep'];
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
}
