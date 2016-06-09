<?php

namespace App\Http\Controllers\Ctrl;

use App\Http\Controllers\Controller;
use App\Models\CardapioItem;
use App\Models\CardapioItemVariacoes;
use App\Models\Empresa;
use App\Models\EmpresaCardapio;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function getShowcardapio($id)
    {
        return EmpresaCardapio::find($id);
    }

    public function putUpdatecardapio(Request $request)
    {
        try {
            $card = EmpresaCardapio::find($request->input('id'));
            $card->rotulo = $request->input('data.rotulo');
            $card->timestamps = true;
            $card->save();
            return response('ok',200);
        } catch(\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        try {
            $empresa = Empresa::find($request->input('empresa'));
            $cardEmp = new EmpresaCardapio();
            $cardEmp->empresa()->associate($empresa);
            $cardEmp->rotulo = $request->input('rotulo');
            $cardEmp->timestamps = true;
            $cardEmp->save();
            return response('ok',200);
        } catch(\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function deleteDelete(Request $request, $id)
    {
        try {
            EmpresaCardapio::find($id)->delete();
            return response('ok',200);
        }catch(\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function postStoreitens(Request $request, $id)
    {
        $cardapio = EmpresaCardapio::find($id);

        foreach($request->input('itens') as $item){
            $it = new CardapioItem();
            $it->cardapio()->associate($cardapio);
            if($item['categoria'] == "Comum") {
                $it->item = $item['item'];
                $it->preco = $item['preco'];
                $it->categoria = $item['categoria'];
                $it->ativo = $item['ativo'];
                if(isset($item['descricao'])){
                    $it->descricao = $item['descricao'];
                }
                if(isset($item['porcao'])){
                    $it->porcao = $item['porcao'];
                }
                $it->save();

                if(isset($item['variacoes'])){
                    foreach($item['variacoes'] as $v) {
                        $variacao = new CardapioItemVariacoes();
                        $variacao->item()->associate($it);
                        $variacao->rotulo = $v['rotulo'];
                        $variacao->preco = $v['preco'];
                        $variacao->save();
                    }
                }
            } else {
                $composicao = [];
                $composicao['tamanhos'] = $item['tamanhos'];
                $composicao['tipos'] = $item['tipos'];
                $composicao['sabores'] = $item['sabores'];
                $it->item = "Pizza";
                $it->categoria = "Pizza";
                $it->preco = "0.00";
                $it->ativo = 1;
                $it->composicao = json_encode($composicao);
                $it->save();
            }
        }

        return response($id, 200);
    }
    public function postUpdateitem(Request $request, $id){

        $it = CardapioItem::find($id);
        $item = $request->input('item');
        if($item['categoria'] == "Comum") {
            $it->item = $item['item'];
            $it->preco = $item['preco'];
            $it->categoria = $item['categoria'];
            $it->ativo = $item['ativo'];
            if(isset($item['descricao'])){
                $it->descricao = $item['descricao'];
            }
            if(isset($item['porcao'])){
                $it->porcao = $item['porcao'];
            }
            $it->save();

            $this->clearVariations($id);

            if(isset($item['variacoes'])){
                foreach($item['variacoes'] as $v) {
                    $variacao = new CardapioItemVariacoes();
                    $variacao->item()->associate($it);
                    $variacao->rotulo = $v['rotulo'];
                    $variacao->preco = $v['preco'];
                    $variacao->save();
                }
            }

        } else {
            $composicao = [];
            $composicao['tamanhos'] = $item['tamanhos'];
            $composicao['tipos'] = $item['tipos'];
            $composicao['sabores'] = $item['sabores'];
            $it->item = "Pizza";
            $it->categoria = "Pizza";
            $it->preco = "0.00";
            $it->ativo = 1;
            $it->composicao = json_encode($composicao);
            $it->save();
        }

        return response($item['cardapio_id'], 200);

    }

    public function clearVariations($id) {
        $vars = CardapioItemVariacoes::where('cardapio_items_id',$id)->get();
        try {
            foreach($vars as $v) {
                CardapioItemVariacoes::find($v->id)->delete();
            }
        } catch(\Exception $ex) {
            return $ex->getMessage();
        }
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
    public function getShow($id)
    {
        $item = CardapioItem::where('id',$id)->with('variacao')->get();
        return json_encode($item[0]);
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
