<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['razao','fantasia','cnpj','responsavel'];
    public function endereco()
    {
        return $this->hasOne('App\Models\EmpresaEndereco', 'empresa_id');
    }
    public function social()
    {
        return $this->hasOne('App\Models\EmpresaSocial','empresa_id');
    }
    public function empresaplano()
    {
        return $this->hasOne('App\Models\EmpresaPlano','empresa_id');
    }
    public function contato()
    {
        return $this->hasOne('App\Models\EmpresaContato','empresa_id');
    }
    public function imagens()
    {
        return $this->hasOne('App\Models\EmpresaImagem','empresa_id');
    }
    public function cardapio()
    {
        return $this->hasMany('App\Models\EmpresaCardapio','empresa_id');
    }
}
