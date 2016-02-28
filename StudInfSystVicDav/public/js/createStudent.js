angular.module('SIEApp', ['ngRoute'])
  .controller('createStudentController', function($scope) {

  	$scope.prueba= "Hola Probando";

  	$scope.ponercedula= function(){

  			console.log("probando angular");	
  			$scope.cedula= "La cedula";
  		}


  });