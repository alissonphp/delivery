ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("empresaCardapio", {
            url: "/cadastros/empresas/cardapios/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/cardapio/index.html",
            controller: "CardapioCtrl"
        })
        .state("createCardapio", {
            url: "/cadastros/empresas/cardapios/novo/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/cardapio/create.html",
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
        });
});