'use strict';
var ctrlApp = angular.module('ctrlApp', [
        'ngResource',
        'ui.router',
        'ngAnimate',
        'ngStorage',
        'ngNotify',
        'ngFileUpload',
        'checklist-model',
        'datatables'
    ])
    .filter('dateParse', function() {
        return function(data) {
            return Date.parse(data);
        }
    })
    .constant("CONFIG", {
        "API": "http://localhost:8000/api/v1/",
        "AUTH": "http://localhost:8000/login"
    })
    .config(function($httpProvider){
        $httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
            return {
                'request': function (config) {
                    config.headers = config.headers || {};
                    if ($localStorage.token) {
                        config.headers.Authorization = 'Bearer ' + $localStorage.token;
                    }
                    return config;
                },
                'responseError': function (response) {
                    if (response.status === 400 || response.status === 401 || response.status === 403) {
                        $location.path('/login');
                    }
                    return $q.reject(response);
                }
            };
        }]);
    })
    .run(function (DTDefaultOptions) {
        DTDefaultOptions.setLanguageSource('../../app/vendor/datatables/media/lang/Portuguese-Brasil.json');
    });
