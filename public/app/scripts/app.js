'use strict';
var ctrlApp = angular.module('ctrlApp', [
        'ngResource',
        'ui.router',
        'ngAnimate',
        'ngStorage',
        'ngNotify',
        'ngFileUpload',
        'datatables'
    ])
    .filter('dateParse', function() {
        return function(data) {
            return Date.parse(data);
        }
    })
    .constant("CONFIG", {
        "API": "http://localhost:8000/api/v1/"
    })
    .run(function (DTDefaultOptions) {
        DTDefaultOptions.setLanguageSource('../../app/vendor/datatables/media/lang/Portuguese-Brasil.json');
    });
