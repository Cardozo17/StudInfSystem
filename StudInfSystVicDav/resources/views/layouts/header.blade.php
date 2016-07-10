<div id="header">
	<header>
		<div class="jumbotron">
			<div class="container">
				<div id="container">
					<div id="left"><a href="/home" id="headerImg">
						{{ Html::image('images/escudo.jpg', 'Logo' )}} 
					</a></div>
					<div id="center"><h3>Escuela Básica Nacional Vicente Dávila</h3></div>
					<div id="right">	<h5 >Usuario:  {{ Auth::user()->name }}</h5>
						<a  type="button" id="closeSessionButton" class="btn btn-danger btn-xs" href="/logout" onclick="">Cerrar Sesión</a>
					</div>
				</div>
			</div>
		</div>	
	</header>
</div>


