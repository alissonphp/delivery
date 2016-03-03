ctrlApp.controller('TicketCtrl', ['$scope', '$state', 'EmpresaFactory', 'ngNotify', '$http', '$stateParams', 'CONFIG', 'Upload',
    function ($scope, $state, EmpresaFactory, ngNotify, $http, $stateParams, CONFIG, Upload) {
        $scope.empresa = EmpresaFactory.get({id: $stateParams.id});
        $scope.tickets = function() {
            $http.get(CONFIG.API+'empresaticket/index/'+$stateParams.id).then(function (r) {
                $scope.empresatickets = r.data;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
        $scope.store = function() {
           var data = $scope.ticket;
            $http.post(CONFIG.API+'empresaticket/store/'+$stateParams.id, data).then(function (r) {
                $state.go('ticketEmpresa', {id: $stateParams.id}, {reload: true});
                ngNotify.set('Nova cota de Tickets Clube definida!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Erro: ' + e.data, 'error');
            });
        };
        $scope.gerados = function() {
            $http.post(CONFIG.API+'empresaticket/gerados/', {empresa: $stateParams.id, cota: $stateParams.cota}).then(function (r) {
                $scope.cota = r.data.tickets;
                $scope.ofertas = r.data.ofertas;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Erro: ' + e.data, 'error');
            });
        };
        $scope.storeOferta = function() {
            $scope.oferta.upload = Upload.upload({
                url: CONFIG.API+'empresaticket/storeoferta/'+$stateParams.cota,
                data: {oferta: $scope.oferta}
            }).then(function (r) {
                $('#addOferta').modal('hide');
                ngNotify.set('Nova oferta cadastrada com sucesso!', 'success');
                $state.go('ticketsGeradosEmpresa',{id: $stateParams.id, cota: $stateParams.cota}, {reload: true});
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
