@extends('master')

@section('title', 'Inscribir Estudiante')

@section('content')

	<h1>Inscribir Estudiante</h1>

	<div ng-controller="createStudentController">

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

	    	<hr>
			<h3>Información del Estudiante</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'cedula']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('name', 'Nombre: ') !!}
					{!!Form::text('name', null, ['class'=> 'form-control', 'ng-model'=>'name']) !!}
				</div>

				<div class= "col-md-4">
					{!! Form::label('last_name', 'Apellido: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control' , 'ng-model'=>'lastName']) !!}
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
	    		
				<div class= "col-md-6">
					{!! Form::label('email', 'Correo Electronico: ') !!}
					{!!Form::email('email', null, ['class'=> 'form-control' , 'ng-model'=>'email']) !!}
				</div>

				<div class= "col-md-3">
					{!! Form::label('height', 'Altura: ') !!}
					{!!Form::text('height', null, ['class'=> 'form-control' , 'ng-model'=>'height']) !!}
				</div>

				<div class= "col-md-3">
					{!! Form::label('weight', 'Peso: ') !!}
					{!!Form::text('weight', null, ['class'=> 'form-control' , 'ng-model'=>'weight']) !!}
				</div>
	    	</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('born_place', 'Lugar de Nacimiento: ') !!}
					{!!Form::text('born_place', null, ['class'=> 'form-control' , 'ng-model'=>'bornPlace']) !!}
				</div>

				<div class= "col-md-6">
					{!! Form::label('born_date', 'Fecha de Nacimiento: ') !!}
					{!!Form::date('born_date', null, ['class'=> 'form-control', 'type'=>'date' , 'ng-model'=>'bornDate']) !!}
				</div>

			</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('home_address', 'Dirección: ') !!}
					{!!Form::text('home_address', null, ['class'=> 'form-control' , 'ng-model'=>'homeAddresss']) !!}
				</div>

			</div>

			<br>
			<hr>
	    	<h3>Información del Representante Legal</h3>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('repLegDocId', 'Cedula de Identidad: ') !!}
					{!!Form::text('repLegDocId', null, ['class'=> 'form-control' , 'ng-model'=>'repLegDocId']) !!}
				</div>
	    	</div>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('repLegName', 'Nombre: ') !!}
					{!!Form::text('repLegName', null, ['class'=> 'form-control' , 'ng-model'=>'repLegName']) !!}
				</div>

				<div class= "col-md-4">
					{!! Form::label('repLegLastName', 'Apellido: ') !!}
					{!!Form::text('repLegLastName', null, ['class'=> 'form-control' , 'ng-model'=>'repLegLastName']) !!}
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
					{!!Form::text('repLegEmail', null, ['class'=> 'form-control' , 'ng-model'=>'repLegEmail']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('repLegHomeAddress', 'Dirección de Casa: ') !!}
					{!!Form::text('repLegHomeAddress', null, ['class'=> 'form-control', 'ng-model'=>'repLegHomeAddress']) !!}
				</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('repLegWorkAddress', 'Dirección de Trabajo: ') !!}
						{!!Form::text('repLegWorkAddress', null, ['class'=> 'form-control', 'ng-model'=>'repLegHomeAddress']) !!}
				</div>
			</div>

			<div class = "row">
				<div class= "col-md-4">
						{!! Form::label('repLegHomePhone', 'Telefono Casa: ') !!}
						{!!Form::text('repLegHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'repLegHomePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('repLegMobilePhone', 'Telefono Movil: ') !!}
						{!!Form::text('repLegMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'repLegMobilePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('repLegWorkPhone', 'Telefono de Trabajo: ') !!}
						{!!Form::text('repLegWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'repLegWorkPhone']) !!}
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('', 'Relación con el Estudiante: ') !!}
				</div>
			</div>
				
			<div class = "row">			
				<div class= "col-md-2" >
						<input  type="radio" ng-model= "relationShipWithStudent"  ng-value= "Dad"
						name="isDad"  value="Dad"> Padre
				</div>
				<div class= "col-md-2" >		
						<input   type="radio" ng-model= "relationShipWithStudent" ng-value="Mom" 
						 name="isMom" value="Mom"> Madre
				</div>
				<div class= "col-md-2" >		
						<input  type="radio" ng-model= "relationShipWithStudent" ng-value="Other" name="isOther"
						  value="Other"> Otra
				</div>
				<div class= "col-md-4">		
						{!! Form::label('relationshipWithStudent', 'Especifique Relación: ') !!}
						{!!Form::text('relationshipWithStudent', null, ['class'=> 'form-control', 'ng-model'=>'relationshipWithStudent', 'ng-disabled'=>'isDad||isMom']) !!}
				</div>
			</div>			

			<br>
	    	<hr>
	    	<h3>Información de los Padres</h3>
	    	
	    	<br>
	    	<h4>Padre</h4>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('fatherDocId', 'Cedula de Identidad: ') !!}
					{!!Form::text('parentDocId', null, ['class'=> 'form-control', 'ng-model'=>'parentDocId']) !!}
				</div>

				<div class= "col-md-3">	
					<input name="fatherLiveWithTheStudent" ng-model= "fatherLiveWithStudent" type="checkbox" value="true"> 
					Vive con el Estudiante
				</div>	
	    	</div>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('fatherName', 'Nombre: ') !!}
					{!!Form::text('fatherName', null, ['class'=> 'form-control', 'ng-model'=>'fatherName']) !!}
				</div>

				<div class= "col-md-6">
					{!! Form::label('fatherLastName', 'Apellido: ') !!}
					{!!Form::text('fatherLastName', null, ['class'=> 'form-control', 'ng-model'=>'fatherLastName']) !!}
				</div>
				<br>
				<br>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-6">
					{!! Form::label('fatherEmail', 'Correo Electronico: ') !!}
					{!!Form::text('fatherEmail', null, ['class'=> 'form-control', 'ng-model'=>'fatherEmail']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('fatherHomeAddress', 'Dirección de Casa: ') !!}
					{!!Form::text('fatherHomeAddress', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomeAddress']) !!}
				</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('fatherWorkAddress', 'Dirección de Trabajo: ') !!}
						{!!Form::text('fatherWorkAddress', null, ['class'=> 'form-control', 'ng-model'=>'fatherWorkAddress']) !!}
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-4">
						{!! Form::label('fatherHomePhone', 'Telefono Casa: ') !!}
						{!!Form::text('fatherHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('fatherMobilePhone', 'Telefono Movil: ') !!}
						{!!Form::text('fatherMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherMobilePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('fatherWorkPhone', 'Telefono de Trabajo: ') !!}
						{!!Form::text('fatherWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherWorkPhone']) !!}
				</div>
			</div>

			<br>
	    	<h4>Madre</h4>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('motherDocId', 'Cedula de Identidad: ') !!}
					{!!Form::text('motherDocId', null, ['class'=> 'form-control', 'ng-model'=>'motherDocId']) !!}
				</div>
				<div class= "col-md-3">	
					<input name="motherLiveWithTheStudent" ng-model= "motherLiveWithStudent" type="checkbox" value="true"> 
					Vive con el Estudiante
				</div>	
	    	</div>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('motherName', 'Nombre: ') !!}
					{!!Form::text('motherName', null, ['class'=> 'form-control', 'ng-model'=>'motherName']) !!}
				</div>

				<div class= "col-md-6">
					{!! Form::label('motherLastName', 'Apellido: ') !!}
					{!!Form::text('motherLastName', null, ['class'=> 'form-control', 'ng-model'=>'motherLastName']) !!}
				</div>
				<br>
				<br>
			</div>

			<br>
			<div class = "row">
	    		
				<div class= "col-md-6">
					{!! Form::label('motherEmail', 'Correo Electronico: ') !!}
					{!!Form::text('motherEmail', null, ['class'=> 'form-control', 'ng-model'=>'motherEmail']) !!}
				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('motherHomeAddress', 'Dirección de Casa: ') !!}
					{!!Form::text('motherHomeAddress', null, ['class'=> 'form-control', 'ng-model'=>'motherHomeAddress']) !!}
				</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('motherWorkAddress', 'Dirección de Trabajo: ') !!}
						{!!Form::text('motherWorkAddress', null, ['class'=> 'form-control', 'ng-model'=>'motherWorkAddress']) !!}
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-4">
						{!! Form::label('motherHomePhone', 'Telefono Casa: ') !!}
						{!!Form::text('fatherHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('motherMobilePhone', 'Telefono Movil: ') !!}
						{!!Form::text('motherMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'motherMobilePhone']) !!}
				</div>
				<div class= "col-md-4">
						{!! Form::label('motherWorkPhone', 'Telefono de Trabajo: ') !!}
						{!!Form::text('motherWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'motherWorkPhone']) !!}
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