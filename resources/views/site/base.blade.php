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
    <link href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet"/>
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
                <li><a href="#" class="white-text">Entrar/Cadastrar</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{ action('Site\HomeController@getIndex') }}">Home</a></li>
                <li><a href="{{ action('Site\HomeController@getSobre') }}">Sobre</a></li>
                <li><a href="{{ action('Site\HomeController@getAnuncie') }}">Anuncie</a></li>
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
            <div class="col m3 s12">
                <h5>Delivery Clube:</h5>
                <ul>
                    <li><a class="white-text" href="{{ action('Site\HomeController@getSobre') }}">Sobre</a></li>
                    <li><a class="white-text" href="{{ action('Site\HomeController@getAnuncie') }}">Anuncie</a></li>
                    <li><a class="white-text" href="#">Cadastro</a></li>
                    <li><a class="white-text" href="#">Revista Digital</a></li>
                </ul>
            </div>
            <div class="col m3 s12">
                <h5>Especialidades:</h5>
                <ul>
                    @foreach($data['especialidades'] as $e)
                    <li><a href="{{ action('Site\HomeController@getPesquisa')."?e=".$e->categoria }}" class="white-text">{{ $e->categoria }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col m3 s12">
                <h5>Nossos Destaques:</h5>
                <ul>
                    @foreach($data['premium'] as $p)
                        <li><a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->empresa->slug]) }}" class="white-text">{{ $p->empresa->fantasia }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col m3 s12">
                <h5>Acompanhe o Delivery:</h5>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/DeliveryClube/" target="_blank" class="white-text social-icon"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                        <a href="#" class="white-text social-icon"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/deliveryclube/" target="_blank" title="@deliveryclube" class="white-text social-icon"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
                <h5>Contatos:</h5>
                <ul>
                    <li>
                        <a href="#" class="white-text">
                            contato@deliveryclube</a>
                    </li>
                    <li>
                        <a href="#" class="white-text">
                            Rua 04, QD D, N° 06, Residencial Araras - Cohama
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            <small>Copyright 2016. Delivery Clube</small>
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