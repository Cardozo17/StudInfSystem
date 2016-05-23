<div class="jumbotron text-center">
		<div class= "row">
			<div class= "col-md-12">		
				<div class= "header">

					<a href="/home">
						{{ Html::image('images/escudo.jpg', 'Logo' )}} 
					</a>	
					<h1>Escuela Básica Vicente Dávila</h1>
					<p>
						Escuela Básica Perteneciente al Ministerio del Poder Popular para La Educación.
						<br>
						Ubicada en Mérida, Venezuela.
					</p>

					<h5 class="topLeftCorner" style="bottom: 15px" >Usuario:  {{ Auth::user()->name }}</h5>
					<a type="button" id="closeSessionButton" class="btn btn-danger btn-xs topLeftCorner" href="/logout" onclick="">Cerrar Sesión</a>

				</div>
			</div>
		</div>	
</div>