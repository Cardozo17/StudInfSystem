@extends('layouts.master')

@section('title', 'Contacto')

@section('content')

<div ng-controller="contactController">
	<h1 style="color:grey;"> Información de contacto de la <%schoolName%></h1>
	<br>
	<h2>Teléfono: <%schoolPhone%> </h2>
	<h2>Correo Electrónico: <%schoolEmail%> </h2>
	<h2>Dirección: <%schoolAddress%> </h2>
</div>

<script src="/js/dynamism_pages/contact.js"></script>
@stop