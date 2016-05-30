  	function readURL(input) 
  	{
        console.log("Entro")
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

    $(document).ready(function()
    {
      $('[data-toggle="tooltip"]').tooltip();   
    });

angular.module('SIEApp', ['ngRoute'])
  .controller('createStudentController', function($scope) 
  {

    console.log(oldInput); //RECORDAR BORRAR POR SEGURIDAD

    //Form Old Input To Use if Validation Fails:
    $scope.documentId= oldInput.document_id;
    $scope.name= oldInput.name;
    $scope.lastName= oldInput.last_name;
    $scope.gender= oldInput.gender;
    $scope.height=oldInput.height;
    $scope.weight= oldInput.weight;
    $scope.bornPlace=oldInput.born_place;
    $scope.bornDate= oldInput.born_date;
    $scope.homeAddress= oldInput.home_address;
    $scope.repLegDocId= oldInput.repLegDocId;
    $scope.repLegName= oldInput.repLegName;
    $scope.repLegLastName= oldInput.repLegLastName;
    $scope.repLegGender= oldInput.repLegGender;
    $scope.repLegEmail= oldInput.repLegEmail;
    $scope.repLegHomeAddress= oldInput.repLegHomeAddress;
    $scope.repLegWorkAddress= oldInput.repLegWorkAddress;
    $scope.repLegHomePhone= oldInput.repLegHomePhone;
    $scope.repLegWorkPhone= oldInput.repLegWorkPhone;
    $scope.repLegMobilePhone= oldInput.repLegMobilePhone;
    $scope.relationshipWithStudent= oldInput.relationshipWithStudent;
    $scope.selectedRelationshipWithStudent= oldInput.selectedRelationshipWithStudent;
    $scope.authorizedBy= oldInput.authorizedBy;
    $scope.informationFromMother= oldInput.infMother=="true"? true: false;
    $scope.informationFromFather= oldInput.infFather=="true"? true: false;



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