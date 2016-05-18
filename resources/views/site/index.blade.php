@extends('site.base')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.css') }}">
    @stop
@section('content')
<div id="index-banner" class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col m10 offset-m1 valign back-transp search-tools animated fadeInRight">
                    <div class="row">
                        <div class="col m12">
                            <h4 class="bordered header center white-text text-lighten-2">Pesquise e simule o seu pedido :)</h4>
                        </div>
                    </div>
                    <div class="row center">
                        <div class="col m3 s12">
                            <a href="#search-especialidades" class="white-text">
                                <div class="bt-search">
                                    <i class="material-icons big">list</i>
                                    <p>Especialidades</p>
                                </div>
                            </a>
                        </div>
                        <div class="col m3 s12">
                            <a href="#search-restaurantes" class="white-text">
                                <div class="bt-search">
                                    <i class="material-icons big">restaurant</i>
                                    <p>Restaurantes</p>
                                </div>
                            </a>
                        </div>
                        <div class="col m3 s12">
                            <a href="#search-avaliados" class="white-text">
                                <div class="bt-search">
                                    <i class="material-icons big">star</i>
                                    <p>Mais Avaliados</p>
                                </div>
                            </a>
                        </div>
                        <div class="col m3 s12">
                            <a href="#search-bairros" class="white-text">
                                <div class="bt-search">
                                    <i class="material-icons big">place</i>
                                    <p>Bairros de Entrega</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="search-especialidades" class="col m10 s12 offset-m1 valign back-transp search-item">
                    <div class="close-box">
                        <i class="material-icons" title="Voltar">backspace</i>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <h4 class="header white-text text-lighten-2"> Especialidades</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <div class="form-group">
                                <select style="width: 100%" class="especialidades-search">
                                    <option value="" selected> Selecione uma especialidade... </option>
                                    @foreach($categorias as $c)
                                        <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <button class="btn btn-large green col m12 s12">PESQUISAR RESTAURANTES <i class="material-icons right">search</i></button>
                        </div>
                    </div>
                </div>

                <div id="search-restaurantes" class="col m10 s12 offset-m1 valign back-transp search-item">
                    <div class="close-box">
                        <i class="material-icons" title="Voltar">backspace</i>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <h4 class="header white-text text-lighten-2"> Restaurantes</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <div class="form-group">
                                <select style="width: 100%" class="restaurantes-search">
                                    <option value="" selected> Pesquise por um restaurante... </option>
                                    @foreach($restaurantes as $r)
                                        <option value="{{ $r->id }}">{{ $r->fantasia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <button class="btn btn-large green col m12 s12">PESQUISAR RESTAURANTES <i class="material-icons right">search</i></button>
                        </div>
                    </div>
                </div>

                <div id="search-avaliados" class="col m10 s12 offset-m1 valign back-transp search-item">
                    <div class="close-box">
                        <i class="material-icons" title="Voltar">backspace</i>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <h4 class="header white-text text-lighten-2"> Mais Avaliados</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <p>Estamos coletando avaliações dos restaurantes! Em breve você poderá pesquisar pelos mais bem avaliados do Delivery Clube.</p>
                        </div>
                    </div>
                </div>

                <div id="search-bairros" class="col m10 s12 offset-m1 valign back-transp search-item">
                    <div class="close-box">
                        <i class="material-icons" title="Voltar">backspace</i>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <h4 class="header white-text text-lighten-2"> Bairros de Entrega</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <div class="form-group">
                                <select style="width: 100%" class="bairros-search">
                                    <option value="" selected> Informe o bairro de entrega... </option>
                                    @foreach($bairros as $b)
                                        <option value="{{ $b->id }}">{{ $b->bairro}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 s12">
                            <button class="btn btn-large green col m12 s12">PESQUISAR RESTAURANTES <i class="material-icons right">search</i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="parallax"><img src="assets/images/backgrounds/home1.jpg" alt="Unsplashed background img 1"></div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center red-text"><i class="material-icons">search</i></h2>
                    <h5 class="center">Pesquise</h5>

                    <p class="light">Navegue por especialidades, restaurantes, bairros disponíveis para delivery, preços, avaliações. Entre e fique a vontade.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center red-text"><i class="material-icons">pan_tool</i></h2>
                    <h5 class="center">Simule seu pedido</h5>

                    <p class="light">Selecione os itens diretamente dos cardápios do restaurante e monte seu pedido completo. Você acompanha o total e o tempo previsto para entrega</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center red-text"><i class="material-icons">done_all</i></h2>
                    <h5 class="center">Enviar solicitação</h5>

                    <p class="light">Tudo pronto? Agora é só enviar o seu pedido para o resturante (via telefone) e aguardar. Não esqueça de avaliar o restaurante, ajuda bastante. </p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row grey lighten-4">
    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>Restaurantes <span class="flow-text red-text text-darken-3">PREMIUM DELIVERY</span></h4>
            </div>
        </div>
        <div class="row">
            @foreach($empresasPremium as $p)
            <div class="col m4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <div class="rest-brand">
                            <a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->empresa->slug]) }}">
                                <img src="assets/images/uploads/{{ $p->empresa->imagens['logo'] }}" class="responsive-img" alt="">
                            </a>
                        </div>
                        <img class="activator" src="assets/images/uploads/{{ $p->empresa->imagens['anuncio_cover'] }}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{ $p->empresa->fantasia }}<i class="material-icons right">more_vert</i></span>
                        <p>
                            {{ str_limit($p->empresa->descricao, 65, '...') }}
                        </p>
                        <br>
                        <p class="center">
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{ $p->empresa->fantasia }}<i class="material-icons right">close</i></span>
                        <p>
                            {{ $p->empresa->descricao }}
                        </p>
                        <div class="row">
                            <div class="col m12">
                                <a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->empresa->slug]) }}" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> {{ $p->empresa->tempo_medio }}</span>
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
<div class="parallax-container valign-wrapper">
    <!--<div class="section no-pad-bot">-->
    <!--<div class="container">-->
    <!--<div class="row center">-->
    <!--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <div class="parallax">
        <img src="{{ asset('assets/images/backgrounds/tutorial.png')  }}" alt="Passo a passo">
    </div>
</div>

<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>Contact Us</h4>
                <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
            </div>
        </div>

    </div>
</div>
@stop
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.especialidades-search').select2({
                placeholder: "Selecione uma especialidade..."
            });
            $('.restaurantes-search').select2({
                placeholder: "Digite um nome de restaurante..."
            });
            $('.bairros-search').select2({
                placeholder: "Informe o bairro de entrega..."
            });
        });
    </script>
    @stop