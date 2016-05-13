<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Delivery Clube</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/animate.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div class="navbar-fixed">
    <nav class="red darken-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo">
                <img src="assets/images/logo/primary-logo-png-transp-mini-header.png" alt="">
            </a>
            <span class="slogan flow-text">Seu guia de delivery em São Luís</span>
            <ul class="right hide-on-med-and-down">
                <li><a href="#" class="white-text">Sobre</a></li>
                <li><a href="#" class="white-text">Anuncie</a></li>
                <li><a href="#" class="white-text">Contato</a></li>
                <li><a href="#" class="white-text">Entrar/Cadastrar</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Anuncie</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Entrar/Cadastrar</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>

<div id="index-banner" class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col m10 offset-m1 valign back-transp search-tools animated fadeInRight">
                    <div class="row">
                        <div class="col m12">
                            <h4 class="bordered header center white-text text-lighten-2">Pesquise e monte o seu pedido :)</h4>
                        </div>
                    </div>
                    <div class="row center">
                        <div class="col m3">
                            <a href="#" class="white-text">
                                <div class="bt-search">
                                    <i class="material-icons big">list</i>
                                    <p>Especialidades</p>
                                </div>
                            </a>
                        </div>
                        <div class="col m3">
                            <a href="#" class="white-text">
                                <i class="material-icons big">restaurant</i>
                                <p>Restaurantes</p>
                            </a>
                        </div>
                        <div class="col m3">
                            <a href="#" class="white-text">
                                <i class="material-icons big">star</i>
                                <p>Mais Avaliados</p>
                            </a>
                        </div>
                        <div class="col m3">
                            <a href="#" class="white-text">
                                <i class="material-icons big">place</i>
                                <p>Bairros de Entrega</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="search-especialidades" class="col m10 offset-m1 back-transp search-item">
                    <div class="close-box">
                        <i class="material-icons" title="Voltar">backspace</i>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <h4 class="header white-text text-lighten-2"> Especialidades</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            @foreach($categorias as $c)
                                <h6>{{ $c->categoria }}</h6>
                            @endforeach
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
                            <img src="assets/images/uploads/{{ $p->empresa->imagens['logo'] }}" class="responsive-img" alt="">
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
                                <a href="#" class="btn white col m12 red-text text-darken-3"> Cardápio Completo </a>
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

<div class="parallax-container timeline valign-wrapper">
    <!--<div class="section no-pad-bot">-->
    <!--<div class="container">-->
    <!--<div class="row center">-->
    <!--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <div class="parallax">
        <img src="assets/images/logo/timeline1.png" alt="Unsplashed background img 2">
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


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="assets/js/materialize.js"></script>
<script src="assets/js/init.js"></script>

</body>
</html>