<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = ['categoria'];
    public function empresacategoria()
    {
        return $this->hasMany('App\Models\EmpresaCategoria','categoria_id');
    }
}
