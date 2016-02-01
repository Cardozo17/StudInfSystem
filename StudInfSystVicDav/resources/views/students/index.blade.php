@extends('master')

@section('content')
	
	<div class="container-fluid" >
		<div class= "col-md-12">
			<h2>Estudiantes Registrados</h2>

			@foreach ($students as $student)

				<ui>	
					<li>
						<label>Nombre y Apellido:</label>
						{{$student->person->name }} {{$student->person->last_name}}  <br>
						<label>Sus Hermanos: </label> {{$student->brothers}}  <br>
						<label> Su Profesor: </label> {{$student->teacher}} <br>
						<label> Su Representante Legal: </label> {{$student->legalRepresentative}} <br>
						<label> Su Padre o Madre: </label> {{$student->parent->person->name}} <br>
					 </li>
				</ui>	  

			@endforeach
		</div>
	</div>	
		

	
@stop