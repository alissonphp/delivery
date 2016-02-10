'use strict';

/**
 * @ngdoc overview
 * @name yapp
 * @description
 * # yapp
 *
 * Main module of the application.
 */
angular
    .module('yapp', [
        'ui.router',
        'ngAnimate',
        'ngStorage',
        'datatables'
    ])
    .config(function ($stateProvider, $urlRouterProvider) {

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
                templateUrl: "/app/views/cadastro/planos.html"
            });
    })
    .run(function(DTDefaultOptions){
        DTDefaultOptions.setLanguageSource('../../app/vendor/datatables/media/lang/Portuguese-Brasil.json');
    });

