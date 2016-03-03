ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("categorias", {
            url: "/categorias/",
            parent: "dashboard",
            templateUrl: "/app/views/categoria/index.html",
            controller: "CategoriaCtrl"
        });
});