ctrlApp.controller('BairroCtrl', ['$scope', '$state', 'BairroFactory', 'ngNotify', '$http', '$stateParams',
    function ($scope, $state, BairroFactory, ngNotify, $http, $stateParams) {
        $scope.bairros = BairroFactory.query();
        $scope.store = function () {
            var data = $scope.bairro;
            BairroFactory.save(data, function (r) {
                $state.go('bairros');
                ngNotify.set('Bairro de Entrega adicionado com sucesso!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.show = function () {
            BairroFactory.get({id: $stateParams.id}, function (r) {
                $scope.bairro = r;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.update = function () {
            var data = $scope.bairro;
            BairroFactory.update({data: data, id: $stateParams.id}, function (r) {
                $state.go('bairros');
                ngNotify.set('Bairro atualizado com sucesso!', 'info');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.delete = function (id) {
            BairroFactory.delete({id: id}, function () {
                $state.go('bairros', {}, {reload: true});
                ngNotify.set('Bairro excluído!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
