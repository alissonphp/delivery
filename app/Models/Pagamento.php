<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['forma'];
    public function empresas()
    {
        return $this->belongsToMany('App\Models\Empresa');
    }
}
