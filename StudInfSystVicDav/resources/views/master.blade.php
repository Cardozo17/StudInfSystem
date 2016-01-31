<!DOCTYPE html>
<html lang="vsl">
<head>

	<title>Sistema de Información Estudiantil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script 
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <script 
	 	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	 	<style>

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
	 			margin-top: 15px;
	 			padding: 0px 0px 20px 0px;
	 		}

	 		.container-fluid {
	 			padding: 0px 0px, 0px, 0px ;
	 		}

	 	</style>	

</head>

<body>

	<div class="jumbotron text-center">
		<div class= "header">
			{{ Html::image('images/escudo.jpg', 'Logo')}}
			<h1>Escuela Basica Vicente Davila</h1>
			<p>
				Escuela basica perteneciente al Ministerio del Poder Popular Para La Educación.
				<br>
				Ubicada en Mérida, Venezuela.
			</p>
		</div>
	</div>


	<div class="container-fluid" >
		<div class= "col-md-3">
		 	<label>Ménu</label>	
		</div>
		<div>
			<div class= "col-md-9">
				@yield('content')

			</div>	
		</div>	

	</div>	

	@yield('footer')

	<button type="button" class="btn btn-danger" onclick="">LogOut</button>
	<a href="{{URL::previous()}}">Back</a>
	
</body>
</html> 