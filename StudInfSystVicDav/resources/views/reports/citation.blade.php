@extends('layouts.master')

@section('title', 'Constancias de Estudio')

@section('content')

	<h1>Citación de Representante</h1>

	<div ng-controller="citationController">
	    
	    {!! Form::open(array('url' => '/repCitation')) !!}

	    <div class= "form-group">
	   	
			<h3>Indique la Cédula</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3"  >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId']) !!}
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
	    			{!!Form::submit('Generar Citación', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>	
	    	</div>

	    	<br>

		</div>
		
		{!! Form::close() !!}



	</div>

	<script src="/js/citation.js"></script>
@endsection