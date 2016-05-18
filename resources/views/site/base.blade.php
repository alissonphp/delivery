<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Delivery Clube</title>
    <!-- CSS  -->
    @section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('assets/css/animate.css') }}" type="text/css" rel="stylesheet"/>
    @show
</head>
<body>
<div class="navbar-fixed">
    <nav class="red darken-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ action('Site\HomeController@getIndex') }}" class="brand-logo">
                <img src="{{ asset('assets/images/logo/primary-logo-png-transp-mini-header.png') }}" alt="">
            </a>
            <span class="slogan flow-text">Seu guia de delivery em São Luís</span>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ action('Site\HomeController@getSobre') }}" class="white-text">Sobre</a></li>
                <li><a href="{{ action('Site\HomeController@getAnuncie') }}" class="white-text">Anuncie</a></li>
                <li><a href="#" class="white-text">Contato</a></li>
                <li><a href="#" class="white-text">Entrar/Cadastrar</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{ action('Site\HomeController@getSobre') }}">Sobre</a></li>
                <li><a href="{{ action('Site\HomeController@getAnuncie') }}">Anuncie</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Entrar/Cadastrar</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
{{--Page content--}}
@yield('content')
{{--End page content--}}
<footer class="page-footer red darken-1 white-text">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="">Delivery Clube</h5>
                <p>
                    O Delivery Clube nasceu em 2014, após a necessidade de se comer algo diferente, além da
                    tradicional pizza, no conforto do lar.
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Sobre</h5>
                <ul>
                    <li><a class="white-text" href="#!">Conheça o Delivery Clube</a></li>
                    <li><a class="white-text" href="#!">Anuncie Conosco</a></li>
                    <li><a class="white-text" href="#!">Entre em contato</a></li>
                    <li><a class="white-text" href="#!">Cadastrar/Entrar</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Contato</h5>
                <ul>
                    <li><a class="white-text" href="#!">(98) 3221-5544</a></li>
                    <li><a class="white-text" href="#!">contato@deliveryclube.com.br</a></li>
                    <li><a class="white-text" href="#!">Av. Central N 541 - Coahama, São Luís - MA</a></li>
                    <li><a class="white-text" href="#!">CEP: 65055-445</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Copyright 2016. Delivery Clube
        </div>
    </div>
</footer>
@section('scripts')
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('assets/js/materialize.js') }}"></script>
<script src="{{ asset('assets/js/init.js') }}"></script>
@show
</body>
</html>