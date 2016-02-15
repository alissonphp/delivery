ctrlApp.controller('CardapioCtrl', ['$scope','EmpresaFactory', '$state', 'ngNotify', '$http', '$stateParams', 'CONFIG', 'Upload',
    function ($scope, EmpresaFactory, $state, ngNotify, $http, $stateParams, CONFIG, Upload) {

        $scope.info = EmpresaFactory.get({id: $stateParams.id});
        $scope.novosItens = [];

        $scope.list = function() {
            $http.get(CONFIG.API+'empresacardapio/list/'+$stateParams.id).then(function (r) {
                $scope.cardapios = r.data;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };

        $scope.itens = function() {
            $http.get(CONFIG.API+'empresacardapio/itens/'+$stateParams.id).then(function (r) {
                $scope.data = r.data;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };

        $scope.pushItem = function() {
            var item = $scope.item;
            $scope.novosItens.push(item);
            $scope.item = null;
        };

        $scope.storeItens = function(){
            $http.post(CONFIG.API+'empresacardapio/storeitens/'+$stateParams.id, {itens: $scope.novosItens}).then(function (r) {
                ngNotify.set('Todos os itens adicionados ao cardápio com sucesso!', 'success');
                $state.go('itensCardapio', {id: r.data});
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };

        $scope.removeItem = function(item) {
            $scope.novosItens.splice(item);
            ngNotify.set('Item removido', 'success');

        }

        $scope.deleteItem = function(id) {
            $http.delete(CONFIG.API+'empresacardapio/deleteitens/'+id).then(function (r) {
                ngNotify.set('Item excluído do cardápio com sucesso!', 'success');
                $state.go('itensCardapio', {id: $stateParams.id}, {reload: true});
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
