 $(document).ready(function()
    {
      $('[data-toggle="tooltip"]').tooltip();
    });

  MySIS.controller('createTeacherController', ['$scope', function($scope)
  {
    //Form Old Input To Use if Validation Fails:
    $scope.documentId= oldInput.document_id;
    $scope.name= oldInput.name;
    $scope.lastName= oldInput.last_name;
    $scope.gender= oldInput.gender;


    $scope.documentIdChange = function()
    {
       $('#successAlert').hide();
    }

    }]);