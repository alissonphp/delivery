/**
 * RouteProvider config
 * Created by alisson on 10/02/16.
 */
ctrlApp.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.when('/dashboard', '/dashboard/overview');
    $urlRouterProvider.otherwise('/login');

    $stateProvider
        .state('base', {
            abstract: true,
            url: '',
            templateUrl: "/app/views/base.html"
        })
        .state('login', {
            url: '/login',
            parent: 'base',
            templateUrl: '/app/views/login.html',
            controller: 'LoginCtrl'
        })
        .state('dashboard', {
            url: '/dashboard',
            parent: 'base',
            templateUrl: '/app/views/dashboard.html',
            controller: 'DashboardCtrl'
        })
        .state('overview', {
            url: '/overview',
            parent: 'dashboard',
            templateUrl: '/app/views/dashboard/overview.html'
        })
        .state('reports', {
            url: '/reports',
            parent: 'dashboard',
            templateUrl: '/app/views/dashboard/reports.html'
        })
        .state("cadastros", {
            url: "/cadastros",
            parent: "dashboard",
            templateUrl: "/app/views/dashboard/cadastro.html"
        })
        .state("planos", {
            url: "/cadastro/planos",
            parent: "dashboard",
            templateUrl: "/app/views/plano/index.html",
            controller: "PlanoCtrl"
        })
        .state("novoPlano", {
            url: "/cadastro/planos/novo",
            parent: "dashboard",
            templateUrl: "/app/views/plano/create.html",
            controller: "PlanoCtrl"
        })
        .state("alterarPlano", {
            url: "/cadastro/planos/alterar/:id",
            parent: "dashboard",
            templateUrl: "/app/views/plano/update.html",
            controller: "PlanoCtrl"
        })
        .state("empresas", {
            url: "/cadastros/empresas",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/index.html",
            controller: "EmpresaCtrl"
        })
        .state("novaEmpresa", {
            url: "/cadastros/empresas/novo",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/create.html",
            controller: "EmpresaCtrl"
        })
        .state("imgsEmpresa", {
            url: "/cadastros/empresas/images/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/images.html",
            controller: "EmpresaCtrl"
        })
        .state("empresaAdicional", {
            url: "/cadastros/empresas/adicional/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/create-infos.html",
            controller: "EmpresaCtrl"
        })
        .state("empresaCardapio", {
            url: "/cadastros/empresas/cardapios/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/cardapio/index.html",
            controller: "CardapioCtrl"
        })
        .state("itensCardapio", {
            url: "/cadastros/empresas/itens/cardapio/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/cardapio/itens.html",
            controller: "CardapioCtrl"
        })
        .state("insertItens", {
            url: "/cadastros/empresas/cardapio/itens/inserir/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/cardapio/insert-itens.html",
            controller: "CardapioCtrl"
        })
        .state("alterarEmpresa", {
            url: "/cadastros/empresas/alterar/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/update.html",
            controller: "EmpresaCtrl"
        })
        .state("infosEmpresa", {
            url: "/cadastros/empresas/infos/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/infos.html",
            controller: "EmpresaCtrl"
        });
});