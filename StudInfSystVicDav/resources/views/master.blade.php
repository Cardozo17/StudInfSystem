<!DOCTYPE html>
<html lang="vsl" >
<head>

	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
	
	{!! Html::style('css/system_style.css') !!}	

	<script 
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script 
	 	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script 
		src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
	<script 
    	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.min.js"></script>	
	<script 
		src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-resource.min.js"></script>
	<script 
		src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>			
</head>

<body ng-app="SIEApp">
	@include('shared.header')
	
	<div class="container-fluid" >
		<div class= "row">	
			<div class= "col-md-3">
					
			 		@include('shared.menu')	
			</div>
			<div>
				<div class= "col-md-9">
					@yield('content')

				</div>	
			</div>	
		</div>
	</div>	

	@yield('footer')
	
</body>
</html> 