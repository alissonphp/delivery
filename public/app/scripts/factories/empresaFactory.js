ctrlApp.factory('EmpresaFactory', ['$resource', 'CONFIG',
    function($resource, CONFIG){
        return $resource(CONFIG.API+'empresa/:id', {id: '@id'}, {
                'update': { method:'PUT' }
            });
    }
]);