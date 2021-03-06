 MySIS.controller('deleteUserController', ['$scope', '$http', function($scope, $http)
{

      //$('#errorAlert').hide();

      $scope.emailInputChange = function()
      {
           $scope.userId= "";
           $scope.name = "";
           $scope.emailToChange = "";

           $('#errorAlert').hide();
           $('#successAlert').hide();

      }

      $scope.findUserByEmail= function()
      {
          //$scope.emailInputChange();

          $scope.dataToSend = {};
          $scope.dataToSend.email = $scope.email;

          $http({
            method : 'POST',
            url: 'userByEmail',
            data: $scope.dataToSend,
            responseType:'json'
          }).success(function(data, status, headers, config)
          {

            console.log("Post hecho exitosamente");
            console.log(data);

            if(data.error_status != null)
            {
              console.log("No se encontro el usuario");
              $scope.error_status= data.error_status;
              $('#errorAlert').show();
            }
            else
              {
                  $scope.userId= data.id;
                  $scope.name = data.name;
                  $scope.emailToChange = data.email;
              }


          }).error(function(status)
          {
              console.log("Error obteniendo usuario");
          })

      }

  }]);
