@extends('site.base')
@section('content')
<div class="container-fluid grey lighten-4 fixed">
    <div class="container">
        <div class="row">
            <div class="input-field col m4">
                <select multiple>
                    <option value="" disabled selected>especialidades</option>
                    <option value="1">Massas</option>
                    <option value="2">Grelhados</option>
                    <option value="3">Carnes</option>
                </select>
            </div>
            <div class="input-field col m4">
                <select multiple>
                    <option value="" disabled selected>formas de pagamento</option>
                    <option value="1">Cartão - Débito</option>
                    <option value="2">Cartão - Crédito</option>
                    <option value="2">Cartão - Ticket</option>
                    <option value="3">Dinheiro</option>
                </select>
            </div>
            <div class="col m4">
                <p>Bairro de Entrega:</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="input-field col m12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Pesquisar restaurante ... Ex.: Casa de Massas, CIA da Carne, etc.</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>Restaurantes encontrados:</h4>
            </div>
        </div>

        <div class="row">
            @foreach($request as $p)
                <div class="col l3 m3 s12">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <div class="rest-brand">
                                <a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->slug]) }}">
                                    <img src="{{ asset('assets/images/uploads/'.$p->logo) }}" class="responsive-img" alt="">
                                </a>
                            </div>
                            <img class="activator" src="{{ asset('assets/images/uploads/'.$p->anuncio_cover) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $p->fantasia }}<i class="material-icons right">more_vert</i></span>
                            <p>
                                {{ str_limit($p->descricao, 65, '...') }}
                            </p>
                            <br>
                            {{--<p class="center">--}}
                                {{--<i class="material-icons yellow-text ">star</i>--}}
                                {{--<i class="material-icons yellow-text ">star</i>--}}
                                {{--<i class="material-icons yellow-text ">star</i>--}}
                                {{--<i class="material-icons yellow-text ">star</i>--}}
                                {{--<i class="material-icons yellow-text ">star</i>--}}
                            {{--</p>--}}
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $p->fantasia }}<i class="material-icons right">close</i></span>
                            <p>
                                {{ $p->descricao }}
                            </p>
                            <div class="row">
                                <div class="col m12">
                                    <a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->slug]) }}" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12">
                                    Tempo médio: <span class="green-text flow-text"> {{ $p->tempo_medio }}</span>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="col m12">--}}
                            {{--Valor médio: <span class="green-text flow-text"> R$ 00,90</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col m12">--}}
                            {{--Grau de Satisfação: <span class="green-text flow-text"> 86%</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@stop
@section('scripts')
    @parent
    <script>
        $(document).ready(function(){
            $('select').material_select();
        });
    </script>
    @stop