ctrlApp.factory('PlanoFactory', ['$resource', 'CONFIG',
    function($resource, CONFIG){
        return $resource(CONFIG.API+'plano/:id', {id: '@id'},
            {
                'update': { method:'PUT' }
            });
    }
]);