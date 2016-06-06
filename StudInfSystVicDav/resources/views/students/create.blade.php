@extends('layouts.master')

@section('title', 'Inscribir Alumno')

@section('content')

	<h1>Inscribir Alumno</h1>

	<div ng-controller="createStudentController">

		{!! Form::open(array('url' => 'students', 'files'=>true)) !!}

<!-- 		@foreach ($errors->all() as $error)
	    	<p class="alert alert-danger">{{ $error }}</p>
		@endforeach -->
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
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('document_id') ? ' has-error' : '' }}">
	    				{!! Form::label('document_id', 'Cédula de Identidad ó Escolar: ') !!}
	    				<input type="text" class="form-control" data-toggle="tooltip" title="Cédula: V00000000 ó &#013; Escolar: 116V00000000" id="document_id" name="document_id"
	    				value="{{old('document_id')}}"  placeholder="Cédula del Alumno" ng-model= "documentId">
	    				<!--  {!! var_dump(old())!!} -->

	    				@if ($errors->has('document_id'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('document_id') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>

				<div class= "col-md-4 col-md-push-2">
					{!! Form::label('studentPicture', 'Fotografía: ') !!}
					<input type="file" id="picture" name="picture" ng-model="picture"  onchange="readURLStudent(this);">
	   				 <img  id="studentPicture" name="studentPicture" ng-model="studentPicture" src="picture" alt="Foto del Alumno" />
	   			</div>	 
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	    				{!! Form::label('name', 'Nombre: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Nombre del Alumno"  class="form-control"  id="name" name="name" placeholder="Nombre del Alumno" value="{{Request::old('name')}}" ng-model= "name">

	    				@if ($errors->has('name'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('name') }}</strong>
	    				</span>
	    				@endif 
	    			</div>
	    		</div>	 

	    		
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">	
	    				{!! Form::label('last_name', 'Apellido: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Apellido del Alumno" class="form-control"  id="last_name" name="last_name" placeholder="Apellido del Alumno" value="{{Request::old('last_name')}}" ng-model= "lastName">

	    				@if ($errors->has('last_name'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('last_name') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>	

	    		<br>
				<div class = "col-md-4">
					{!! Form::label('gender', 'Genero: ') !!}
					{!!Form::select('gender', array('MALE' => 'Masculino', 'FEMALE' => 'Femenino')) !!}
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-6">
					<div class="form-group{{ $errors->has('born_place') ? ' has-error' : '' }}">
						{!! Form::label('born_place', 'Lugar de Nacimiento: ') !!}
						<input type="text" data-toggle="tooltip" title="Lugar de Nacimiento del Alumno" class="form-control"  id="born_place" name="born_place" placeholder="Lugar de Nacimiento del Alumno" value="{{Request::old('born_place')}}" ng-model= "bornPlace">
					
						@if ($errors->has('born_place'))
						<span class="help-block">
							<strong>{{ $errors->first('born_place') }}</strong>
						</span>
						@endif

					</div>
				</div>

				
				<div class= "col-md-6">
					<div class="form-group{{ $errors->has('born_date') ? ' has-error' : '' }}">
						{!! Form::label('born_date', 'Fecha de Nacimiento: (AAAA-MM-DD) ') !!}
						<input type="text" data-toggle="tooltip" title="Formato: 1995-04-17" class="form-control"  id="born_date" name="born_date" placeholder="Fecha de Nacimiento del Alumno" value="{{Request::old('born_date')}}" ng-model= "bornDate">

						@if ($errors->has('born_date'))
						<span class="help-block">
							<strong>{{ $errors->first('born_date') }}</strong>
						</span>
						@endif
					</div>
				</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
					<div class="form-group{{ $errors->has('home_address') ? ' has-error' : '' }}">
						{!! Form::label('home_address', 'Dirección: ') !!}
						<input type="text" class="form-control"  id="home_address" name="home_address" placeholder="Dirección del Alumno" value="{{Request::old('home_address')}}" ng-model= "homeAddress">

						@if ($errors->has('home_address'))
						<span class="help-block">
							<strong>{{ $errors->first('home_address') }}</strong>
						</span>
						@endif
					</div>
				</div>

			</div>

			<br>
			<div class = "row">
					<div class = "col-md-6">
						{!! Form::label('grade_to_be_register', 'Grado Donde se Inscribe el Alumno: ') !!}
						{!!Form::select('grade_to_be_register', array('1°' => '1°', '2°' => '2°', '3°' => '3°', '4°' => '4°', '5°' => '5°', '6°' => '6°')) !!}
					</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-4">
					<div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
						{!! Form::label('height', 'Estatura (m): ') !!}
						<input type="text" data-toggle="tooltip" title="Use punto (.) como separador decimal" class="form-control"  id="height" name="height" placeholder="Altura del Alumno" value="{{Request::old('height')}}" ng-model= "height">

						@if ($errors->has('height'))
						<span class="help-block">
							<strong>{{ $errors->first('height') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class= "col-md-4">
					<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
						{!! Form::label('weight', 'Peso (kg): ') !!}
						<input type="text" data-toggle="tooltip" title="Use punto (.) como separador decimal" class="form-control"  id="weight" name="weight" placeholder="Peso del Alumno" value="{{Request::old('weight')}}" ng-model= "weight">

						@if ($errors->has('weight'))
						<span class="help-block">
							<strong>{{ $errors->first('weight') }}</strong>
						</span>
						@endif

					</div>
				</div>
	    	</div>

			<br>
			<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">
	    	<h3>Información del Representante Legal</h3>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('repLegDocId') ? ' has-error' : '' }}">
	    				{!! Form::label('repLegDocId', 'Cedula de Identidad: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Cédula: V00000000" class="form-control"  id="repLegDocId" name="repLegDocId" placeholder="Cédula del Rep. Legal" value="{{Request::old('repLegDocId')}}" ng-model= "repLegDocId">

	    				@if ($errors->has('repLegDocId'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('repLegDocId') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>
				<div class= "col-md-4 col-md-push-2">
					{!! Form::label('studentPicture', 'Fotografía: ') !!}
					<input type="file" id="repLegPicture" name="repLegPicture" ng-model="repLegPicture" onchange="readURLRepLeg(this);">
	   				 <img  id="repPicture" name="repPicture" ng-model="repPicture" src="repPicture" alt="Foto del Rep. Legal" />
	   			</div>	 
	    	</div>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('repLegName') ? ' has-error' : '' }}">
	    				{!! Form::label('repLegName', 'Nombre: ') !!}
	    				<input type="text" class="form-control"  id="repLegName" name="repLegName" placeholder="Nombre del Rep. Legal" value="{{Request::old('repLegName')}}" ng-model= "repLegName">

	    				@if ($errors->has('repLegName'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('repLegName') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>

	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('repLegLastName') ? ' has-error' : '' }}">
	    				{!! Form::label('repLegLastName', 'Apellido: ') !!}
	    				<input type="text" class="form-control"  id="repLegLastName" name="repLegLastName" placeholder="Apellido del Rep. Legal" value="{{Request::old('repLegLastName')}}" ng-model= "repLegLastName">

	    				@if ($errors->has('repLegLastName'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('repLegLastName') }}</strong>
	    				</span>
	    				@endif

	    			</div>
	    		</div>

	    		<br>
				<div class= "col-md-4">
					{!! Form::label('repLegGender', 'Genero: ') !!}
					{!!Form::select('repLegGender', array('MALE' => 'Masculino', 'FEMALE' => 'Femenino')) !!}
				</div>
			</div>
	
			<br>
			<div class = "row">
				<div class= "col-md-6">
					<div class="form-group{{ $errors->has('repLegEmail') ? ' has-error' : '' }}">
						{!! Form::label('repLegEmail', 'Correo Electrónico: ') !!}
						<input type="text" class="form-control"  id="repLegEmail" name="repLegEmail" placeholder="Email del Rep. Legal" value="{{Request::old('repLegEmail')}}" ng-model= "repLegEmail">

						@if ($errors->has('repLegEmail'))
						<span class="help-block">
							<strong>{{ $errors->first('repLegEmail') }}</strong>
						</span>
						@endif

					</div>	
				</div>
			</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			<div class="form-group{{ $errors->has('repLegHomeAddress') ? ' has-error' : '' }}">
	    				{!! Form::label('repLegHomeAddress', 'Dirección de Casa: ') !!}
	    				<input type="text" class="form-control"  id="repLegHomeAddress" name="repLegHomeAddress" placeholder="Dirección de Habitación del Rep. Legal" value="{{Request::old('repLegHomeAddress')}}" ng-model= "repLegHomeAddress">

	    				@if ($errors->has('repLegHomeAddress'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('repLegHomeAddress') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>

			</div>

			<br>
			<div class = "row">
				<div class= "col-md-12">
					<div class="form-group{{ $errors->has('repLegWorkAddress') ? ' has-error' : '' }}">
						{!! Form::label('repLegWorkAddress', 'Dirección de Trabajo: ') !!}
						<input type="text" class="form-control"  id="repLegWorkAddress" name="repLegWorkAddress" placeholder="Dirección de Trabajo del Rep. Legal" value="{{Request::old('repLegWorkAddress')}}" ng-model= "repLegWorkAddress">

						@if ($errors->has('repLegWorkAddress'))
						<span class="help-block">
							<strong>{{ $errors->first('repLegWorkAddress') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>

			<br>
			<div class = "row">
				<div class= "col-md-4">
					<div class="form-group{{ $errors->has('repLegHomePhone') ? ' has-error' : '' }}">
						{!! Form::label('repLegHomePhone', 'Teléfono Casa: ') !!}
						<input type="text" class="form-control"  id="repLegHomePhone" name="repLegHomePhone" placeholder="Teléfono de Habitación del Rep. Legal" value="{{Request::old('repLegHomePhone')}}" ng-model= "repLegHomePhone">

						@if ($errors->has('repLegHomePhone'))
						<span class="help-block">
							<strong>{{ $errors->first('repLegHomePhone') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class= "col-md-4">
					<div class="form-group{{ $errors->has('repLegMobilePhone') ? ' has-error' : '' }}">
						{!! Form::label('repLegMobilePhone', 'Teléfono Movil: ') !!}
						<input type="text" class="form-control"  id="repLegMobilePhone" name="repLegMobilePhone" placeholder="Teléfono Móvil del Rep. Legal" value="{{Request::old('repLegMobilePhone')}}" ng-model= "repLegMobilePhone">

						@if ($errors->has('repLegMobilePhone'))
						<span class="help-block">
							<strong>{{ $errors->first('repLegMobilePhone') }}</strong>
						</span>
						@endif
					</div>	
				</div>
				<div class= "col-md-4">
					<div class="form-group{{ $errors->has('repLegWorkPhone') ? ' has-error' : '' }}">
						{!! Form::label('repLegWorkPhone', 'Teléfono de Trabajo: ') !!}
						<input type="text" class="form-control"  id="repLegWorkPhone" name="repLegWorkPhone" placeholder="Teléfono del Trabajo del Rep. Legal" value="{{Request::old('repLegWorkPhone')}}" ng-model= "repLegWorkPhone">

						@if ($errors->has('repLegWorkPhone'))
						<span class="help-block">
							<strong>{{ $errors->first('repLegWorkPhone') }}</strong>
						</span>
						@endif
						
					</div>
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
		    		<div class= "col-md-4">
						{!! Form::label('fatherDocId', 'Cédula de Identidad: ') !!}
						{!!Form::text('fatherDocId', null, ['class'=> 'form-control', 'ng-model'=>'fatherDocId',  'placeholder'=>'Cédula del Padre']) !!}
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
						{!!Form::text('fatherName', null, ['class'=> 'form-control', 'ng-model'=>'fatherName',  'placeholder'=>'Nombre del Padre']) !!}
					</div>

					<div class= "col-md-6">
						{!! Form::label('fatherLastName', 'Apellido: ') !!}
						{!!Form::text('fatherLastName', null, ['class'=> 'form-control', 'ng-model'=>'fatherLastName', 'placeholder'=>'Apellido del Padre']) !!}
					</div>
					<br>
					<br>
				</div>

				<br>
				<div class = "row">
					<div class= "col-md-6">
						{!! Form::label('fatherEmail', 'Correo Electrónico: ') !!}
						{!!Form::text('fatherEmail', null, ['class'=> 'form-control', 'ng-model'=>'fatherEmail', 'placeholder'=>'Email del Padre']) !!}
					</div>
		    	</div>

		    	<br>
		    	<div class = "row">
		    		<div class= "col-md-12">
						{!! Form::label('fatherHomeAddress', 'Dirección de Casa: ') !!}
						{!!Form::text('fatherHomeAddress', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomeAddress', 'placeholder'=>'Dirección de Habitación del Padre']) !!}
					</div>

				</div>

				<br>
				<div class = "row">
					<div class= "col-md-12">
							{!! Form::label('fatherWorkAddress', 'Dirección de Trabajo: ') !!}
							{!!Form::text('fatherWorkAddress', null, ['class'=> 'form-control', 'ng-model'=>'fatherWorkAddress', 'placeholder'=>'Dirección de Trabajo del Padre']) !!}
					</div>
				</div>

				<br>
				<div class = "row">
					<div class= "col-md-4">
							{!! Form::label('fatherHomePhone', 'Teléfono Casa: ') !!}
							{!!Form::text('fatherHomePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherHomePhone', 'placeholder'=>'Cédula del Padre',  'placeholder'=>'Teléfono de Habitación del Padre']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('fatherMobilePhone', 'Teléfono Móvil: ') !!}
							{!!Form::text('fatherMobilePhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherMobilePhone', 'placeholder'=>'Teléfono Móvil del Padre']) !!}
					</div>
					<div class= "col-md-4">
							{!! Form::label('fatherWorkPhone', 'Teléfono de Trabajo: ') !!}
							{!!Form::text('fatherWorkPhone', null, ['class'=> 'form-control', 'ng-model'=>'fatherWorkPhone', 'placeholder'=>'Teléfono del Trabajo del Padre']) !!}
					</div>
				</div>
			</div>
			<div ng-show= "informationFromMother">
				<hr>
		    	<h4>Datos de la Madre</h4>
		    	<div class = "row">
		    		<div class= "col-md-4">
		    			{!! Form::label('motherDocId', 'Cédula de Identidad: ') !!}
		    			<input type="text" class="form-control" data-toggle="tooltip" title="Cédula: V00000000 &#013; Escolar: 116V00000000" id="motherDocId" name="motherDocId"
		    			value="{{old('motherDocId')}}"  placeholder="Cédula de la Madre" ng-model= "motherDocId">
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
						<input type="text" data-toggle="tooltip" title="Nombre de la Madre" class="form-control"  id="motherName" name="motherName" placeholder="Nombre de la Madre" value="{{Request::old('motherName')}}" ng-model= "motherName">
					</div>

					<div class= "col-md-6">
						{!! Form::label('motherLastName', 'Apellido: ') !!}
						<input type="text" data-toggle="tooltip" title="Apellido de la Madre" class="form-control"  id="motherLastName" name="motherLastName" placeholder="Apellido de la Madre" value="{{Request::old('motherLastName')}}" ng-model= "motherLastName">

					</div>
					<br>
					<br>
				</div>

				<br>
				<div class = "row">
					<div class= "col-md-6">
						{!! Form::label('motherEmail', 'Correo Electrónico: ') !!}
						<input type="text" data-toggle="tooltip" title="Email de la Madre" class="form-control"  id="motherEmail" name="motherEmail" placeholder="Email de la Madre" value="{{Request::old('motherLastName')}}" ng-model= "motherEmail">
					</div>
		    	</div>

		    	<br>
		    	<div class = "row">
		    		<div class= "col-md-12">
						{!! Form::label('motherHomeAddress', 'Dirección de Casa: ') !!}
						<input type="text" data-toggle="tooltip" title="Dirección de Habitación de la Madre" class="form-control"  id="motherHomeAddress" name="motherHomeAddress" placeholder="Dirección de Habitación de la Madre" value="{{Request::old('motherHomeAddress')}}" ng-model= "motherHomeAddress">
					</div>

				</div>

				<br>
				<div class = "row">
					<div class= "col-md-12">
							{!! Form::label('motherWorkAddress', 'Dirección de Trabajo: ') !!}
							<input type="text" data-toggle="tooltip" title="Dirección de Trabajo de la Madre" class="form-control"  id="motherWorkAddress" name="motherWorkAddress" placeholder="Dirección de Trabajo de la Madre" value="{{Request::old('motherWorkAddress')}}" ng-model= "motherWorkAddress">
					</div>
				</div>

				<br>
				<div class = "row">
					<div class= "col-md-4">
							{!! Form::label('motherHomePhone', 'Teléfono Casa: ') !!}
							<input type="text" data-toggle="tooltip" title="Teléfono de Habitación de la Madre" class="form-control"  id="motherHomePhone" name="motherHomePhone" placeholder="Teléfono de Habitación de la Madre" value="{{Request::old('motherHomePhone')}}" ng-model= "motherHomePhone">
					</div>
					<div class= "col-md-4">
							{!! Form::label('motherMobilePhone', 'Teléfono Móvil: ') !!}
							<input type="text" data-toggle="tooltip" title="Teléfono Móvil de la Madre" class="form-control"  id="motherMobilePhone" name="motherMobilePhone" placeholder="Teléfono Móvil de la Madre" value="{{Request::old('motherMobilePhone')}}" ng-model= "motherMobilePhone">
					</div>
					<div class= "col-md-4">
							{!! Form::label('motherWorkPhone', 'Teléfono de Trabajo: ') !!}
							<input type="text" data-toggle="tooltip" title="Teléfono del Trabajo de la Madre" class="form-control"  id="motherWorkPhone" name="mmotherWorkPhone" placeholder="Teléfono del Trabajo de la Madre" value="{{Request::old('motherWorkPhone')}}" ng-model= "motherWorkPhone">
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
	
	<script src="/js/dynamism_pages/createStudent.js"></script>  
@endsection