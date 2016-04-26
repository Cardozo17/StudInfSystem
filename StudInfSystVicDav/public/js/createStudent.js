  	function readURL(input) 
  	{
  		console.log("here");
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
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

  	$scope.relationshipWithStudentSelected= function()
  	{
  			

  	}

  });