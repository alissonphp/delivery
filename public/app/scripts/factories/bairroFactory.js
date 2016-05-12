ctrlApp.factory('BairroFactory', ['$resource', 'CONFIG',
    function($resource, CONFIG){
        return $resource(CONFIG.API+'bairro/:id', {id: '@id'},
            {
                'update': { method:'PUT' }
            });
    }
]);