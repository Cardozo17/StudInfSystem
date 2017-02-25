
	MySIS.controller('showStudentsController', ['$scope', '$http', function($scope, $http) 
	{

		//default values.
		$scope.table= {};
		$scope.selectedRow= null;

		$http({
			method : 'GET',
			url: 'students/list',

		}).success(function(data){

			$scope.students= data;
			console.log($scope.students);

		}).error(function(){

			console.log("Error obteniendo los estudiantes");
		})

  }]);
