ctrlApp.controller('PlanoCtrl', ['$scope','$state','PlanoFactory','$rootScope','$http',
    function($scope, $state, PlanoFactory, $rootScope, $http) {
        $scope.planos = PlanoFactory.query();
        $scope.store = function() {
            var data = $scope.plano;
            PlanoFactory.save(data, function(r){
                $state.go('planos');
            }, function(e){
                console.log(e);
            });
        }
    }
]);
