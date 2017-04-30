  	function readURLStudent(input)
  	{
        console.log(input);
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

    function readURLRepLeg(input)
    {
        console.log(input);
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e)
            {
                $('#repPicture')
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

  MySIS.controller('createStudentController', ['$scope', function($scope)
  {
    console.log(oldInput); //RECORDAR BORRAR POR SEGURIDAD

    //Form Old Input To Use if Validation Fails:
    $scope.documentId= oldInput.document_id;
    $scope.picture= oldInput.picture;
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

    //Defaults
    $scope.legRepNeedsAuthorization= false;

    $scope.documentIdChange = function()
    {
       $('#successAlert').hide();
    }

    $scope.clearFatherInformation = function()
    {
          $scope.fatherDocId= "";
          $scope.fatherName=  "";
          $scope.fatherLastName= "";
          $scope.fatherEmail= "";
          $scope.fatherHomeAddress= "";
          $scope.fatherWorkAddress= "";
          $scope.fatherHomePhone= "";
          $scope.fatherWorkPhone= "";
          $scope.fatherMobilePhone= "";
    }

     $scope.clearMotherInformation = function()
    {
          $scope.motherDocId= "";
          $scope.motherName=  "";
          $scope.motherLastName= "";
          $scope.motherEmail= "";
          $scope.motherHomeAddress= "";
          $scope.motherWorkAddress= "";
          $scope.motherHomePhone= "";
          $scope.motherWorkPhone= "";
          $scope.motherMobilePhone= "";

    }

    $scope.relationshipWithStudentChange= function()
    {

      console.log($scope.relationshipWithStudent);

      if($scope.relationshipWithStudent== "isDad")
      {
        $scope.selectedRelationshipWithStudent= "PADRE";
        $scope.informationFromFather=true;
        $scope.informationFromMother= false;
        $scope.clearMotherInformation();

        //Aqui va que se llene la información de padre con la de repLeg y se active lo de padre
        $scope.fatherDocId= $scope.repLegDocId;
        $scope.fatherName=  $scope.repLegName;
        $scope.fatherLastName= $scope.repLegLastName;
        $scope.fatherEmail= $scope.repLegEmail;
        $scope.fatherHomeAddress= $scope.repLegHomeAddress;
        $scope.fatherWorkAddress= $scope.repLegWorkAddress;
        $scope.fatherHomePhone= $scope.repLegHomePhone;
        $scope.fatherWorkPhone= $scope.repLegWorkPhone;
        $scope.fatherMobilePhone= $scope.repLegMobilePhone;

         $scope.legRepNeedsAuthorization= false;

      }
      else
        if($scope.relationshipWithStudent=="isMom")
         {
          $scope.selectedRelationshipWithStudent= "MADRE";
          $scope.informationFromMother=true;
          $scope.informationFromFather=false;
           $scope.clearFatherInformation();

          //Aqui va que se llene la información de padre con la de repLeg y se active lo de padre
          $scope.motherDocId= $scope.repLegDocId;
          $scope.motherName=  $scope.repLegName;
          $scope.motherLastName= $scope.repLegLastName;
          $scope.motherEmail= $scope.repLegEmail;
          $scope.motherHomeAddress= $scope.repLegHomeAddress;
          $scope.motherWorkAddress= $scope.repLegWorkAddress;
          $scope.motherHomePhone= $scope.repLegHomePhone;
          $scope.motherWorkPhone= $scope.repLegWorkPhone;
          $scope.motherMobilePhone= $scope.repLegMobilePhone;

           $scope.legRepNeedsAuthorization= false;

         }
        else
          if($scope.relationshipWithStudent== "isOther")
          {
            $scope.selectedRelationshipWithStudent= "";
            $scope.informationFromFather=false;
            $scope.informationFromMother= false;

            $scope.legRepNeedsAuthorization= true;
          }
    }

  }]);
