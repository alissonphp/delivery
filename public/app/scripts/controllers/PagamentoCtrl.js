ctrlApp.controller('PagamentoCtrl', ['$scope', '$state', 'PagamentoFactory', 'ngNotify', '$http', '$stateParams',
    function ($scope, $state, PagamentoFactory, ngNotify, $http, $stateParams) {
        $scope.pagamentos = PagamentoFactory.query();
        $scope.store = function () {
            var data = $scope.pagamento;
            PagamentoFactory.save(data, function (r) {
                $state.go('pagamentos');
                ngNotify.set('Forma de pagamento adicionada com sucesso!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.show = function () {
            PagamentoFactory.get({id: $stateParams.id}, function (r) {
                $scope.pagamento = r;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.update = function () {
            var data = $scope.pagamento;
            PagamentoFactory.update({data: data, id: $stateParams.id}, function (r) {
                $state.go('pagamentos');
                ngNotify.set('Forma de pagamento atualizada com sucesso!', 'info');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.delete = function (id) {
            PagamentoFactory.delete({id: id}, function () {
                $state.go('pagamentos', {}, {reload: true});
                ngNotify.set('Forma de pagamento excluída!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
