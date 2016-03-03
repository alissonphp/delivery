<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\EmpresaTicketClub;
use App\Models\TicketClubItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function getIndex($id)
    {
        $empresa = Empresa::find($id);
        return $empresa->tickets;
    }
    public function postStore(Request $request, $id)
    {
        $now = date('Y-m-d');
        $tks = EmpresaTicketClub::where('empresa_id',$id)
            ->where('validade', '>=', $now)
            ->get();
        if (count($tks) > 0) {
            return response('Ainda existem cotas vigentes', 500);
        } else {

            try {
                $empresa = Empresa::find($id);
                $ticket = new EmpresaTicketClub();
                $ticket->empresa()->associate($empresa);
                $ticket->tickets = $request->input('tickets');
                $ticket->validade = $request->input('validade');
                $ticket->timestamps = true;
                $ticket->save();
                return response('ok', 200);
            } catch (\Exception $ex) {
                return response($ex->getMessage(), $ex->getCode());
            }

        }
    }
    public function postGerados(Request $request)
    {
        $cota = EmpresaTicketClub::find($request->input('cota'));
        $cota->ofertas;
        return $cota;
    }
    public function postStoreoferta(Request $request, $id)
    {
        $cota = EmpresaTicketClub::find($id);
        try {
            $oferta = new TicketClubItem();
            $oferta->cota()->associate($cota);
            $oferta->titulo = $request->input('oferta.titulo');
            $oferta->descricao = $request->input('oferta.descricao');
            $oferta->tipo = $request->input('oferta.tipo');
            $oferta->preco_normal = $request->input('oferta.preco_normal');
            $oferta->preco_ticket = $request->input('oferta.preco_ticket');
            $oferta->validade = $request->input('oferta.validade');
            if($request->hasFile('oferta.cover')) {
                $file = $request->file('oferta.cover');
                $file->move(public_path().'/assets/images/ofertas_ticket/', date('YmdHis').$file->getClientOriginalName());
                $oferta->cover = date('YmdHis').$file->getClientOriginalName();
            }
            $oferta->timestamps = true;
            $oferta->save();
            return response('ok',200);
        } catch(\Exception $ex) {
            return response($ex->getMessage(), $ex->getCode());
        }
    }
}
