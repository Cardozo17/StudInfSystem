function readURLLogo(input)
{
	if (input.files && input.files[0])
	{
		var reader = new FileReader();

		reader.onload = function (e)
		{
			$('#schoolLogo')
			.attr('src', e.target.result)
			.width(150)
			.height(200);
		};

		reader.readAsDataURL(input.files[0]);
	}
}


MySIS.controller('setSystemParametersController', ['$scope', '$http', function($scope, $http)
{



}]);