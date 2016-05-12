<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $fillable = ['bairro'];
    public $timestamps = false;
    public function empresas()
    {
        return $this->belongsToMany('App\Models\Empresa');
    }

}
