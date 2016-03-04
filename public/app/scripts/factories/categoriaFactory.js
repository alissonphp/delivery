ctrlApp.factory('CategoriaFactory', ['$resource', 'CONFIG',
    function($resource, CONFIG){
        return $resource(CONFIG.API+'categoria/:id', {id: '@id'}, {
            update: {
                method: 'PUT'
            }
        });
    }
]);