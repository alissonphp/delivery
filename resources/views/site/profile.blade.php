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
                                                    @if($aberto)
                                                    <a href="#" title="ABERTO" class="btn btn-floating green">
                                                        <i class="material-icons white-text">alarm_on</i>
                                                    </a>
                                                    @else
                                                        <a href="#" title="FECHADO" class="btn btn-floating red">
                                                            <i class="material-icons white-text">alarm_off</i>
                                                        </a>
                                                    @endif
                                                    <a href="#pagamentos" title="Formas de Pagamento" class="btn btn-floating white modal-trigger">
                                                        <i class="material-icons red-text">credit_card</i>
                                                    </a>
                                                    <a href="#bairros" title="Bairros de Entrega" class="btn btn-floating white modal-trigger">
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
                    <div class="col l4 m6 s12">
                        <br>
                        <a class='dropdown-button btn col s12 m12 l12 grey lighten-3 black-text' href='#' data-activates='dropdown1'>
                            <i class="material-icons left">restaurant</i> Cardápio
                        </a>

                        <ul id='dropdown1' class='dropdown-content'>
                            <li class="section-item" ng-repeat="cardapio in cardapios | orderBy: 'rotulo'">
                                <a href="#<% cardapio.rotulo %>"><% cardapio.rotulo %></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l8 m6 s12">
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
                                        <div ng-if="item.categoria == 'Comum'">
                                            <div class="col m8">
                                                <p class="item"><% item.item %></p>
                                                <p class="description"><% item.descricao %></p>
                                            </div>
                                            <div class="col m4 right-align">
                                                <p class="price"><% item.preco | currency : "R$ " %>
                                                    <a href="javascript:void(0);" ng-click="addItem(item.item, 1, item.preco)"><i class="material-icons small right green-text">add_circle</i></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div ng-if="item.categoria == 'Pizza'">
                                            <div class="col m12">
                                                <br>
                                                <% pizza[cardapio.id] %>
                                                <div class="row">
                                                    <div class="col m12">
                                                        <h5>1. Selecione o tamanho/tipo:</h5>
                                                    </div>
                                                    <div class="col m12" ng-init="tamanhos = parseComposicao(item).tamanhos">
                                                        <ul>
                                                            <li ng-repeat="t in tamanhos">
                                                                <input type="radio" name="tamanho" ng-model="pizza[cardapio.id].tamanho" id="<%t.tamanho%>" ng-value="t">
                                                                <label for="<%t.tamanho%>"><%t.tamanho%> <span nf-if="t.sabor">(<%t.sabor%> sabores)</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row" ng-if="pizza[cardapio.id].tamanho">
                                                    <div class="col m12">
                                                        <h5>2. Selecione a massa:</h5>
                                                    </div>
                                                    <div class="col m12" ng-init="tipos = parseComposicao(item).tipos">
                                                        <ul>
                                                            <li ng-repeat="tipo in tipos">
                                                                <input type="radio" name="tipo" ng-model="pizza[cardapio.id].tipo" id="<%tipo.tipo%>" ng-value="tipo.tipo">
                                                                <label for="<%tipo.tipo%>"><%tipo.tipo%></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row" ng-if="pizza[cardapio.id].tipo">
                                                    <div class="col m12">
                                                        <h5>3. Escolha o(s) sabor(es):</h5>
                                                    </div>
                                                    <div class="col m12" ng-init="sabores = parseComposicao(item).sabores">
                                                        <div class="row" ng-repeat="s in sabores">
                                                            <div class="col m8">
                                                                <p class="item" ng-if="pizza[cardapio.id].tamanho.sabor == 2">1/2 <%s.sabor%></p>
                                                                <p class="item" ng-if="pizza[cardapio.id].tamanho.sabor != 2"><%s.sabor%></p>
                                                                <p class="description"><%s.descricao%></p>
                                                            </div>
                                                            <div class="col m4 right-align" ng-repeat="(tam, preco) in s.preco|searchKey:pizza[cardapio.id].tamanho.tamanho">
                                                                <p class="price" ng-if="pizza[cardapio.id].tamanho.sabor == 2"><% preco/2 | currency : "R$ " %>
                                                                    <a href="javascript:void(0);" ng-click="addItem('1/2 '+s.sabor+'('+pizza[cardapio.id].tamanho.tamanho+')', 1, preco/2)"><i class="material-icons small right green-text">add_circle</i></a>
                                                                </p>
                                                                <p class="price" ng-if="pizza[cardapio.id].tamanho.sabor != 2"><% preco | currency : "R$ " %>
                                                                    <a href="javascript:void(0);" ng-click="addItem(s.sabor+'('+pizza[cardapio.id].tamanho.tamanho+')', 1, preco)"><i class="material-icons small right green-text">add_circle</i></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                            <table class="striped" ng-show="pedido.length > 0">
                                <tr ng-repeat="item in pedido">
                                    <td>
                                        <a href="javascript:void(0);" ng-click="addQtd(item)"><i class="material-icons tiny green-text">add_circle</i></a>
                                        <a href="javascript:void(0);" ng-show="item.qtd > 1" ng-click="removeQtd(item)"><i class="material-icons tiny blue-text">remove_circle</i></a>
                                        <a href="javascript:void(0);" ng-click="removeItem($index)"><i class="material-icons tiny red-text">cancel</i></a>
                                    </td>
                                    <td><% item.qtd %></td>
                                    <td><% item.rotulo %></td>
                                    <td><% item.total | currency %></td>
                                </tr>
                            </table>
                            <h6 ng-show="pedido.length === 0">Você ainda não selecionou itens para o seu pedido!</h6>
                        </div>
                    </div>
                    <div class="row" ng-show="pedido.length > 0">
                        <div class="col m12 right-align" ng-if="taxaEntrega != 0.00" ng-init="getTaxaEntrega({{ $empresa->id  }})">
                            <h6>+ taxa de entrega: <% taxaEntrega | currency %></h6>
                        </div>
                        <div class="col m12 right-align">
                            <h5>Total a pagar: <span class="green white-text totalCost"> <% getTotal() | currency %></span></h5>
                        </div>
                    </div>
                    <div class="row" ng-show="pedido.length > 0">
                        <div class="col m12">
                            <a href="tel:{{$empresa->telefone_delivery}}" class="btn btn-large red col m12"><i class="material-icons left">perm_phone_msg</i>Fazer pedido: {{$empresa->telefone_delivery}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="pagamentos" class="modal">
    <div class="modal-content">
        <h4>Formas de Pagamento</h4>
        <ul>
            @foreach($empresa->pagamentos as $p)
                <li>{{ $p->forma }}</li>
            @endforeach
        </ul>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>

<div id="bairros" class="modal">
    <div class="modal-content">
        <h4>Bairros de entrega</h4>
        <ul>
            @foreach($empresa->bairros as $b)
                <li>{{ $b->bairro }}</li>
            @endforeach
        </ul>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
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
            $('.modal-trigger').leanModal();
            $(".section-item").click(function(e) {
                e.preventDefault();
                var target = $(this).attr('href');
                $('body').scrollTo(target);
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