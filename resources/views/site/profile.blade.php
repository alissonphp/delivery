@extends('site.base')
@section('content')
<div id="index-banner" class="parallax-container parallax-container-profile valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col m12 valign animated fadeInRight">
                    <div class="row valign-wrapper">
                        <div class="col l2 m2 s2 hide-on-small-only center">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/uploads/')."/".$empresa->imagens['logo'] }}" class="responsive-img valign" alt="">
                            </div>
                        </div>
                        <div class="col l8 m12 s12">
                            <div class="brand-infos">
                                <div class="row">
                                    <div class="col m12">
                                        <h4>{{ $empresa->fantasia }}</h4>
                                        <p>{{ $empresa->descricao }}</p>
                                    </div>
                                    <div class="col m12">
                                        <div class="row reviews">
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>{{ $empresa->tempo_medio }}</p>
                                                    <p class="legend">tempo de entrega</p>
                                                </div>
                                            </div>
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>R$ {{ $empresa->taxa_entrega }}</p>
                                                    <p class="legend">taxa de entrega</p>
                                                </div>
                                            </div>
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>
                                                       R$ {{ number_format($empresa->pedido_medio,2,",",".") }}
                                                    </p>
                                                    <p class="legend">pedido médio</p>
                                                </div>
                                            </div>
                                            <div class="col m3">
                                                <div class="">
                                                    <a href="#" title="ABERTO" class="btn btn-floating green">
                                                        <i class="material-icons white-text">alarm_on</i>
                                                    </a>
                                                    <a href="#" title="Formas de Pagamento" class="btn btn-floating white">
                                                        <i class="material-icons red-text">credit_card</i>
                                                    </a>
                                                    <a href="#" title="Bairros de Entrega" class="btn btn-floating white">
                                                        <i class="material-icons red-text">place</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l2 m12 s12">
                            <p><i class="material-icons left">group</i> Avaliações:</p>
                            <p class="yellow-text">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <span class="right score">4,5</span>
                            </p>
                            <p class="legend">comida <span class="new badge">5</span></p>
                            <p class="legend">tempo de entrega <span class="new badge">4</span></p>
                            <p class="legend">embalagem <span class="new badge">5</span></p>
                            <p class="legend">custo/benefício <span class="new badge">4</span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax fadeOut"><img src="{{ asset('assets/images/uploads/')."/".$empresa->imagens['anuncio_banner'] }}" alt=""></div>
</div>

<div class="container" ng-app="simulateApp">
    <div class="section" ng-controller="MainController">
        <div class="row" ng-init="getCardapio({{ $empresa->id }})">
            <div class="col m8">
                <div class="row">
                    <div class="col m12">
                        <h3>Cardápio</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col m4 s12">
                        <br>
                        <a class='dropdown-button btn col s12 grey lighten-3 black-text' href='#' data-activates='dropdown1'>
                            <i class="material-icons left">restaurant</i> Seções do cardápio
                        </a>

                        <ul id='dropdown1' class='dropdown-content'>
                            <li ng-repeat="cardapio in cardapios | orderBy: 'rotulo'">
                                <a href="#<% cardapio.rotulo %>"><% cardapio.rotulo %></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col m8 s12">
                        <div class="input-field col s12">
                            <input placeholder="" class="col s12 m12" ng-model="filterCardapio" type="text" class="validate">
                            <label for="first_name">Pequisar item no cardápio </label>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="filterCardapio">
                    <div class="col m12">
                        <h6> <i class="material-icons left">search</i> Filtrando por: <% filterCardapio %></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12 s12 cardapio">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li ng-repeat="cardapio in cardapios | filter: {itens: {item: filterCardapio}} | orderBy: 'rotulo'">
                                <div id="<% cardapio.rotulo %>" class="collapsible-header scrollspy"><% cardapio.rotulo %></div>
                                <div class="collapsible-body">
                                    <div class="row" ng-repeat="item in cardapio.itens | filter: {item: filterCardapio}">
                                        <div class="col m8">
                                            <p class="item"><% item.item %></p>
                                            <p class="description"><% item.descricao %></p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price"><% item.preco | currency : "R$ " %><i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col m4">
                <div class="simulate">
                    <div class="row">
                        <div class="col m12">
                            <h5><i class="material-icons left">shopping_basket</i> Simule seu pedido:</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <table class="striped">
                                <tr>
                                    <td><i class="material-icons tiny red-text left">cancel</i></td>
                                    <td>04</td>
                                    <td>Sushi Tradicional</td>
                                    <td>6,00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12 right-align">
                            <h5>R$ 48,00</h5>
                        </div>
                        <div class="col m12 right-align">
                            <h6>+ taxa de entrega: R$ 6,00</h6>
                        </div>
                        <div class="col m12 right-align">
                            <h5>Total a pagar: <span class="green white-text totalCost"> R$ 54,00</span></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <a href="tel:{{$empresa->telefone_delivery}}" class="btn btn-large red col m12"><i class="material-icons left">perm_phone_msg</i>Fazer pedido: {{$empresa->telefone_delivery}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
    @parent
    <script src="{{ asset('app/vendor/angular/angular.min.js') }}"></script>
    <script src="{{ asset('app/vendor/angular/angular-locale_pt-br.js') }}"></script>
    <script src="{{ asset('app/vendor/angular/ngStorage.min.js') }}"></script>
    <script src="{{ asset('app/vendor/notify/ng-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/simulate/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".dropdown-button").click(function(e) {
               console.log(this);
            });
            $('.collapsible').collapsible({
                accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
            $('.simulate').pushpin({
                top: $('.simulate').offset().top,
                offset: 100,
            });
            $('select').material_select();
        });
    </script>
    @stop