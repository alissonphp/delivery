ctrlApp.controller('CardapioCtrl', ['$scope','EmpresaFactory', '$state', 'ngNotify', '$http', '$stateParams', 'CONFIG', 'Upload',
    function ($scope, EmpresaFactory, $state, ngNotify, $http, $stateParams, CONFIG, Upload) {

        $scope.info = EmpresaFactory.get({id: $stateParams.id});
        $scope.novosItens = [];
        $scope.variacoes = [];
        $scope.tamanhos = [];
        $scope.tipos = [];
        $scope.sabores = [];
        $scope.categorias = {1: 'Comum', 2: 'Pizza'};

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
            console.log(item);
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

        $scope.pushTamanho = function() {
            var tamanho = $scope.tamanho;
            $scope.tamanhos.push(tamanho);
            $scope.tamanho = null;
            $scope.item.tamanhos = $scope.tamanhos;
            $('#modalTamanho').modal('hide');
        };

        $scope.pushTipo = function() {
            var tipo = $scope.tipo;
            $scope.tipos.push(tipo);
            $scope.tipo = null;
            $scope.item.tipos = $scope.tipos;
            $('#modalTipo').modal('hide');
        };

        $scope.pushSabor = function() {
            var sabor = $scope.sabor;
            $scope.sabores.push(sabor);
            $scope.sabor = null;
            $scope.item.sabores = $scope.sabores;
            $('#modalSabor').modal('hide');
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

        /**
         * editar item do cardápio
         */
        $scope.editItem = function() {
            $http.get(CONFIG.API+'empresacardapio/show/'+$stateParams.item).then(function (r) {
                $scope.item = angular.fromJson(r.data);
                if($scope.item.categoria == 'Comum') {
                    $scope.item.variacoes = r.data.variacao;
                } else {
                    var composicao = angular.fromJson(r.data.composicao);
                    $scope.item.tamanhos = angular.fromJson(composicao.tamanhos);
                    $scope.item.tipos = composicao.tipos;
                    $scope.item.sabores = composicao.sabores;
                }
                console.log($scope.item);
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
