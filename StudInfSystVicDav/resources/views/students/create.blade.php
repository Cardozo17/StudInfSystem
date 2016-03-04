@extends('master')

@section('title', 'Inscribir Estudiante')

@section('content')

	<h1>Inscribir Estudiante</h1>

	<div ng-controller="createStudentController">

		<label ng-model= "prueba">La etiqueta</label>

		{!! Form::open(array('url' => 'students')) !!}

		@foreach ($errors->all() as $error)
	    	<p class="alert alert-danger">{{ $error }}</p>
		@endforeach

		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
	    
	    <div class= "form-group">

			<h3>Información del Estudiante</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3"  ng-click= "ponercedula()">
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'cedula']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('name', 'Nombre: ') !!}
					{!!Form::text('name', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-4">
					{!! Form::label('last_name', 'Apellido: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control']) !!}
				</div>
				<br>
				<br>
				<div class = "col-md-4">
					{!! Form::label('gender', 'Genero: ') !!}
					{!!Form::select('gender', array('MALE' => 'Masculino', 'FEMALE' => 'Femenino')) !!}
				</div>
			</div>

			<br>
			<div class = "row">
	    		
				<div class= "col-md-5">
					{!! Form::label('email', 'Correo Electronico: ') !!}
					{!!Form::text('email', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-3">
					{!! Form::label('height', 'Altura: ') !!}
					{!!Form::text('height', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-3">
					{!! Form::label('weight', 'Peso: ') !!}
					{!!Form::text('weight', null, ['class'=> 'form-control']) !!}
				</div>
	    	</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('born_place', 'Lugar de Nacimiento: ') !!}
					{!!Form::text('born_place', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-6">
					{!! Form::label('born_date', 'Fecha de Nacimiento: ') !!}
					{!!Form::text('born_date', null, ['class'=> 'form-control']) !!}
				</div>

			</div>

	    	<h3>Información del Representante Legal</h3>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('repLegDocId', 'Cedula de Identidad: ') !!}
					{!!Form::text('repLegDocId', null, ['class'=> 'form-control']) !!}
				</div>
	    	</div>
			<br>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('repLegName', 'Nombre: ') !!}
					{!!Form::text('repLegName', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-4">
					{!! Form::label('repLegLastName', 'Apellido: ') !!}
					{!!Form::text('repLegLastName', null, ['class'=> 'form-control']) !!}
				</div>
				<br>
				<br>
				<div class= "col-md-4">
					{!! Form::label('repLegGender', 'Genero: ') !!}
					{!!Form::select('repLegGender', array('MALE' => 'Masculino', 'FEMALE' => 'Femenino')) !!}
				</div>
			</div>

			<br>
			<div class = "row">
	    		
				<div class= "col-md-6">
					{!! Form::label('repLegEmail', 'Correo Electronico: ') !!}
					{!!Form::text('repLegEmail', null, ['class'=> 'form-control']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('home_address', 'Dirección de Casa: ') !!}
					{!!Form::text('home_address', null, ['class'=> 'form-control']) !!}
				</div>

				<div class= "col-md-6">
					{!! Form::label('work_address', 'Dirección de Trabajo: ') !!}
					{!!Form::text('work_address', null, ['class'=> 'form-control']) !!}
				</div>

			</div>


	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			{!!Form::submit('Registrar Estudiante', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>	
	    	</div>
		
			
		</div>
		
		{!! Form::close() !!}

	</div>

	<script src="/js/createStudent.js"></script>
@endsection