<?php

namespace App\Http\Controllers\Site;

use App\Models\Bairro;
use App\Models\Categorias;
use App\Models\Empresa;
use App\Models\EmpresaPlano;
use App\Models\Funcionamento;
use App\Models\Pagamento;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        $empresasPremium = EmpresaPlano::where('plano_id',1)->orderByRaw("RAND()")->limit(6)->get();
        $categorias = Categorias::all(['id', 'categoria']);
        $rests = Empresa::select('id','fantasia')->orderBy('fantasia','asc')->get();
        $bairros = Bairro::select('id','bairro')->orderBy('bairro','asc')->get();
        return view('site.index')
            ->with('empresasPremium',$empresasPremium)
            ->with('restaurantes',$rests)
            ->with('bairros',$bairros)
            ->with('categorias',$categorias);
    }
    public function getSobre()
    {
        return view('site.institucional.sobre');
    }
    public function getAnuncie()
    {
        return view('site.institucional.anuncie');
    }
    public function getRestaurante($slug)
    {
        $empresa = Empresa::where('slug', '=', $slug)->first();
        $funcionamento = Funcionamento::where('empresa_id', $empresa->id)
            ->where('dia', date('N'))->first();
        $now = date('H:i:s');
        if($now > $funcionamento->abertura && $now < $funcionamento->fechamento) {
            $aberto = 1;
        } else {
            $aberto = 0;
        }
        return view('site.profile', compact('empresa','aberto'));
    }

    public function getCardapios($id)
    {
        $cardapios = [];
        $restaurante = Empresa::find($id);
        foreach($restaurante->cardapio as $c) {
            $cardapios[] = [
                "id"     => $c->id,
                "rotulo" => $c->rotulo,
                "itens"  => $c->itens
            ];
        }

        return $cardapios;
    }

    public function getTaxa($id)
    {
        return Empresa::find($id)->taxa_entrega;
    }

    public function getPesquisa(Request $request)
    {
        $seachQuery = \DB::table('empresas')
                    ->join('empresa_planos','empresas.id','=','empresa_planos.empresa_id')
                    ->join('planos','empresa_planos.plano_id','=','planos.id');

        if($request->has('q')) {
            $seachQuery->where('empresas.fantasia','like','%'.$request->input('q').'%');
        }
        if($request->has('e')) {
            $esp = Categorias::where('categoria','=',$request->input('e'))->first();
            $seachQuery->join('empresa_categorias','empresas.id','=','empresa_categorias.empresa_id')
                ->where('empresa_categorias.categoria_id',$esp->id)
                ->groupBy('empresas.id');
        }
        if($request->has('pg')){
            $pgto = Pagamento::where('forma','=',$request->input('pg'))->first();
            $seachQuery->join('empresa_pagamentos','empresas.id','=','empresa_pagamentos.empresa_id')
                ->where('empresa_pagamentos.pagamento_id','=',$pgto->id);
        }

        $request = $seachQuery->orderBy('planos.prioridade','desc')->get();
        return view('site.pesquisa');
    }

//    public function getSlug()
//    {
//        $empresas = Empresa::all();
//        foreach ($empresas as $empresa) {
//            $emp = Empresa::find($empresa->id);
//            $emp->slug = str_slug($empresa->fantasia);
//            $emp->save();
//        }
//    return 'ok';
//    }
}
