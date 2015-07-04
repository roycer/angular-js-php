(function(angular) {
  'use strict';
angular.module('includeExample', ['ngAnimate'])
  .controller('ExampleController', ['$scope', function($scope) {

    $scope.templates =[ 
        { name: 'Registro de personal', url: 'html/personal.html'},
        { name: 'Registro de clientes', url: 'html/cliente.html'},
        { name: 'Registro de Autos   ', url: 'html/auto.html'},
       ];
    $scope.template = $scope.templates[0];

  }]);
})(window.angular);

