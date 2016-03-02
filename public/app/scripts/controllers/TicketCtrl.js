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
    }
]);
