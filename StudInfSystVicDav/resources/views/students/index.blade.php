@extends('layouts.master')

@section('title', 'Ver Alumnos Inscritos')

@section('content')

	<h1>Alumnos Inscritos en la Escuela</h1>

	<div ng-controller="showStudentsController">

		<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

		<br>
		<div class="row">
			<div class= "col-md-12">

				<div style="overflow-x: auto;">
					<table ng-model= "table_id" id="table_id" class="table table-striped table-bordered display nowrap"  cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Cédula</th>
								<th>Alumno</th>
								<th>Apellido</th>
								<th>Grado</th>
								<th>Sección</th>
								<th>Hermanos en la Institución</th>
								<th>Hermanos en la Institución Apellido</th>
								<th> Representante Legal</th>
								<th> Representante Legal Apellido</th>
								<th> Cédula del Rep. Legal</th>
								<th>Padre</th>
								<th>Padre Apellido</th>
								<th>Madre</th>
								<th>Madre Apellido</th>
								<th> Profesor </th>
								<th> Profesor Apellido </th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<!-- 				<br>
				@foreach ($students as $student)

				 	<ui>
						<li>
							<label>Nombre y Apellido:</label>
							{{$student->person->name }} {{$student->person->last_name}}  <br>

							@foreach($student->brothers as $brother)
								<label>Sus Hermanos En La Institución: </label> {{$brother->person->name or ''}} {{$brother->person->last_name or ''}}   <br>

							@endforeach

							<label> Su Representante Legal: </label> {{$student->legalRepresentative->person->name}} {{$student->legalRepresentative->person->last_name}} <br>
							<label> Su Padre o Madre: </label> {{$student->parent->person->name or ''}} {{$student->parent->person->last_name or ''}} <br>
							<label> Su Profesor: </label> {{$student->teacher->person->name or 'No Asignado'}} {{$student->teacher->person->last_name or ''}}
						 </li>
					</ui>

					@endforeach -->
	</div>

	<script src="/js/dynamism_pages/showStudents.js"></script>

@endsection
