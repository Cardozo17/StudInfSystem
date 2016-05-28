<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
	<link rel="stylesheet" href="{!! asset('/css/system_style.css') !!}" media="all" type="text/css" />	

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
		src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>	
				
</head>
<body ng-app="SIEApp">

	<div class= "row">	
		<div class= "col-md-12">
			@include('layouts.header')
		</div>
	</div>	
	
	<div class= "container-fluid">
		<div class= "row">	
			<div class= "col-md-3" id="menu">
				@include('layouts.menu')	
			</div>
			<div class= "col-md-9" id="content" style=" padding-left: 2%; padding-right: 2%">
				@yield('content')

			</div>		
		</div>
	</div>	


	<div class= "row">	
		<div class= "col-md-12">
		@yield('layouts.footer')
		</div>
	</div>
	
</body>
</html> 