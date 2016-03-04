ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("categorias", {
            url: "/categorias/",
            parent: "dashboard",
            templateUrl: "/app/views/categoria/index.html",
            controller: "CategoriaCtrl"
        })
        .state("novaCategoria", {
            url: "/categorias/nova",
            parent: "dashboard",
            templateUrl: "/app/views/categoria/create.html",
            controller: "CategoriaCtrl"
        })
        .state("editarCategoria", {
            url: "/categorias/editar/:id",
            parent: "dashboard",
            templateUrl: "/app/views/categoria/update.html",
            controller: "CategoriaCtrl"
        });
});