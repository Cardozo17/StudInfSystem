<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
	
	<link rel="stylesheet" href="{!! asset('/css/bootstrap/bootstrap.css') !!}" media="all" type="text/css" >
	<link rel="stylesheet" href="{!! asset('/css/bootstrap/bootstrap-theme.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/system_style.css') !!}" media="all" type="text/css" />
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>
 
	<script 
		src="{!! asset('/js/jquery/jquery-1.12.4.js') !!}"></script>
	<script 
	 	src="{!! asset('/js/bootstrap/bootstrap.js') !!}"></script>
	<script 
		src="{!! asset('/js/angular/angular.js') !!}"></script>
	<script 
    	src="{!! asset('/js/angular/angular-route.js') !!}"></script>	
	<script 
		src="{!! asset('/js/angular/angular-resource.js') !!}"></script> 
	<script type="text/javascript" 
		src="DataTables/datatables.js"></script>	
	
				
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