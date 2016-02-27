angular.module('SIEApp', ['ngRoute'])
  .controller('studyConstancyController', function($scope) {

 

  	$scope.prueba= function(){

  			console.log("probando angular");
  			$scope.idPrueba = "algodon"	
  		
  		}


  });

/*
 var app = angular.module('myApp', []);
app.controller('studyConstancyController', function($scope) {
   console.log("esto es una prueba de angular jesus");

		$scope.prueba= function(){

  			console.log("probando angular");	
  		
  		}

});*/