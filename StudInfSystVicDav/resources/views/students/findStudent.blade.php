@extends('layouts.master')

@section('title', 'Consulta de Alumno')

@section('content')

	<h1>Consulta de Alumno</h1>

	<div ng-controller="findStudentController">
	    
	    {!! Form::open(array('action' => array('StudentController@findStudentById'))) !!}


	    <!-- Error Message -->    
	    <div class="alert alert-danger fade in" ng-model= "error_status" ng-bind="error_status" id = "errorAlert">
	    </div>

	    <div class= "form-group">
	    	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">
   		
			<h3>Indique la Cédula</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3" >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId', 'ng-change' => 'inputEdited()','data-toggle'=>"tooltip", 'title'=>"Cédula: V00000000 ó &#013; Escolar: 116V00000000", 'placeholder'=>"Cédula del Alumno"]) !!}
				</div>
				<br>
				<div class= "col-md-1" >
					<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findStudentInformation()"></button>
				</div>
				<div class= "col-md-4 col-md-push-1" >
					 <img ng-src="<%picture%>"  class="img-circle"  height: "200" width= "200" alt="Foto del Alumno"> 	
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('name', 'Nombres: ') !!}
					{!!Form::text('name', null, ['class'=> 'form-control', 'ng-model'=>'firstName','ng-disabled'=>'true']) !!}
				</div>

				<div class= "col-md-4">
					{!! Form::label('last_name', 'Apellidos: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control','ng-model'=>'lastName', 'ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-2">
					{!! Form::label('Age', 'Edad: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control', 'ng-model'=>'age','ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-2">
	    			{!! Form::label('gradeToBeRegister', 'Grado que Cursa: ') !!}
					{!!Form::text('gradeToBeRegister', null, ['class'=> 'form-control','ng-model'=>'gradeToBeRegister','ng-disabled'=>'true']) !!}
				</div>
				
			</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('address', 'Dirección: ') !!}
					{!!Form::text('address', null, ['class'=> 'form-control', 'ng-model'=>'address','ng-disabled'=>'true']) !!}
				</div>
			</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-3">
	    			{!! Form::label('bornDate', 'Fecha de Nacimiento: ') !!}
					{!!Form::text('bornDate', null, ['class'=> 'form-control','ng-model'=>'bornDate','ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-3">
	    			{!! Form::label('bornPlace', 'Lugar de Nacimiento: ') !!}
					{!!Form::text('bornPlace', null, ['class'=> 'form-control','ng-model'=>'bornPlace','ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-3">
	    			{!! Form::label('height', 'Estatura: ') !!}
					{!!Form::text('height', null, ['class'=> 'form-control','ng-model'=>'height','ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-3">
	    			{!! Form::label('weight', 'Peso: ') !!}
					{!!Form::text('weight', null, ['class'=> 'form-control','ng-model'=>'weight','ng-disabled'=>'true']) !!}
				</div>

			</div>
			<br>
			<h3>Datos del Representante Legal</h3>    
			<br>
			<div class = "row">
				<div class= "col-md-4">
					{!! Form::label('personIdLR', 'Cedula de Identidad: ') !!}
					{!!Form::text('personIdLR', null, ['class'=> 'form-control', 'ng-model'=>'personIdLR','ng-disabled'=>'true', 'ng-change' => 'inputEdited()','data-toggle'=>"tooltip", 'title'=>"Cédula: V00000000 ó &#013; Escolar: 116V00000000"]) !!}
				</div>
				<div class= "col-md-4 col-md-push-1" >
					 <img ng-src="<%legRepPicture%>"  class="img-circle"  height: "200" width= "200" alt="Foto del Rep. Legal"> 	
				</div>
			</div>	
			<br>	
			<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('firstNameLR', 'Nombres: ') !!}
					{!!Form::text('firstNameLR', null, ['class'=> 'form-control', 'ng-model'=>'firstNameLR','ng-disabled'=>'true']) !!}
				</div>

				<div class= "col-md-4" ng-disabled = "true">
					{!! Form::label('lastNameLR', 'Apellidos: ') !!}
					{!!Form::text('lastNameLR', null, ['class'=> 'form-control','ng-model'=>'lastNameLR', 'ng-disabled'=>'true']) !!}
				</div>				
			</div>
			<br>
			<div class = "row">
				<div class= "col-md-4">
					{!! Form::label('mailLR', 'Correo: ') !!}
					{!!Form::text('mailLR', null, ['class'=> 'form-control','ng-model'=>'mailLR', 'ng-disabled'=>'true']) !!}
				</div>
				
				
				<div class= "col-md-4">
					{!! Form::label('relationshipLR', 'Parentesco con Alumno: ') !!}
					{!!Form::text('relationshipLR', null, ['class'=> 'form-control','ng-model'=>'relationshipLR', 'ng-disabled'=>'true']) !!}
				</div>
			</div>
			<br>
			<div class = "row">
				<div class= "col-md-4">
					{!! Form::label('home_phoneLR', 'Telefono Casa: ') !!}
					{!!Form::text('home_phoneLR', null, ['class'=> 'form-control','ng-model'=>'home_phoneLR', 'ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-4">
					{!! Form::label('mobile_phoneLR', 'Telefono Celular: ') !!}
					{!!Form::text('mobile_phoneLR', null, ['class'=> 'form-control','ng-model'=>'mobile_phoneLR', 'ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-4">
					{!! Form::label('work_phoneLR', 'Telefono Trabajo:') !!}
					{!!Form::text('work_phoneLR', null, ['class'=> 'form-control','ng-model'=>'work_phoneLR', 'ng-disabled'=>'true']) !!}
				</div>
			</div>
			<br>
			<div class = "row">
				<div class= "col-md-12" ng-disabled = "true">
					{!! Form::label('direction', 'Dirección de Habitación: ') !!}
					{!!Form::text('direction', null, ['class'=> 'form-control','ng-model'=>'directionLR', 'ng-disabled'=>'true']) !!}
				</div>
			</div>
			<br>

		</div>
		
		{!! Form::close() !!}

	</div>

	<script src="/js/min/findStudent.js"></script>
@endsection
