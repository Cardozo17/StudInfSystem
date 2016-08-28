 $(document).ready(function()
    {
      $('[data-toggle="tooltip"]').tooltip();   
    });

angular.module('SIEApp', ['ngRoute'])
  .controller('authorizationController', function($scope, $http) {

    $scope.prueba= function(){

        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;

         $scope.firstName= "";
         $scope.lastName= "";
        
        console.log($scope.personId);
      
      $http({
        method : 'POST',
        url: 'studentById',
        data: $scope.dataToSend,
        responseType:'json'
      }).success(function(data, status, headers, config)
      {

        console.log("post hecho de buena forma");
        console.log(data);

        if(data == "" || data == null)
          console.log("No se encontro el Alumno");
        else if(data != "" || data != null)
            {
              $scope.firstName = data.name;
              $scope.lastName = data.last_name;
              $scope.age =  "NO";
              $scope.picture= data.picture;
            }


      }).error(function(){

        console.log("Error obteniendo el Alumno");
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

        console.log("Error obteniendo el Alumno");
      })

    }




  });