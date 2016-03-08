angular.module('SIEApp', ['ngRoute'])
  .controller('studyConstancyController', function($scope, $http) {

    $scope.prueba= function(){

        $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;

         $scope.firstName= "";
         $scope.lastName= "";
        
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
            }


      }).error(function(){

        console.log("Error obteniendo el estudiante");
      })
      
    }

    $scope.makeConstancy = function()
    {
      $scope.dataToSend = {};
        $scope.dataToSend.personId = $scope.personId;
      
      console.log("data a enviar ");
       console.log($scope.dataToSend);

      $http({
        method : 'GET',
        url: 'reportConstancyStudent',
        params: {
                    id: $scope.personId
            
                }
      }).success(function(data, status, headers, config)
      {

        console.log("post hecho de buena forma");
        console.log(data);

        var file = new Blob([data], {type: 'application/pdf'});
       var fileURL = URL.createObjectURL(file);
       window.open(fileURL);
       
      }).error(function(){

        console.log("Error obteniendo el estudiante");
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