<?php

namespace App\Http\Controllers;

use App\Models\CardapioItem;
use App\Models\Empresa;
use App\Models\EmpresaCardapio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList($id)
    {
        $em = Empresa::find($id);
        return $em->cardapio;
    }
    public function getItens($id)
    {
        $cardapio = EmpresaCardapio::find($id);
        $cardapio->itens;
        return $cardapio;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Plano::create($request->all());
    }

    public function postStoreitens(Request $request, $id)
    {
        $cardapio = EmpresaCardapio::find($id);
        foreach($request->input('itens') as $item){
            $it = new CardapioItem();
            $it->cardapio()->associate($cardapio);
            $it->item = $item['item'];
            $it->descricao = $item['descricao'];
            $it->preco = $item['preco'];
            $it->porcao = $item['porcao'];
            $it->ativo = $item['ativo'];
            $it->save();
        }
        return response($id, 200);
    }
    public function deleteDeleteitens($id)
    {
        try {
            CardapioItem::find($id)->delete();
            return response("deleted", 200);
        } catch (\Exception $ex) {
            return response($ex->getMessage(), $ex->getCode());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Plano::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Plano::find($request->input('id'));
        $item->plano = $request->input('data.plano');
        $item->descricao = $request->input('data.descricao');
        $item->valor = $request->input('data.valor');
        $item->prioridade = $request->input('data.prioridade');
        $item->periodicidade = $request->input('data.periodicidade');
        $item->timestamps = true;
        $item->save();
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plano::find($id)->delete();
    }
}
