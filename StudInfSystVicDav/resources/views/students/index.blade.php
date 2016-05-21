@extends('layouts.master')

@section('title', 'Ver Alumnos Inscritos')

@section('content')	
	
	<div ng-controller="showStudentsController">
		<div class="container-fluid" >
			<div class= "col-md-12">
				<h2>Alumnos Registrados</h2>

				<br>	
				<div class="row">
					<div class=" col-md-12">
						<table ng-model= "table_id" id="table_id" class="table table-striped table-bordered"  cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Cedula </th>
									<th>Nombre </th>
									<th>Apellido</th>
									<th>Hermanos en la Institución</th>
									<th>Hermanos en la Institución Apellido</th>
									<th> Representante Legal</th>
									<th> Representante Legal Apellido</th>
									<th>Padre o Madre</th>
									<th>Padre o Madre Apellido</th>
									<th> Profesor </th> 
								</tr>	
							</thead>
								<tbody>
								</tbody>
							</table>
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
		</div>	
	</div>

	<script src="/js/showStudents.js"></script>

@endsection