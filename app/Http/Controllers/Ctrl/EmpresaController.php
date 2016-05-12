<?php

namespace App\Http\Controllers\Ctrl;

use App\Models\Categorias;
use App\Models\Empresa;
use App\Models\EmpresaCategoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresa::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $reg = new Empresa();
            $reg->razao = $request->input('razao');
            $reg->fantasia = $request->input('fantasia');
            $reg->cnpj = $request->input('cnpj');
            $reg->responsavel = $request->input('responsavel');
            $reg->telefone_delivery = $request->input('telefone_delivery');
            $reg->telefone_delivery2 = $request->input('telefone_delivery2');
            $reg->taxa_entrega = $request->input('taxa_entrega');
            $reg->descricao = $request->input('descricao');
            $reg->pedido_medio = $request->input('pedido_medio');
            $reg->tempo_medio = $request->input('tempo_medio');
            $reg->timestamps = true;
            $reg->save();

            foreach($request->input('categorias') as $cat) {
                $empCat = new EmpresaCategoria();
                $empCat->empresa_id = $reg->id;
                $empCat->categoria_id = $cat;
                $empCat->save();

                $cats[] = $cat;
            }

            return $reg;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = Empresa::find($id);
        foreach($reg->empresacategoria as $c) {
            $c->categoria;
        }
        return $reg;
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
        $item = Empresa::find($request->input('id'));
        $item->razao = $request->input('data.razao');
        $item->fantasia = $request->input('data.fantasia');
        $item->cnpj = $request->input('data.cnpj');
        $item->responsavel = $request->input('data.responsavel');
        $item->telefone_delivery = $request->input('data.telefone_delivery');
        $item->telefone_delivery2 = $request->input('data.telefone_delivery2');
        $item->taxa_entrega = $request->input('data.taxa_entrega');
        $item->descricao = $request->input('data.descricao');
        $item->tempo_medio = $request->input('data.tempo_medio');
        $item->pedido_medio = $request->input('data.pedido_medio');
        $item->save();
        return response(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::find($id)->delete();
    }
}
