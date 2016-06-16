<?php

namespace App\Http\Controllers\Site;

use App\Models\Bairro;
use App\Models\CardapioItem;
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
        if($funcionamento){
            if($now > $funcionamento->abertura && $now < $funcionamento->fechamento) {
                $aberto = 1;
            } else {
                $aberto = 0;
            }
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
                "itens"  => CardapioItem::where('cardapio_id',$c->id)->with('variacao')->get()
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
        $payments = Pagamento::all();
        $bairros = Bairro::all();
        $empresas = Empresa::all();
        $searchItens = $request->all();
        $seachQuery = \DB::table('empresas')
                    ->join('empresa_planos','empresas.id','=','empresa_planos.empresa_id')
                    ->join('empresa_imagems','empresas.id','=','empresa_imagems.empresa_id')
                    ->join('planos','empresa_planos.plano_id','=','planos.id')
                    ->select('empresas.descricao as empresa_descricao', 'empresas.*', 'empresa_imagems.*');

        if($request->has('q') && $request->input('q') != "all") {
            $seachQuery->where('empresas.fantasia','like','%'.$request->input('q').'%');
        }
        if($request->has('e') && $request->input('e') != "all") {
            $esp = Categorias::where('categoria','=',$request->input('e'))->first();
            $seachQuery->join('empresa_categorias','empresas.id','=','empresa_categorias.empresa_id')
                ->where('empresa_categorias.categoria_id',$esp->id)
                ->groupBy('empresas.id');
        }
        if($request->has('pg') && $request->input('pg') != "all"){
            $pgto = Pagamento::where('forma','=',$request->input('pg'))->first();
            $seachQuery->join('empresa_pagamentos','empresas.id','=','empresa_pagamentos.empresa_id')
                ->where('empresa_pagamentos.pagamento_id','=',$pgto->id);
        }
        if($request->has('b') && $request->input('b') != "all"){
            $bairro = Bairro::where('bairro','=',$request->input('b'))->first();
            $seachQuery->join('empresa_bairros','empresas.id','=','empresa_bairros.empresa_id')
                ->where('empresa_bairros.bairro_id','=',$bairro->id);
        }

        $request = $seachQuery->orderBy('planos.prioridade','desc')->get();
        return view('site.pesquisa',compact('request','payments','bairros','empresas','searchItens'));
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
