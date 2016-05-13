<?php

namespace App\Http\Controllers\Site;

use App\Models\EmpresaPlano;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        $empresasPremium = EmpresaPlano::where('plano_id',1)->orderByRaw("RAND()")->limit(6)->get();
        return view('site.index',compact('empresasPremium'));
    }
}
