'use strict';
var simulateApp = angular.module('simulateApp', [
        'ngStorage',
        'ngNotify'
    ], function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant("ENDPOINT", {
        "CARDAPIO": "http://localhost:8000/cardapios/"
    });
simulateApp.controller('MainController', ['$scope','$http','ENDPOINT',
    function($scope, $http, ENDPOINT){
        $scope.getCardapio = function(id) {
            $http.get(ENDPOINT.CARDAPIO+id).then(function(r){
                $scope.cardapios = r.data;
            }, function(e){
                console.log(e);
            });
        }
    }
]);