<!DOCTYPE html>
<html lang="vsl" >
<head>

	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">


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
    		

	 	<style>
	 		  html, body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }

	 		.jumbotron {
			    background-color:  	#008B8B;
			    color: #fff;
			    padding: 10px 0px 10px 20px;
			}	

	 		.header img {
	 			float: left;
	 			width: 150px;
	 			height: 150px;
	 			background: #008B8B;
	 			margin-top: 0px;
	 			padding: 0px 0px 0px 0px;
	 		}

	 		.container-fluid {
	 			padding: 0px 0px, 0px, 0px;
	 		}

	 		body{margin-top:0px;}

			.glyphicon { margin-right:10px; }
			.panel-body { padding:0px; }
			.panel-body table tr td { padding-left: 15px }
			.panel-body.table {margin-bottom: 0px; }

			 #closeSessionButton{
		     position:absolute;
		     bottom:0;
		     right:30px;
		 	}

	 	</style>	
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