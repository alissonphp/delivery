ctrlApp.controller('PlanoCtrl', ['$scope', '$state', 'PlanoFactory', 'ngNotify', '$http', '$stateParams',
    function ($scope, $state, PlanoFactory, ngNotify, $http, $stateParams) {
        $scope.planos = PlanoFactory.query();
        $scope.store = function () {
            var data = $scope.plano;
            PlanoFactory.save(data, function (r) {
                $state.go('planos');
                ngNotify.set('Plano registrado com sucesso!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.show = function () {
            PlanoFactory.get({id: $stateParams.id}, function (r) {
                $scope.plano = r;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.update = function () {
            var data = $scope.plano;
            PlanoFactory.update({data: data, id: $stateParams.id}, function (r) {
                $state.go('planos');
                ngNotify.set('Plano atualizado com sucesso!', 'info');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.delete = function (id) {
            PlanoFactory.delete({id: id}, function () {
                $state.go('planos', {}, {reload: true});
                ngNotify.set('Plano excluído!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
