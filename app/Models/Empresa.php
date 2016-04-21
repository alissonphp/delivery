<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['razao','fantasia','cnpj','responsavel','telefone_delivery', 'telefone_delivery2', 'taxa_entrega'];
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
    public function tickets()
    {
        return $this->hasMany('App\Models\EmpresaTicketClub','empresa_id');
    }
    public function empresacategoria()
    {
        return $this->hasMany('App\Models\EmpresaCategoria','empresa_id');
    }
    public function bairros()
    {
        return $this->belongsToMany('App\Models\Bairro', 'empresa_bairros', 'empresa_id', 'bairro_id');
    }
    public function pagamentos()
    {
        return $this->belongsToMany('App\Models\Pagamento', 'empresa_pagamentos', 'empresa_id', 'pagamento_id');
    }
}
