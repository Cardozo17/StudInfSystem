  	function readURL(input) 
  	{
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();

            reader.onload = function (e) 
            {
                $('#studentPicture')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


angular.module('SIEApp', ['ngRoute'])
  .controller('createStudentController', function($scope) 
  {

    $scope.relationshipWithStudentChange= function(){

      console.log("Prueba"); 
      console.log($scope.relationshipWithStudent);

      if($scope.relationshipWithStudent== "isDad")
      {  
        $scope.selectedRelationshipWithStudent= "PADRE";
        $scope.informationFromFather=true;
        $scope.informationFromMother= false;
        //Aqui va que se llene la información de padre con la de repLeg y se active lo de padre
      } 
      else
        if($scope.relationshipWithStudent=="isMom")
         { 
          $scope.selectedRelationshipWithStudent= "MADRE";
          $scope.informationFromMother=true;
          $scope.informationFromFather=false;
          //Aqui va que se llene la información de padre con la de repLeg y se active lo de padre
         }
        else
          if($scope.relationshipWithStudent== "isOther")
            $scope.selectedRelationshipWithStudent= "";
    }

  });