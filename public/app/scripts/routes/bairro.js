ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("bairros", {
            url: "/bairros/",
            parent: "dashboard",
            templateUrl: "/app/views/bairro/index.html",
            controller: "BairroCtrl"
        })
        .state("novoBairro", {
            url: "/bairros/novo",
            parent: "dashboard",
            templateUrl: "/app/views/bairro/create.html",
            controller: "BairroCtrl"
        })
        .state("editarBairro", {
            url: "/bairros/editar/:id",
            parent: "dashboard",
            templateUrl: "/app/views/bairro/update.html",
            controller: "BairroCtrl"
        });
});