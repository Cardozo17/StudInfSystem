angular.module('SIEApp', ['ngRoute'])
  .controller('showStudentsController', function($scope, $http) {

  			//default values.
			$scope.table= {};
			$scope.selectedRow= null;


			console.log("Angular funciona WIII");


			
			//console.log($students);

			//OJOOOOO VRER COMO OBTENGO LA DATA QUE YA TENGO EN LA VISTA

			$http({
				method : 'GET',
				url: 'students/list',
				
			}).success(function(data){

				console.log("Post Done");
				console.log(data);
			}).error(function(){

				console.log("Error");
			})

  });