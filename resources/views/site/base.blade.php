<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Delivery</title>
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
                <img src="{{ asset('assets/images/logo/logo.png') }}" class="responsive-img" alt="" width="75">
            </a>
            <span class="slogan flow-text">Slogan | Delivery</span>
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
                <h5>Delivery:</h5>
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
                    @foreach(Footer::listCategories() as $e)
                    <li><a href="{{ action('Site\HomeController@getPesquisa')."?e=".$e->categoria }}" class="white-text">{{ $e->categoria }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col m3 s12">
                <h5>Nossos Destaques:</h5>
                <ul>
                    @foreach(Footer::premiumRestaurants() as $p)
                        <li><a href="{{ action('Site\HomeController@getRestaurante', ['slug' => $p->empresa->slug]) }}" class="white-text">{{ $p->empresa->fantasia }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col m3 s12">
                <h5>Acompanhe o Delivery:</h5>
                <ul>
                    <li>
                        <a href="" target="_blank" class="white-text social-icon"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                        <a href="#" class="white-text social-icon"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                        <a href="" target="_blank" title="@deliveryclube" class="white-text social-icon"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
                <h5>Contatos:</h5>
                <ul>
                    <li>
                        <a href="#" class="white-text">
                            contato@delivery</a>
                    </li>
                    <li>
                        <a href="#" class="white-text">
                            Endereço
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            <small>Copyright 2017. Delivery</small>
        </div>
    </div>
</footer>
@section('scripts')
<!-- Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79522701-1', 'auto');
    ga('send', 'pageview');

</script>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('assets/js/materialize.js') }}"></script>
<script src="{{ asset('assets/js/init.js') }}"></script>
@show
</body>
</html>