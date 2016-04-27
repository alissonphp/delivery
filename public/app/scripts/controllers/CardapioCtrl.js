ctrlApp.controller('CardapioCtrl', ['$scope','EmpresaFactory', '$state', 'ngNotify', '$http', '$stateParams', 'CONFIG', 'Upload',
    function ($scope, EmpresaFactory, $state, ngNotify, $http, $stateParams, CONFIG, Upload) {

        $scope.info = EmpresaFactory.get({id: $stateParams.id});
        $scope.novosItens = [];
        $scope.variacoes = [];

        $scope.store = function(){
            $http.post(CONFIG.API+'empresacardapio/store', {rotulo: $scope.cardapio.rotulo, empresa: $stateParams.id}).then(function(r){
                ngNotify.set('Novo cardápio cadastrado!', 'success');
                $state.go('empresaCardapio', {id: $stateParams.id});
            }, function(e){
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
        $scope.delete = function(item) {
            $http.delete(CONFIG.API+'empresacardapio/delete/'+item).then(function(r){
                $state.go('empresaCardapio', {id: $stateParams.id}, {reload: true});
                ngNotify.set('Cardápio removido!', 'success');
            }, function(e){
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
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

        $scope.pushSubItem = function() {
            var subItem = $scope.subitem;
            $scope.variacoes.push(subItem);
            $scope.subitem = null;
            $scope.item.variacoes = $scope.variacoes;
            $('#myModal').modal('hide');
        };

        $scope.removeItem = function(item) {
            $scope.novosItens.splice(item, 1);
            ngNotify.set('Item removido', 'success');

        };

        $scope.removeSubItem = function(subItem) {
            if($scope.variacoes.length == 1) {
                ngNotify.set('Deve haver pelo menos uma variação no item', 'error');
            } else {
                $scope.variacoes.splice(subItem, 1);
                ngNotify.set('Variação removida', 'success');
            }
        };

        $scope.storeItens = function(){
            $http.post(CONFIG.API+'empresacardapio/storeitens/'+$stateParams.id, {itens: $scope.novosItens}).then(function (r) {
                //console.log(r.data);
                ngNotify.set('Todos os itens adicionados ao cardápio com sucesso!', 'success');
                $state.go('itensCardapio', {id: r.data});
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };

        $scope.deleteItem = function(id) {
            $http.delete(CONFIG.API+'empresacardapio/deleteitens/'+id).then(function (r) {
                ngNotify.set('Item excluído do cardápio com sucesso!', 'success');
                $state.go('itensCardapio', {id: $stateParams.id}, {reload: true});
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };

        $scope.openModal = function() {
            if($scope.item == null || $scope.item.preco != "0") {
                return ngNotify.set('Informe um rótulo válido e preço 0 (zero) para adicionar variação', 'error');
            } else {
                $('#myModal').modal('show');
            }
        };
    }
]);
