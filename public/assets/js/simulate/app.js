'use strict';
var simulateApp = angular.module('simulateApp', [
        'ngStorage',
        'ngNotify'
    ], function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .filter('sumByKey', function() {
        return function(data, key) {
            if (typeof(data) === 'undefined' || typeof(key) === 'undefined') {
                return 0;
            }

            var sum = 0;
            for (var i = data.length - 1; i >= 0; i--) {
                sum += parseFloat(data[i][key]);
            }

            return sum;
        };
    })
    .filter('searchKey', function () {
        return function(data, key) {
            if (typeof(data) === 'undefined' || typeof(key) === 'undefined') {
                return 0;
            }
            var ini = 0;
            var result = [];
            angular.forEach(data, function(v, k){
                if(k == key) {
                    result[ini] = v;
                    ini++;
                }
            });
            return result;
        };
    })
    .constant("ENDPOINT", {
        "CARDAPIO": "http://localhost:8000/beta/cardapios/",
        "TAXA_ENTREGA": "http://localhost:8000/beta/taxa/"
    });
simulateApp.controller('MainController', ['$scope','$http','ENDPOINT','ngNotify','$filter',
    function($scope, $http, ENDPOINT, ngNotify, $filter){
        $scope.pedido = [];
        $scope.pizza = [];
        $scope.getCardapio = function(id) {
            $http.get(ENDPOINT.CARDAPIO+id).then(function(r){
                $scope.cardapios = r.data;
            }, function(e){
                console.log(e);
            });
        };
        $scope.getTaxaEntrega = function(id){
            $http.get(ENDPOINT.TAXA_ENTREGA+id).then(function(r){
                return $scope.taxaEntrega = r.data
            }, function(e){
                console.log(e);
            });
        };

        $scope.parseComposicao = function(item){
            return angular.fromJson(item.composicao);
        };

        $scope.addItem = function(rotulo, qtd, preco){
            var item = {rotulo: rotulo, qtd: qtd, preco: preco, total: (preco*qtd)};
            $scope.pedido.push(item);
            ngNotify.set(rotulo + 'adicionado ao seu pedido!', 'success');
        };
        $scope.removeItem = function(item) {
            $scope.pedido.splice(item, 1);
            ngNotify.set('Item removido do seu pedido!', 'warning');
        };
        $scope.addQtd = function(item){
            item.qtd = item.qtd + 1;
            item.total = item.preco * item.qtd;
        };
        $scope.removeQtd = function(item) {
            item.qtd = item.qtd - 1;
            item.total = item.preco * item.qtd;
        };
        $scope.getTotal = function() {
            var subTotalPedido = $filter('sumByKey')($scope.pedido, 'total');
            var total = parseFloat(parseFloat(subTotalPedido) + parseFloat($scope.taxaEntrega));
            return total;
        };
    }
]);