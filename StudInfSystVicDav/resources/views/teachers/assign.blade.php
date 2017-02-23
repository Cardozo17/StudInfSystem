@extends('layouts.master')

@section('title', 'Asignar Docente')

@section('content')

	<h1>Asignar Docente a Grado y Sección</h1>

	<div ng-controller="assignTeacherController">

	    {!! Form::open(array('action' => array('TeacherController@assignTeacher'))) !!}

	    @if(session('status'))
			<div id= "successAlert" class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		 @if(session('error_status'))
			<div id= "errorAlertFromForm" class="alert alert-danger fade in">
				{{ session('error_status') }}
			</div>
		@endif

	    <!-- Error Message -->
	    <div class="alert alert-danger fade in" ng-model= "error_status" ng-bind="error_status" id = "errorAlertFromJS">
	    </div>

	    <div class= "form-group">
	    	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

			<h3>Indique la Cédula</h3>
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3" >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId', 'ng-change' => 'inputEdited()','data-toggle'=>"tooltip", 'title'=>"Cédula: V00000000", 'placeholder'=>"Cédula del Docente"]) !!}
				</div>
				<br>
				<div class= "col-md-1" >
					<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findTeacherInformation()"></button>
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
			</div>

			<h3>Datos de Asignación</h3>
			<br>
			<div class = "row">
					<div class = "col-md-6">
						{!! Form::label('grade_to_be_assigned', 'Grado:&nbsp;&nbsp;&nbsp;&nbsp; ') !!}
						{!!Form::select('grade_to_be_assigned', array('1' => '1°', '2' => '2°', '3' => '3°')) !!}
					</div>
					<div class = "col-md-6">
						{!! Form::label('section_to_be_assigned', 'Sección:&nbsp;&nbsp;&nbsp;&nbsp; ') !!}
						{!!Form::select('section_to_be_assigned', array('A' => 'A', 'B' => 'B')) !!}
					</div>
			</div>
			<br>
			<div class = "row">
	    		<div class= "col-md-12">
	    			{!!Form::submit('Asignar Docente', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>
	    	</div>
		</div>

		{!! Form::close() !!}

	</div>

	<script src="/js/dynamism_pages/assignTeacher.js"></script>
@endsection
