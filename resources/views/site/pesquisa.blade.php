@extends('site.base')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.css') }}">
@stop
@section('content')
<form action="{{ action('Site\HomeController@getPesquisa') }}" method="get">
    <div class="container-fluid grey lighten-4 fixed">
        <div class="container">
            <div class="row search">
                <div class="input-field col l4 m4 s12">
                    <select name="e" style="width: 100%" class="especialidades-search form-control">
                        @if(isset($searchItens['e']) && $searchItens['e'] != "all")
                        <option value="all"> Todas especialidades... </option>
                        <option value="{{ $searchItens['e'] }}" selected> {{ $searchItens['e'] }}</option>
                        @else
                        <option value="all" selected> Todas especialidades... </option>
                        @endif
                        @foreach($data['especialidades'] as $e)
                            <option value="{{ $e->categoria }}">{{ $e->categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col l4 m4 s12">
                    <select name="pg" style="width: 100%" class="pagamento-search">
                        @if(isset($searchItens['pg']) && $searchItens['pg'] != "all")
                            <option value="all"> Todas as formas de pagamento... </option>
                            <option value="{{ $searchItens['pg'] }}" selected> {{ $searchItens['pg'] }}</option>
                        @else
                            <option value="all" selected>Todas as formas de pagamento... </option>
                        @endif
                        @foreach($payments as $p)
                            <option value="{{ $p->forma }}">{{ $p->forma }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field col l4 m4 s12">
                    <select name="b" style="width: 100%" class="bairros-search">
                        @if(isset($searchItens['b']) && $searchItens['b'] != "all")
                            <option value="all"> Todas os bairros... </option>
                            <option value="{{ $searchItens['b'] }}" selected> {{ $searchItens['b'] }}</option>
                        @else
                            <option value="all" selected> Todas os bairros... </option>
                        @endif
                        @foreach($bairros as $b)
                            <option value="{{ $b->bairro }}">{{ $b->bairro}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="input-field col l12 m12 s12">
                    <select name="q" style="width: 100%" class="restaurantes-search">
                        @if(isset($searchItens['q']) && $searchItens['q'] != "all")
                            <option value="all"> Todas empresas... </option>
                            <option value="{{ $searchItens['q'] }}" selected> {{ $searchItens['q'] }}</option>
                        @else
                            <option value="all" selected> Todas empresas... </option>
                        @endif
                        @foreach($empresas as $r)
                            <option value="{{ $r->fantasia}}">{{ $r->fantasia}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col l12 m12 s12">
                    <button class="btn green col l12 m12 s12"><i class="material-icons right">search</i> PESQUISAR EMPRESAS</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>Restaurantes encontrados: <small>({{ count($request) }} itens listados</small>)</h4>
            </div>
        </div>

        <div class="row">
            @foreach($request as $p)
                <div class="col l4 m6 s12">
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
                            <span class="card-title activator grey-text text-darken-4">{{ str_limit($p->fantasia,14) }}<i class="material-icons right">more_vert</i></span>
                            <p>
                                {{ str_limit($p->descricao, 58, '...') }}
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
                                    Tempo médio: <span class="green-text"> {{ $p->tempo_medio }}</span>
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
    <script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.especialidades-search').select2({
                placeholder: "Todas especialidades..."
            });
            $('.restaurantes-search').select2({
                placeholder: "Todas empresas..."
            });
            $('.bairros-search').select2({
                placeholder: "Todos os bairros..."
            });
            $('.pagamento-search').select2({
                placeholder: "Todas as forma de pagamento..."
            });
            $('select').material_select();
        });
    </script>
    @stop

