@extends('layouts.master')

@section('title', 'Constancias de Estudio')

@section('content')

	<h1>Autorización a Alumno</h1>

	<div ng-controller="authorizationController">

		<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

	    {!! Form::open(array('url' => '/repAuthorization')) !!}

	    <div class= "form-group">

			<h3>Indique la Cédula del Alumno</h3>
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3"  >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId', 'data-toggle'=>"tooltip", 'title'=>"Cédula: V00000000 ó &#013; Escolar: 116V00000000", 'placeholder'=>"Cédula del Alumno"]) !!}
				</div>
				<br>
				<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "prueba()"></button>

	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4" ng-readonly="true">
					{!! Form::label('name', 'Nombre: ') !!}
					{!!Form::text('name', null, ['class'=> 'form-control', 'ng-model'=>'firstName','ng-disabled'=>'true']) !!}
				</div>

				<div class= "col-md-4" ng-disabled = "true">
					{!! Form::label('last_name', 'Apellido: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control','ng-model'=>'lastName', 'ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-2" ng-readonly="true">
					{!! Form::label('Age', 'Edad: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control', 'ng-model'=>'age','ng-disabled'=>'true']) !!}
				</div>
			</div>

			<br>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			{!!Form::submit('Generar Autorización', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>
	    	</div>

	    	<br>

		</div>

		{!! Form::close() !!}



	</div>

	<script src="/js/dynamism_pages/authorization.js"></script>
@endsection
