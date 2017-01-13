<?php

namespace App\Helpers;
use App\Models\Categorias;
use App\Models\EmpresaPlano;

class Footer
{
    static function listCategories()
    {
        return Categorias::orderBy('categoria','asc')->get();
    }

    static function premiumRestaurants()
    {
        return EmpresaPlano::where('plano_id',1)->orderByRaw("RAND()")->limit(6)->get();
    }
}