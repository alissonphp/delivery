"use strict";
var app = angular.module("yapp", [
    "ui.router", "ngAnimate"
]);

    app.config(["$stateProvider", "$urlRouterProvider", function (r, t) {
    t.when("/dashboard", "/dashboard/overview"), t.otherwise("/login"), r.state("base", {
        "abstract": !0,
        url: "",
        templateUrl: "/app/views/base.html"
    }).state("login", {
        url: "/login",
        parent: "base",
        templateUrl: "/app/views/login.html",
        controller: "LoginCtrl"
    }).state("dashboard", {
        url: "/dashboard",
        parent: "base",
        templateUrl: "/app/views/dashboard.html",
        controller: "DashboardCtrl"
    }).state("overview", {
        url: "/overview",
        parent: "dashboard",
        templateUrl: "/app/views/dashboard/overview.html"
    }).state("cadastros", {
        url: "/cadastros",
        parent: "dashboard",
        templateUrl: "/app/views/dashboard/cadastro.html"
    }).state("planos", {
        url: "/cadastro/planos",
        parent: "dashboard",
        templateUrl: "/app/views/cadastro/planos.html"
    })
}]),
        app.controller("LoginCtrl", ["$scope", "$location", function (r, t) {
        r.submit = function () {
            return t.path("/dashboard"), !1
        }
    }]),
        app.controller("DashboardCtrl", ["$scope", "$state", function (r, t) {
    r.$state = t
}]);