@extends('layouts.master')

@section('title', '¿Quiénes Somos?')

@section('content')

<div ng-controller="aboutController">
	<h1 style="color:grey;">
		La Escuela Básica <%schoolName%> es una fuente de aprendizaje para el futuro del país.
	</h1>

	<br>
	<h2>Misión</h2>

	<p>
		<%schoolMission%>
	</p>

	<br>
	<h2>Visión</h2>

	<p>
		<%schoolVision%>
	</p>

	<br>
	<h2>Infraestructura</h2>
	<br>
	<h2>Reseña Histórica</h2>
</div>

<script src="/js/dynamism_pages/about.js"></script>
@stop