ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("pagamentos", {
            url: "/pagamentos/",
            parent: "dashboard",
            templateUrl: "/app/views/pagamento/index.html",
            controller: "PagamentoCtrl"
        })
        .state("novoPagamento", {
            url: "/pagamentos/novo",
            parent: "dashboard",
            templateUrl: "/app/views/pagamento/create.html",
            controller: "PagamentoCtrl"
        })
        .state("editarPagamento", {
            url: "/pagamentos/editar/:id",
            parent: "dashboard",
            templateUrl: "/app/views/pagamento/update.html",
            controller: "PagamentoCtrl"
        });
});