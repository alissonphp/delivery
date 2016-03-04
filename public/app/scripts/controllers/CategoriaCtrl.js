ctrlApp.controller('CategoriaCtrl', ['$scope', '$state', 'CategoriaFactory', 'ngNotify', '$http', '$stateParams',
    function ($scope, $state, CategoriaFactory, ngNotify, $http, $stateParams) {
        $scope.categorias = CategoriaFactory.query();
        $scope.store = function () {
            var data = $scope.categoria;
            CategoriaFactory.save(data, function (r) {
                $state.go('categorias');
                ngNotify.set('Categoria registrada com sucesso!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.show = function () {
            CategoriaFactory.get({id: $stateParams.id}, function (r) {
                $scope.categoria = r;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.update = function () {
            var data = $scope.categoria;
            CategoriaFactory.update({data: data, id: $stateParams.id}, function (r) {
                $state.go('categorias');
                ngNotify.set('Categoria atualizado com sucesso!', 'info');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.delete = function(id) {
            CategoriaFactory.delete({id: id}, function () {
                $state.go('categorias', {}, {reload: true});
                ngNotify.set('Categoria excluída!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação: ' + e.data, 'error');
            });
        };
    }
]);
