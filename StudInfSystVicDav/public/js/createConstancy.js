angular.module('SIEApp', ['ngRoute'])
  .controller('studyConstancyController', function($scope, $http) {

 

  	$scope.prueba= function(){

  			console.log("probando angular");
  			$scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;
        

        console.log($scope.personId);
      $http({
        method : 'POST',
        url: 'studentsById',
        data: $scope.dataToSend,
        responseType:'json'
      }).success(function(data, status, headers, config)
      {

        console.log("post hecho de buena forma");
        console.log(data);

        if(data != "" || data != null)
        {
          $scope.firstName = data[0].name;
          $scope.lastName = data[0].last_name;
          $scope.age =  "NO";
        }
        else
          console.log("no se encontro");

      }).error(function(){

        console.log("Error obteniendo los estudiantes");
      })
  		
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