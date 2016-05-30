@extends('layouts.master')

@section('title', 'Inscribir Alumno')

@section('content')

	<h1>Inscribir Alumno</h1>

	<div ng-controller="createStudentController">

		{!! Form::open(array('url' => 'students', 'files'=>true)) !!}

		@foreach ($errors->all() as $error)
	    	<p class="alert alert-danger">{{ $error }}</p>
		@endforeach

		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		<!-- Getting the oldInput if form fails to use it to repopulate the form -->
		<?php
			$oldInput= old();
		?>

		<script>
			var oldInput = <?php echo json_encode($oldInput); ?>;
		</script>
		<!-- ////////////////////////////////////////////////////////////////// -->		

	    <div class= "form-group">

	    	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">
			<h3>Información del Alumno</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('document_id', 'Cédula de Identidad ó Escolar: ') !!}
					<input type="text" class="form-control"  data-toggle="tooltip" title="Cédula: V00000000 &#013; Escolar: 116V00000000" id="document_id" name="document_id" tooltip=""
					 value="{{old('document_id')}}"  placeholder="Ingrese Cédula del Alumno" ng-model= "documentId">
					 <!-- {!! var_dump(old())!!}
					 {!! var_dump(old('document_id'))!!} -->
				</div>

				<div class= "col-md-4 col-md-push-2">
					{!! Form::label('studentPicture', 'Fotografía: ') !!}
					<input type="file" id="picture" name="picture" onchange="readURL(this);" 
					 value="{{old('picture')}}" >
	   				 <img  id="studentPicture" name="studentPicture" src="picture" alt="Foto del Alumno" />
	   			</div>	 

	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('name', 'Nombre: ') !!}
					<input type="text" data-toggle="tooltip" title="Nombre del Alumno"  class="form-control"  id="name" name="name" placeholder="Nombre del Alumno" value="{{Request::old('name')}}" ng-model= "name">
				</div>

				<div class= "col-md-4">
					{!! Form::label('last_name', 'Apellido: ') !!}
					<input type="text" data-toggle="tooltip" title="Apellido del Alumno" class="form-control"  id="last_name" name="last_name" placeholder="Apellido del Alumno" value="{{Request::old('last_name')}}" ng-model= "lastName">
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
				<div class= "col-md-4">
					{!! Form::label('height', 'Estatura (m): ') !!}
					<input type="text" data-toggle="tooltip" title="Use punto (.) como separador decimal" class="form-control"  id="height" name="height" placeholder="Altura del Alumno" value="{{Request::old('height')}}" ng-model= "height">
				</div>

				<div class= "col-md-4">
					{!! Form::label('weight', 'Peso (kg): ') !!}
					<input type="text" data-toggle="tooltip" title="Use punto (.) como separador decimal" class="form-control"  id="weight" name="weight" placeholder="Peso del Alumno" value="{{Request::old('weight')}}" ng-model= "weight">
				</div>
	    	</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-6">
					{!! Form::label('born_place', 'Lugar de Nacimiento: ') !!}
					<input type="text" data-toggle="tooltip" title="Lugar de Nacimiento del Alumno" class="form-control"  id="born_place" name="born_place" placeholder="Lugar de Nacimiento del Alumno" value="{{Request::old('born_place')}}" ng-model= "bornPlace">
				</div>

				<div class= "col-md-6">
					{!! Form::label('born_date', 'Fecha de Nacimiento: (AAAA-MM-DD) ') !!}
					<input type="text" data-toggle="tooltip" title="Formato: 1995-04-17" class="form-control"  id="born_date" name="born_date" placeholder="Fecha de Nacimiento del Alumno" value="{{Request::old('born_date')}}" ng-model= "bornDate">
				</div>

			</div>

			<br>
			<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('home_address', 'Dirección: ') !!}
					<input type="text" class="form-control"  id="home_address" name="home_address" placeholder="Dirección del Alumno" value="{{Request::old('home_address')}}" ng-model= "homeAddress">
				</div>

			</div>

			<br>
			<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">
	    	<h3>Información del Representante Legal</h3>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-3">
					{!! Form::label('repLegDocId', 'Cedula de Identidad: ') !!}
					<input type="text" data-toggle="tooltip" title="Cédula: V00000000" class="form-control"  id="repLegDocId" name="repLegDocId" placeholder="Cédula del Rep. Legal" value="{{Request::old('repLegDocId')}}" ng-model= "repLegDocId">
				</div>
	    	</div>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
					{!! Form::label('repLegName', 'Nombre: ') !!}
					<input type="text" class="form-control"  id="repLegName" name="repLegName" placeholder="Nombre del Rep. Legal" value="{{Request::old('repLegName')}}" ng-model= "repLegName">
				</div>

				<div class= "col-md-4">
					{!! Form::label('repLegLastName', 'Apellido: ') !!}
					<input type="text" class="form-control"  id="repLegLastName" name="repLegLastName" placeholder="Apellido del Rep. Legal" value="{{Request::old('repLegLastName')}}" ng-model= "repLegLastName">
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
					{!! Form::label('repLegEmail', 'Correo Electrónico: ') !!}
					<input type="text" class="form-control"  id="repLegEmail" name="repLegEmail" placeholder="Email del Rep. Legal" value="{{Request::old('repLegEmail')}}" ng-model= "repLegEmail">

				</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
					{!! Form::label('repLegHomeAddress', 'Dirección de Casa: ') !!}
					<input type="text" class="form-control"  id="repLegHomeAddress" name="repLegHomeAddress" placeholder="Dirección de Habitación del Rep. Legal" value="{{Request::old('repLegHomeAddress')}}" ng-model= "repLegHomeAddress">
				</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('repLegWorkAddress', 'Dirección de Trabajo: ') !!}
						<input type="text" class="form-control"  id="repLegWorkAddress" name="repLegWorkAddress" placeholder="Dirección de Trabajo del Rep. Legal" value="{{Request::old('repLegWorkAddress')}}" ng-model= "repLegWorkAddress">
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-4">
						{!! Form::label('repLegHomePhone', 'Teléfono Casa: ') !!}
						<input type="text" class="form-control"  id="repLegHomePhone" name="repLegHomePhone" placeholder="Teléfono de Habitación del Rep. Legal" value="{{Request::old('repLegHomePhone')}}" ng-model= "repLegHomePhone">
				</div>
				<div class= "col-md-4">
						{!! Form::label('repLegMobilePhone', 'Teléfono Movil: ') !!}
						<input type="text" class="form-control"  id="repLegMobilePhone" name="repLegMobilePhone" placeholder="Teléfono Móvil del Rep. Legal" value="{{Request::old('repLegMobilePhone')}}" ng-model= "repLegMobilePhone">
				</div>
				<div class= "col-md-4">
						{!! Form::label('repLegWorkPhone', 'Teléfono de Trabajo: ') !!}
						 <input type="text" class="form-control"  id="repLegWorkPhone" name="repLegWorkPhone" placeholder="Teléfono del Trabajo del Rep. Legal" value="{{Request::old('repLegWorkPhone')}}" ng-model= "repLegWorkPhone">
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
						{!! Form::label('', 'Relación del Rep. Legal con el Alumno: (Sí es Padre o Madre la información sera llenada automáticamente para luego ser almacenada en el registro. Asegurese de haber llenado todos los datos del Rep. Legal antes de seleccionar algúna de las opciones) ') !!}
				</div>
				<!-- OJOOO SI ES PADRE O MADRE TENEMOS QUE VER QUIE EN EL CONTROLADOR STORE GUARDE A LA PERSON UNA SOLA VEZ Y LA USE TANTO PARA REP LEG COMO PARA PADRE O MADRE -->
			</div>
				
			<div class = "row">			
				<div class= "col-md-2" >
						<input  type="radio" name="relationshipWithStudent"
						 ng-model= "relationshipWithStudent" checked 
						 ng-change= "relationshipWithStudentChange()" 
						 value="isDad"> Padre
				</div>
				<div class= "col-md-2" >		
						<input   type="radio" name="relationshipWithStudent"
						 ng-model= "relationshipWithStudent" ng-change= "relationshipWithStudentChange()"
						  value="isMom"> Madre
				</div>
				<div class= "col-md-2" >		
						<input  type="radio" name="relationshipWithStudent" 
						ng-model= "relationshipWithStudent" ng-change= "relationshipWithStudentChange()"
						value="isOther"> Otra
				</div>
				<div class= "col-md-4">		
						{!! Form::label('selectedRelationshipWithStudent', 'Especifique Relación: ') !!}
					
						 <input type="text" class="form-control"  id="selectedRelationshipWithStudent" 
						 name="selectedRelationshipWithStudent" placeholder="Relación Seleccionada"
						  value="{{Request::old('selectedRelationshipWithStudent')}}"
						  ng-model= "selectedRelationshipWithStudent" 
						  ng-readonly= 'relationshipWithStudent==null||relationshipWithStudent=="isDad"||relationshipWithStudent=="isMom"' >
				</div>
			</div>
			<div class = "row">
				<div class= "col-md-6">
				{!! Form::label('authorizedBy', 'Autorizado Por: ') !!}
					<input type="text" class="form-control"  id="authorizedBy" name="authorizedBy" placeholder="¿Quien Autoriza a Ser Representante Legal del Alumno?" value="{{Request::old('authorizedBy')}}" ng-model= "authorizedBy">
				</div>	

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12" >
					<label>¿Desea Registrar Información de los Padres? (Sí en la Opción Anterior Selecciono el Padre o Madre Solo Se le Permitira Registrar Al Otro Padre No Seleccionado)</label>
				</div>
			</div>


			<div class = "row">
				<div class= "col-md-4" >		
							<input  type="checkbox" ng-change="" 
							ng-model= "informationFromFather"  id="infFather" name="infFather" value="true"> Información del Padre
				</div>
				<div class= "col-md-4" >		
							<input  type="checkbox" ng-change="" 
							ng-model= "informationFromMother" id="infMother" name="infMother" value="true"> Información de la Madre
				</div>
			</div>				

			<br>
	    	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">
	    	<h3 ng-show= "informationFromFather||informationFromMother">Información de los Padres</h3>
	    	
	    	<br>
	    	<div ng-show= "informationFromFather">
	    		<hr>
		    	<h4>Datos del Padre</h4>
		    	<div class = "row">
		    		<div class= "col-md-3">
						{!! Form::label('fatherDocId', 'Cedula de Identidad: ') !!}
						{!!Form::text('parentDocId', null, ['class'=> 'form-control', 'ng-model'=>'parentDocId']) !!}
					</div>

					<div class= "col-md-3">	
						<input name="fatherLiveWithTheStudent" ng-model= "fatherLiveWithStudent" type="checkbox" value="true"> 
						Vive con el Alumno
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
						{!! Form::label('fatherEmail', 'Correo Electrónico: ') !!}
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
							{!! Form::label('fatherHomePhone', 'Teléfono Casa: ') !!}
							{!!Form::text('fatherHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomePhone']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('fatherMobilePhone', 'Teléfono Movil: ') !!}
							{!!Form::text('fatherMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherMobilePhone']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('fatherWorkPhone', 'Teléfono de Trabajo: ') !!}
							{!!Form::text('fatherWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherWorkPhone']) !!}
					</div>
				</div>
			</div>
			<div ng-show= "informationFromMother">
				<hr>
		    	<h4>Datos de la Madre</h4>
		    	<div class = "row">
		    		<div class= "col-md-3">
						{!! Form::label('motherDocId', 'Cedula de Identidad: ') !!}
						{!!Form::text('motherDocId', null, ['class'=> 'form-control', 'ng-model'=>'motherDocId']) !!}
					</div>
					<div class= "col-md-3">	
						<input name="motherLiveWithTheStudent" ng-model= "motherLiveWithStudent" type="checkbox" value="true"> 
						Vive con el Alumno
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
						{!! Form::label('motherEmail', 'Correo Electrónico: ') !!}
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
							{!! Form::label('motherHomePhone', 'Teléfono Casa: ') !!}
							{!!Form::text('fatherHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomePhone']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('motherMobilePhone', 'Teléfono Movil: ') !!}
							{!!Form::text('motherMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'motherMobilePhone']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('motherWorkPhone', 'Teléfono de Trabajo: ') !!}
							{!!Form::text('motherWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'motherWorkPhone']) !!}
					</div>
				</div>		
			</div>	

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			{!!Form::submit('Registrar Alumno', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>	
	    	</div>
		</div>
		
		{!! Form::close() !!}

	</div>
	
	<script src="/js/createStudent.js"></script>  
@endsection