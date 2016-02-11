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
        });
});