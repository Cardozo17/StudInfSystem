
	MySIS.controller('putGradesStudentController', ['$scope', '$http', function($scope, $http)
	{
		//Hidding error messages boxes	
		 $('#errorAlert').hide();
      	 $('#successAlert').hide();

		$scope.findStudentsInGradeSection = function()
      {
      	 $('#errorAlert').hide();
      	 $('#successAlert').hide();

        $scope.dataToSend = {};
        $scope.dataToSend.grade = $scope.grade;
        $scope.dataToSend.section = $scope.section;
        console.log($scope.dataToSend);

        $http({
          method : 'POST',
          url: '/students/listBySectionGrade',
          data: $scope.dataToSend,
          responseType:'json'
        }).success(function(data, status, headers, config)
        {

          console.log("Post hecho exitosamente");
          console.log(data);
          $scope.students= data;

        }).error(function(status){
          $('#showAlert').show();
          console.log("Error obteniendo estudiantes");
        })

      }

      $scope.asignarNotaAlumno = function($index){

      	 $('#errorAlert').hide();
      	 $('#successAlert').hide();

      	 $scope.dataToSend = {};
         $scope.dataToSend.studentId = $scope.students[$index].id;
         $scope.dataToSend.literal = $scope.students[$index].literal;
         console.log($scope.dataToSend);

      	 $http({
          method : 'POST',
          url: '/students/assignGrade',
          data: $scope.dataToSend,
          responseType:'json'
        }).success(function(data, status, headers, config)
        {
          console.log("Post hecho exitosamente");
          console.log(data);
          if(data.error_status!=null)
          {
            $scope.error_status= data.error_status;
            $('#errorAlert').show();
          }else{
          	if(data.success_status != null){
          		$scope.success_status= data.success_status;
          		 $('#successAlert').show();
          	}
          }
        }).error(function(status){
          $('#showAlert').show();
          console.log("Error asignando nota");
        })

      }

  }]);
