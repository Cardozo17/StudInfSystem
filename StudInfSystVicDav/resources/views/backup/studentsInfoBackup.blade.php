@extends('layouts.master')

@section('title', 'Respaldo')

@section('content')	
	
	<h1>Respaldo de Alumnos Inscritos en la Institución</h1>

	<div ng-controller="showStudentsController">

		<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

		<br>	
		<div class="row">
			<div class=" col-md-12">
				<div style="overflow-x: auto;">
					<table ng-model= "table_id" id="table_id" class="table table-striped table-bordered display nowrap"  cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Cédula</th>
								<th>Alumno</th>
								<th>Apellido</th>
								<th>Grado</th>
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
	</div>	

	<script src="/js/min/studentsInfoBackUp.js"></script>

@endsection
