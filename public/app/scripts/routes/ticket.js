ctrlApp.config(function ($stateProvider) {
    $stateProvider
        .state("ticketEmpresa", {
            url: "/cadastros/empresas/tickets/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/tickets/index.html",
            controller: "TicketCtrl"
        })
        .state("newticketEmpresa", {
            url: "/cadastros/empresas/tickets/novacota/:id",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/tickets/cota/create.html",
            controller: "TicketCtrl"
        })
        .state("ticketsGeradosEmpresa", {
            url: "/cadastros/empresas/tickets/empresa/:id/cota/:cota",
            parent: "dashboard",
            templateUrl: "/app/views/empresa/tickets/cota/gerados.html",
            controller: "TicketCtrl"
        });
});