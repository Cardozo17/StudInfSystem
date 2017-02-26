
    MySIS.controller('findStudentController', ['$scope', '$http', function($scope, $http)
    {

      $('#errorAlert').hide();

      $scope.inputEdited = function()
      {
          $('#errorAlert').hide();

          $scope.firstName = "";
          $scope.lastName = "";
          $scope.age = "";
          $scope.address = "";;
          $scope.picture = " ";
          $scope.bornDate = "";
          $scope.bornPlace = "";
          $scope.height = "";
          $scope.weight = "";
          $scope.gradeToBeRegister = "";

          $scope.personIdLR = "";
          $scope.firstNameLR = "";
          $scope.lastNameLR = "";
          $scope.mailLR = "";
          $scope.home_phoneLR ="";
          $scope.mobile_phoneLR = "";
          $scope.work_phoneLR = "";
          $scope.relationshipLR = "";
          $scope.directionLR = "";
          $scope.legRepPicture= " ";

      }

      $scope.findStudentInformation = function()
      {
        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;

        $scope.inputEdited();

        $http({
          method : 'POST',
          url: '/studentById',
          data: $scope.dataToSend,
          responseType:'json'
        }).success(function(data, status, headers, config)
        {

          console.log("Post hecho exitosamente");
          console.log(data);

          if(data.error_status!=null)
          {
            console.log("No se encontro el estudiante");
            $scope.error_status= data.error_status;
            $('#errorAlert').show();
          }
          else
              {
                $scope.firstName = data.name;
                $scope.lastName = data.last_name;
                $scope.age =  "NO";
                $scope.address = data.home_address;
                $scope.picture = data.picture;
                $scope.bornDate = data.student.born_date;
                $scope.bornPlace = data.student.born_place;
                $scope.height = data.student.height==0? "": data.student.height;
                $scope.weight = data.student.weight==0? "": data.student.weight;
                $scope.gradeToBeRegister= data.student.grade_to_be_register;

                $scope.personIdLR = data.student.legal_representative.person.document_id;
                $scope.firstNameLR = data.student.legal_representative.person.name;
                $scope.lastNameLR = data.student.legal_representative.person.last_name;
                $scope.mailLR = data.student.legal_representative.person.email;
                $scope.legRepPicture= data.student.legal_representative.person.picture;
                $scope.relationshipLR = data.student.relationship_with_legal_representative;

                if(data.student.legal_representative.person.phone_numbers != null)
                {
                  $scope.home_phoneLR = data.student.legal_representative.person.phone_numbers.home_phone;
                  $scope.mobile_phoneLR = data.student.legal_representative.person.phone_numbers.mobile_phone;
                  $scope.work_phoneLR = data.student.legal_representative.person.phone_numbers.work_phone;
                }
                else
                {
                  $scope.home_phoneLR ="";
                  $scope.mobile_phoneLR = "";
                  $scope.work_phoneLR = "";
                }

                $scope.directionLR = data.student.legal_representative.person.home_address;

              }

        }).error(function(status){
          $('#showAlert').show();
          console.log("Error obteniendo estudiante");
        })

      }

  }]);
