ctrlApp.controller('EmpresaCtrl', ['$scope', '$state', 'EmpresaFactory', 'PlanoFactory', 'ngNotify', '$http', '$stateParams', 'CONFIG',
    function ($scope, $state, EmpresaFactory, PlanoFactory, ngNotify, $http, $stateParams, CONFIG) {
        $scope.empresas = EmpresaFactory.query();
        $scope.store = function () {
            var data = $scope.empresa;
            EmpresaFactory.save(data, function (r) {
                $state.go('empresaAdicional', {id: r.id});
                ngNotify.set('Empresa registrada com sucesso!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.show = function () {
            EmpresaFactory.get({id: $stateParams.id}, function (r) {
                $scope.empresa = r;
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.update = function () {
            var data = $scope.empresa;
            EmpresaFactory.update({data: data, id: $stateParams.id}, function (r) {
                $state.go('empresas');
                ngNotify.set('Empresa atualizada com sucesso!', 'info');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
                console.log(e);
            });
        };
        $scope.delete = function (id) {
            EmpresaFactory.delete({id: id}, function () {
                $state.go('empresas', {}, {reload: true});
                ngNotify.set('Empresa excluída!', 'success');
            }, function (e) {
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
        $scope.createInfos = function() {
            $scope.planos = PlanoFactory.query();
        };
        $scope.storeInfos = function() {
            var data = {
                plano:      $scope.plano.plano.id,
                endereco:   $scope.endereco,
                social:     $scope.social,
                contato:    $scope.contato

            };
            $http.post(CONFIG.API+'empresainfos/saveinfos/'+$stateParams.id, data).then(function(r){
                $state.go('infosEmpresa', {id: r.data});
                ngNotify.set('Dados adicionais da empresa registrados com sucesso!', 'success');
            }, function(e){
                console.log(e);
            });
        };
        $scope.infos = function () {
            $http.get(CONFIG.API+'empresainfos/allinfos/'+$stateParams.id).then(function(r){
                $scope.adicionais = r.data;
            }, function(e){
                ngNotify.set('Ocorreu um erro na operação. Código: ' + e.status, 'error');
            });
        };
    }
]);
