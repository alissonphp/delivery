ctrlApp.controller('AuthCtrl', ['$scope', '$state', 'Auth', 'ngNotify', '$http', '$stateParams', '$localStorage',
    function ($scope, $state, Auth, ngNotify, $http, $stateParams, $localStorage) {

        function successAuth(res) {
            $localStorage.token = res.token;
            $state.go('dashboard');
        }
        $scope.signin = function () {
            var formData = {
                email: $scope.email,
                password: $scope.password
            };
            Auth.signin(formData, successAuth, function () {
                ngNotify.set('Credenciamento inválido! Tente novamente', 'warn');
            })
        };
        $scope.logout = function () {
            Auth.logout(function () {
                $state.go('login');
            });
        };
        $scope.token = $localStorage.token;
        $scope.tokenClaims = Auth.getTokenClaims();
    }
]);
