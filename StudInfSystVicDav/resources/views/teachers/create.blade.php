@extends('layouts.master')

@section('title', 'Registrar Docente')

@section('content')

	<h1>Registrar Docente</h1>

	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

	<div ng-controller="createTeacherController">

		{!! Form::open(array('url' => 'teachers', 'files'=>true)) !!}

<!-- 	@foreach ($errors->all() as $error)
	    	<p class="alert alert-danger">{{ $error }}</p>
		@endforeach -->
		@if(session('status'))
			<div id= "successAlert" class="alert alert-success">
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

			<h3>Información del Docente</h3>
			<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('document_id') ? ' has-error' : '' }}">
	    				{!! Form::label('document_id', 'Cédula de Identidad: ') !!}
	    				<input type="text" class="form-control" data-toggle="tooltip" title="Cédula: V00000000" id="document_id"
	    				 name="document_id" ng-change= "documentIdChange()"
	    				value="{{old('document_id')}}"  placeholder="Cédula del Docente" ng-model= "documentId">
	    				<!--  {!! var_dump(old())!!} -->

	    				@if ($errors->has('document_id'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('document_id') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4">
	    			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	    				{!! Form::label('name', 'Nombre: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Nombre del Docente"  class="form-control"  id="name" name="name" placeholder="Nombre del Docente" value="{{Request::old('name')}}" ng-model= "name">

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
	    				<input type="text" data-toggle="tooltip" title="Apellido del Docente" class="form-control"  id="last_name" name="last_name" placeholder="Apellido del Docente" value="{{Request::old('last_name')}}" ng-model= "lastName">

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
	    		<div class= "col-md-12">
	    			{!!Form::submit('Registrar Docente', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>
	    	</div>
		</div>

		{!! Form::close() !!}

	</div>

	<script src="/js/dynamism_pages/createTeachers.js"></script>
	@endsection