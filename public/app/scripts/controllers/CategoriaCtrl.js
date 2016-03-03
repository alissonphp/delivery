ctrlApp.controller('CategoriaCtrl', ['$scope', '$state', 'CategoriaFactory', 'ngNotify', '$http', '$stateParams',
    function ($scope, $state, CategoriaFactory, ngNotify, $http, $stateParams) {
        $scope.categorias = CategoriaFactory.query();
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
