ctrlApp.factory('PagamentoFactory', ['$resource', 'CONFIG',
    function($resource, CONFIG){
        return $resource(CONFIG.API+'pagamento/:id', {id: '@id'},
            {
                'update': { method:'PUT' }
            });
    }
]);