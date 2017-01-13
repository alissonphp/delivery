@extends('site.base')
@section('content')
    <div id="index-banner" class="parallax-container parallax-container-institucional valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row">
                    <div class="col m12">
                        <h3 class="flow-text big-flow">ANUNCIE CONOSCO</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax fadeOut"><img src="assets/images/restaurants/covers/sushimax.jpg" alt=""></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col m6 l6 s12">
                <p>text</p>
            </div>
            <div class="col m6 l6 s12">
                <p>text</p>
            </div>
        </div>
    </div>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col m6 l6 s12">
                <h5>Entre em contato conosco:</h5>
                <p>E-mail: <a href="mailto:contato@contato.com.br">contato@contato.com.br</a></p>
                <p>ou envie-nos uma mensagem preenchendo o formulário abaixo:</p>
                <form action="#">
                    <div class="input-field">
                        <input id="nome" type="text" class="validate">
                        <label for="nome">Seu nome:</label>
                    </div>
                    <div class="input-field">
                        <input id="email" type="email" class="validate">
                        <label for="email">Seu e-mail:</label>
                    </div>
                    <div class="input-field">
                        <input id="fone" type="text" class="validate">
                        <label for="fone">Telefone para contato:</label>
                    </div>
                    <div class="input-field">
                        <textarea name="msg" id="msg" rows="10" class="materialize-textarea"></textarea>
                        <label for="msg">Escreva-nos uma mensagem:</label>
                    </div>
                    <div class="input-field">
                        <button class="btn green col m12 s12 l12">enviar mensagem</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
@stop