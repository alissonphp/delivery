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
                                <img src="assets/images/restaurants/logos/logo_sushimax_new.png" class="responsive-img valign" alt="">
                            </div>
                        </div>
                        <div class="col l8 m12 s12">
                            <div class="brand-infos">
                                <div class="row">
                                    <div class="col m12">
                                        <h4>Sushimax</h4>
                                        <p>O SushiMax é a primeira casa especializada em delivery de comida japonesa do Maranhão.
                                            Prezamos pela qualidade e rapidez na entrega, com um preço atrativo.</p>
                                    </div>
                                    <div class="col m12">
                                        <div class="row reviews">
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>30 ~ 45 mins</p>
                                                    <p class="legend">tempo de entrega</p>
                                                </div>
                                            </div>
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>R$ 8,00</p>
                                                    <p class="legend">taxa de entrega</p>
                                                </div>
                                            </div>
                                            <div class="col m3">
                                                <div class="context">
                                                    <p>
                                                        <i class="tiny material-icons">attach_money</i>
                                                        <i class="tiny material-icons">attach_money</i>
                                                        <i class="tiny material-icons">attach_money</i>
                                                        <i class="tiny material-icons grey-text text-darken-2">attach_money</i>
                                                        <i class="tiny material-icons grey-text text-darken-2">attach_money</i>
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
    <div class="parallax fadeOut"><img src="assets/images/restaurants/covers/sushimax.jpg" alt=""></div>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <div class="col m8">
                <div class="row">
                    <div class="col m12">
                        <h3>Cardápio</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col m4">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Selecione...</option>
                                <option value="1">Peças</option>
                                <option value="2">Pratos Especiais</option>
                                <option value="3">Bebidas</option>
                                <option value="3">Sobremesas</option>
                                <option value="3">Grelhados</option>
                                <option value="3">Molhos</option>
                            </select>
                            <label>Seção do cardápio:</label>
                        </div>
                    </div>
                    <div class="col m8">
                        <div class="input-field col s12">
                            <input placeholder="" id="first_name" type="text" class="validate">
                            <label for="first_name">Pequisar item no cardápio </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12 cardapio">
                        <ul class="collapsible" data-collapsible="expandable">
                            <li>
                                <div class="collapsible-header active">Peças</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header active">Pratos Especiais</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header active">Bebidas</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header active">Sobremesas</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header active">Grelhados</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header active">Molhos</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m8">
                                            <p class="item">Sushi Tradicional (50g)</p>
                                            <p class="description">arroz, alga, salmão fresco (30g), legumes</p>
                                        </div>
                                        <div class="col m4 right-align">
                                            <p class="price">R$ 1,50 <i class="material-icons small right green-text">add_circle</i></p>
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
                                <tr>
                                    <td><i class="material-icons tiny red-text left">cancel</i></td>
                                    <td>03</td>
                                    <td>Hot California (sem creeam cheese)</td>
                                    <td>12,00</td>
                                </tr>
                                <tr>
                                    <td><i class="material-icons tiny red-text left">cancel</i></td>
                                    <td>02</td>
                                    <td>Peito de Frango Grelhado</td>
                                    <td>16,00</td>
                                </tr>
                                <tr>
                                    <td><i class="material-icons tiny red-text left">cancel</i></td>
                                    <td>02</td>
                                    <td>Coca-cola Zero (lata)</td>
                                    <td>10,00</td>
                                </tr>
                                <tr>
                                    <td><i class="material-icons tiny red-text left">cancel</i></td>
                                    <td>01</td>
                                    <td>Molho/Geléia de Pimenta</td>
                                    <td>4,00</td>
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
                            <a href="tel:+559832199998" class="btn btn-large red col m12"><i class="material-icons left">perm_phone_msg</i>Fazer pedido: (98) 3213-8880</a>
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
    <script>
        $(document).ready(function(){
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