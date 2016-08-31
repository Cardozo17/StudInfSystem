angular.module('SIEApp', ['ngRoute'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .controller('headerController', ['$scope', function($scope)
  {
  		$scope.schoolName= "Nombre de la Escuela A Obtener de la Base de Datos Aún";
  		console.log($scope.schoolName);


  }]);