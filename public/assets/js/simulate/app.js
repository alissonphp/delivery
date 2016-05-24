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
                sum += parseInt(data[i][key]);
            }

            return sum;
        };
    })
    .constant("ENDPOINT", {
        "CARDAPIO": "http://localhost:8000/cardapios/"
    });
simulateApp.controller('MainController', ['$scope','$http','ENDPOINT','ngNotify',
    function($scope, $http, ENDPOINT, ngNotify){
        $scope.pedido = [];
        $scope.pizza = null;
        $scope.getCardapio = function(id) {
            $http.get(ENDPOINT.CARDAPIO+id).then(function(r){
                $scope.cardapios = r.data;
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
    }
]);