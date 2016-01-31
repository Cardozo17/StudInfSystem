@extends('master')

@section('content')
	
	
		<h2>Estudiantes Registrados</h2>


		@foreach ($students as $student)

			<ui>	
				<li>
					<label>Nombre:</label>
					{{$student->person->name }} {{$student->person->last_name}} 
				 </li>
			</ui>	  

		@endforeach
		<li></li>
		

	
@stop