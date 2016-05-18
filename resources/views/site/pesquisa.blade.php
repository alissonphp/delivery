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
                <h4>Restaurantes Abertos <div class="chip green white-text">8</div></h4>
            </div>
        </div>

        <div class="row">
            <div class="col l3 m3 s12">
                <div class="card hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/restaurants/pizzahut1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Pizza Hut<i class="material-icons right">more_vert</i></span>
                        <p>
                            A excelência em pizzas, lasanhas e massas em geral. Confira!
                        </p>
                        <br>
                        <p class="center">
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Pizza Hut<i class="material-icons right">close</i></span>
                        <p>Confira nosso menu de massas completo. Além de pizzas doces especiais, sucos e muito mais.</p>
                        <div class="row">
                            <div class="col m12">
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> 35 min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Valor médio: <span class="green-text flow-text"> R$ 39,90</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Grau de Satisfação: <span class="green-text flow-text"> 86%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m3 s12">
                <div class="card hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/restaurants/taipan.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Taipan<i class="material-icons right">more_vert</i></span>
                        <p>
                            Comidas típicas japonesas. Sushi, sashimi, frangos, grelhados, etc.
                        </p>
                        <br>
                        <p class="center">
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                            <i class="material-icons yellow-text ">star</i>
                        </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Pizza Hut<i class="material-icons right">close</i></span>
                        <p>Confira nosso menu de massas completo. Além de pizzas doces especiais, sucos e muito mais.</p>
                        <div class="row">
                            <div class="col m12">
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> 35 min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Valor médio: <span class="green-text flow-text"> R$ 39,90</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Grau de Satisfação: <span class="green-text flow-text"> 86%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m3 s12">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/restaurants/giraffas.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Giraffas<i class="material-icons right">more_vert</i></span>
                        <p>
                            Semana especial! Na compra do GIRAKIDS você ganha um brinde!
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
                        <span class="card-title grey-text text-darken-4">Pizza Hut<i class="material-icons right">close</i></span>
                        <p>Confira nosso menu de massas completo. Além de pizzas doces especiais, sucos e muito mais.</p>
                        <div class="row">
                            <div class="col m12">
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> 35 min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Valor médio: <span class="green-text flow-text"> R$ 39,90</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Grau de Satisfação: <span class="green-text flow-text"> 86%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m3 s12">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/restaurants/giraffas.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Giraffas<i class="material-icons right">more_vert</i></span>
                        <p>
                            Semana especial! Na compra do GIRAKIDS você ganha um brinde!
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
                        <span class="card-title grey-text text-darken-4">Pizza Hut<i class="material-icons right">close</i></span>
                        <p>Confira nosso menu de massas completo. Além de pizzas doces especiais, sucos e muito mais.</p>
                        <div class="row">
                            <div class="col m12">
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> 35 min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Valor médio: <span class="green-text flow-text"> R$ 39,90</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Grau de Satisfação: <span class="green-text flow-text"> 86%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m3 s12">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/restaurants/giraffas.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Giraffas<i class="material-icons right">more_vert</i></span>
                        <p>
                            Semana especial! Na compra do GIRAKIDS você ganha um brinde!
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
                        <span class="card-title grey-text text-darken-4">Pizza Hut<i class="material-icons right">close</i></span>
                        <p>Confira nosso menu de massas completo. Além de pizzas doces especiais, sucos e muito mais.</p>
                        <div class="row">
                            <div class="col m12">
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Tempo médio: <span class="green-text flow-text"> 35 min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Valor médio: <span class="green-text flow-text"> R$ 39,90</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                Grau de Satisfação: <span class="green-text flow-text"> 86%</span>
                            </div>
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
            $('select').material_select();
        });
    </script>
    @stop