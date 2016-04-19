<?php

namespace App\Http\Controllers\Ctrl;

use App\Models\Empresa;
use App\Models\EmpresaContato;
use App\Models\EmpresaEndereco;
use App\Models\EmpresaImagem;
use App\Models\EmpresaPlano;
use App\Models\EmpresaSocial;
use App\Models\Plano;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class EmpresaInfosController extends Controller
{
    public function postSaveinfos(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $plano = Plano::find($request->input('plano'));
        $init = Carbon::now();
        $end = Carbon::now()->addMonths(12);

        $emPlano = new EmpresaPlano();
        $emPlano->plano()->associate($plano);
        $emPlano->empresa()->associate($empresa);
        $emPlano->inicio = $init;
        $emPlano->termino = $end;
        $emPlano->timestamps = true;
        $emPlano->save();

        $emEnd = new EmpresaEndereco();
        $emEnd->empresa()->associate($empresa);
        $emEnd->endereco = $request->input('endereco.endereco');
        $emEnd->numero = $request->input('endereco.numero');
        $emEnd->complemento = $request->input('endereco.complemento');
        $emEnd->bairro = $request->input('endereco.bairro');
        $emEnd->cidade = $request->input('endereco.cidade');
        $emEnd->estado = $request->input('endereco.estado');
        $emEnd->cep = $request->input('endereco.cep');
        $emEnd->save();

        $emSocial = new EmpresaSocial();
        $emSocial->empresa()->associate($empresa);
        $emSocial->facebook = $request->input('social.facebook');
        $emSocial->twitter = $request->input('social.twitter');
        $emSocial->youtube = $request->input('social.youtube');
        $emSocial->instagram = $request->input('social.instagram');
        $emSocial->snapchat = $request->input('social.snapchat');
        $emSocial->save();

        $emContato = new EmpresaContato();
        $emContato->empresa()->associate($empresa);
        $emContato->telefone1 = $request->input('contato.telefone1');
        $emContato->telefone2 = $request->input('contato.telefone2');
        $emContato->email = $request->input('contato.email');
        $emContato->save();

        return $id;
    }
    public function getAllinfos($id)
    {
        $infos = [];
        $empresa = Empresa::find($id);
        $empresa->endereco;
        $empresa->social;
        $empresa->contato;
        $empresa->empresaplano;
        $empresa->empresaplano->plano;
        return $empresa;
    }
    public function postUpdateinfos(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        $emEnd = $empresa->endereco;
        $emEnd->endereco = $request->input('endereco.endereco');
        $emEnd->numero = $request->input('endereco.numero');
        $emEnd->complemento = $request->input('endereco.complemento');
        $emEnd->bairro = $request->input('endereco.bairro');
        $emEnd->cidade = $request->input('endereco.cidade');
        $emEnd->estado = $request->input('endereco.estado');
        $emEnd->cep = $request->input('endereco.cep');
        $emEnd->save();

        $emSocial = $empresa->social;
        $emSocial->facebook = $request->input('social.facebook');
        $emSocial->twitter = $request->input('social.twitter');
        $emSocial->youtube = $request->input('social.youtube');
        $emSocial->instagram = $request->input('social.instagram');
        $emSocial->snapchat = $request->input('social.snapchat');
        $emSocial->save();

        $emContato = $empresa->contato;
        $emContato->telefone1 = $request->input('contato.telefone1');
        $emContato->telefone2 = $request->input('contato.telefone2');
        $emContato->email = $request->input('contato.email');
        $emContato->save();

        if($request->has('plano')) {
            $plano = Plano::find($request->input('plano'));
            $emPlan = $empresa->empresaplano;
            $emPlan->plano_id = $plano->id;
            $emPlan->save();
        } else {
            $plano = null;
        }
        return $id;
    }

    public function getListimgs($id)
    {
        $empresa = Empresa::find($id);
        if($empresa->imagens) {
            return $empresa->imagens;
        } else {
            return null;
        }
    }

    public function postUpimgs(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if($empresa->imagens) {
            $emImg = $empresa->imagens;
        } else {
            $emImg = new EmpresaImagem();
            $emImg->empresa()->associate($empresa);
        }

        if($request->hasFile('file.logo')) {
            $file = $request->file('file.logo');
            $file->move(public_path().'/assets/images/uploads/', date('YmdHis').$file->getClientOriginalName());
            $emImg->logo = date('YmdHis').$file->getClientOriginalName();
        }
        if($request->hasFile('file.anuncio')) {
            $file = $request->file('file.anuncio');
            $file->move(public_path().'/assets/images/uploads/', date('YmdHis').$file->getClientOriginalName());
            $emImg->anuncio_cover = date('YmdHis').$file->getClientOriginalName();
        }
        if($request->hasFile('file.cardapio')) {
            $file = $request->file('file.cardapio');
            $file->move(public_path().'/assets/images/uploads/', date('YmdHis').$file->getClientOriginalName());
            $emImg->anuncio_banner = date('YmdHis').$file->getClientOriginalName();
        }

        $emImg->save();

        return response('ok', 200);
    }
    public function postClearimg(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        return $img = $request->input('img');
        $imgEmpresa = $empresa->imagens;
        $imgEmpresa->$img = '';
        $imgEmpresa->save();
        return response('ok', 200);

    }
}
