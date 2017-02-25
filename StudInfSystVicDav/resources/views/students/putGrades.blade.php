@extends('layouts.master')

@section('title', 'Ver Alumnos Inscritos')

@section('content')

	<h1>Alumnos Inscritos en la Escuela</h1>

	<div ng-controller="putGradesStudentController">

		<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

		<br>

		<div class = "row">
			<div class = "col-md-3">
			{!! Form::label('grade', 'Seleccione Grado: ') !!}
				{!!Form::select('grade', array('1' => '1°', '2' => '2°', '3' => '3°'), null, ['ng-model'=>'grade']) !!}
			</div>
			<div class = "col-md-3">
				{!! Form::label('section', 'Seleccione Sección: ') !!}
				{!!Form::select('section', array('A' => 'A', 'B' => 'B'), null, ['ng-model'=>'section']) !!}
			</div>
			<div class= "col-md-1" >
				<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findStudentsInGradeSection()">
				</button>
			</div>

		</div>

		<br>
		<br>

		<div class= "row">
			<div class = "col-md-3">
				{!! Form::label('name', 'Nombre: ') !!}
			</div>
			<div class = "col-md-3">
				{!! Form::label('last_name', 'Apellido: ') !!}
			</div>
			<div class = "col-md-3">
			{!! Form::label('grade', 'Literal: ') !!}
			</div>
			<div class = "col-md-3">
				&nbsp;
			</div>
		</div>
		<div class="row" ng-repeat= "student in students track by $index">
			<div class = "col-md-3">
				<input type="text" name=""  ng-model="student.name" ng-disabled= "true">
			</div>
			<div class = "col-md-3">
				<input type="text" name=""  ng-model="student.last_name" ng-disabled= "true">
			</div>
			<div class = "col-md-3">
				{!!Form::select('grade', array('1' => 'Deficiente', '2' => 'En Proceso', '3' => 'Consolidado'), null, ['ng-model'=>'literal']) !!}
			</div>
			<div class = "col-md-3">
				<button ng-click="asignarNotaAlumno()">Asignar</button>
			</div>
		</div>
	</div>

	<script src="/js/dynamism_pages/putGradesStudents.js"></script>

@endsection
