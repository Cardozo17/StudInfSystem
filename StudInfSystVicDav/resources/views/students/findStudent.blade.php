@extends('layouts.master')

@section('title', 'Consulta de Alumno')

@section('content')

	<h1>Consulta de Alumno</h1>

	<div ng-controller="findStudentController">
	    
	    {!! Form::open(array('action' => array('StudentController@findOneById'))) !!}

	    <div class= "form-group">
	   	
			<h3>Indique la Cédula</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3" >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId']) !!}
				</div>
				<br>
				<div class= "col-md-1" >
					<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findStudentInformation()">
				</div>
				</button>
				<div class= "col-md-4 col-md-push-1" >
					 <img ng-src="<%picture%>"  class="img-circle"  height: "200" width= "200" alt="Foto del Alumno"> 	
				</div>	
				
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
			<div class = "row">
	    		<div class= "col-md-12" ng-readonly="true">
					{!! Form::label('address', 'Dirección: ') !!}
					{!!Form::text('address', null, ['class'=> 'form-control', 'ng-model'=>'address','ng-disabled'=>'true']) !!}
				</div>
			</div>


			<br>

		</div>
		
		{!! Form::close() !!}



	</div>

	<script src="/js/findStudent.js"></script>
@endsection