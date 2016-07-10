angular.module('SIEApp', ['ngRoute'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
  .controller('findStudentController', function($scope, $http) {


      $('#showAlert').hide();
    
    $scope.inputEdited = function()
    {
      $('#showAlert').hide();

        $scope.firstName = "";
        $scope.lastName = "";
        $scope.age = "";
        $scope.address = "";;
        $scope.picture = "";
        $scope.bornDate = "";
        $scope.bornPlace = "";
        $scope.height = "";
        $scope.weight = "";

    }

    $scope.findStudentInformation = function()
    {

        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;

        $scope.inputEdited();

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

        if(data == "" || data == null)
          console.log("No se encontro el estudiante");
        else if(data != "" || data != null)
            {
              $scope.firstName = data.name;
              $scope.lastName = data.last_name;
              $scope.age =  "NO";
              $scope.address = data.home_address;
              $scope.picture = data.picture;
              $scope.bornDate = data.student.born_date;
              $scope.bornPlace = data.student.born_place;
              $scope.height = data.student.height;
              $scope.weight = data.student.weight;
              $scope.gradeToBeRegister= data.student.grade_to_be_register;

              $scope.personIdLR = data.student.legal_representative.person.document_id;
              $scope.firstNameLR = data.student.legal_representative.person.name;
              $scope.lastNameLR = data.student.legal_representative.person.last_name;
              $scope.mailLR = data.student.legal_representative.person.email;

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

              $scope.relationshipLR = data.student.legal_representative.relationship_with_legal_representative;
              $scope.directionLR = data.student.legal_representative.person.home_address;


              console.log($scope.picture);
            }


      }).error(function(status){
        $('#showAlert').show();
        console.log("error o no se encontro");
      })
      
    }

    $scope.postToMakeConstancy= function ()
    {
       console.log("here"); 
       console.log($scope.personId);
       $scope.personId= "20847147";


       var params= {};

       params: {
                    id: $scope.personId
            
                }

       console.log(params);         

      var path= "/reporting"
      var method = "post"; // Set method to post by default if not specified.

      // The rest of this code assumes you are not using a library.
      // It can be made less wordy if you use one.
      var form = document.createElement("form");
      form.setAttribute("method", method);
      form.setAttribute("action", path);

     for(var key in params) 
      {
          if(params.hasOwnProperty(key)) 
          {
              var hiddenField = document.createElement("input");
              hiddenField.setAttribute("type", "hidden");
              hiddenField.setAttribute("name", key);
              hiddenField.setAttribute("value", params[key]);

              form.appendChild(hiddenField);
           }
      }

      document.body.appendChild(form);

      form.submit();

    }

    $scope.makeConstancy = function()
    {
        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;
      
      console.log("data a enviar ");
      console.log($scope.dataToSend);

      $http({
        method : 'POST',
        url: '/reporting',
        params: {
                    id: $scope.personId
            
                }
      }).success(function(data, status, headers, config)
      {

        console.log("post hecho de buena forma");
        //console.log(data);

        /*var file = new Blob([data], {type: 'application/pdf'});
       var fileURL = URL.createObjectURL(file);
       window.open(fileURL);*/
       
      }).error(function(){

        console.log("Error obteniendo el estudiante");
      })

    }




  });
