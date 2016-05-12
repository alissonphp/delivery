<?php

namespace App\Http\Controllers\Ctrl;

use App\Models\Categorias;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categorias::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verify = Categorias::where('categoria','=',$request->input('categoria'))->get();
        try {
            if(count($verify) == 0) {
                return Categorias::create($request->all());
            } else {
                return response('Categoria similar já registrada',500) ;
            }
        }catch (\Exception $ex) {
            return response($ex->getMessage(),500);
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
        return Categorias::find($id);
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
        $item = Categorias::find($request->input('id'));
        $item->categoria = $request->input('data.categoria');
        $item->save();
        return response('ok', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categorias::find($id);
        if(count($cat->empresacategoria) == 0) {
            try {
                Categorias::find($id)->delete();
                return response('ok',200);
            }catch (\Exception $ex) {
                return response($ex->getMessage(), 500);
            }
        } else {
            return response('Existem restaurantes vinculados a essa categoria', 500);
        }
    }
}
