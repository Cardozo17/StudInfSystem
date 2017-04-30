   MySIS.controller('assignTeacherController', ['$scope', '$http', function($scope, $http)
    {

      $('#errorAlertFromJS').hide();

      $scope.inputEdited = function()
      {
          $('#errorAlertFromJS').hide();
          $('#errorAlertFromForm').hide();

          $scope.firstName = "";
          $scope.lastName = "";
      }

      $scope.findTeacherInformation = function()
      {
        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;

        $scope.inputEdited();

        $http({
          method : 'POST',
          url: '/teacherById',
          data: $scope.dataToSend,
          responseType:'json'
        }).success(function(data, status, headers, config)
        {

          console.log("Post hecho exitosamente");
          console.log(data);

          if(data.error_status!=null)
          {
            console.log("No se encontro el docente");
            $scope.error_status= data.error_status;
            $('#errorAlertFromJS').show();
          }
          else
              {
                $scope.firstName = data.name;
                $scope.lastName = data.last_name;

              }

        }).error(function(status){
          $('#errorAlertFromJS').show();
          console.log("Error obteniendo docente");
        })

      }

  }]);
