@extends('layouts.master')

@section('title', 'Parametros del Sistema')

@section('content')

	<h1>Parametros del Sistema</h1>

	<hr style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);" style="height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);">

		<div ng-controller="setSystemParametersController">

		{!! Form::open(array('url' => 'setSystemParameters', 'files'=>true)) !!}

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

			<h3>Parametros de la Escuela</h3>
			<br>
	    	<div class = "row">
	    		<div class= "col-md-6">
	    			<div class="form-group{{ $errors->has('school_name') ? ' has-error' : '' }}">
	    				{!! Form::label('school_name', 'Nombre de la Escuela: ') !!}
	    				<input type="text" class="form-control" data-toggle="tooltip" title="Nombre de la Escuela" id="school_name" name="school_name"
	    				value="{{old('school_name')}}"  placeholder="Nombre de la escuela" ng-model= "documentId">
	    				<!--  {!! var_dump(old())!!} -->

	    				@if ($errors->has('school_name'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('school_name') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>

				<div class= "col-md-4 col-md-push-2">
					{!! Form::label('school_logo', 'Logo de la Institución: ') !!}
					<input type="file" id="school_logo" name="school_logo" ng-model="schoolLogo"  onchange="readURLStudent(this);">
	   				<img  id="schoolLogo" name="schoolLogo" ng-model="schoolLogo" src="schoolLogo" alt="Logo de la Escuela" />
	   			</div>
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-6">
	    			<div class="form-group{{ $errors->has('school_principal') ? ' has-error' : '' }}">
	    				{!! Form::label('school_principal', 'Nombre del Director(a) de la Escuela: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Nombre del Director(a) de la Escuela"  class="form-control"  id="school_principal" name="school_principal" placeholder="Nombre del Director(a) de la Escuela" value="{{Request::old('school_principal')}}" ng-model= "school_principal">

	    				@if ($errors->has('school_principal'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('school_principal') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>
			</div>

			<div class = "row">
	    		<div class= "col-md-12">
	    			<div class="form-group{{ $errors->has('school_address') ? ' has-error' : '' }}">
	    				{!! Form::label('school_address', 'Dirección de la Escuela: ') !!}
	    				<input type="text" data-toggle="tooltip" title="Dirección de la Escuela"  class="form-control"  id="school_address" name="school_address" placeholder="Dirección de la Escuela"  value="{{Request::old('school_address')}}" ng-model= "school_address">

	    				@if ($errors->has('school_address'))
	    				<span class="help-block">
	    					<strong>{{ $errors->first('school_address') }}</strong>
	    				</span>
	    				@endif
	    			</div>
	    		</div>
			</div>

			<br>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			{!!Form::submit('Establecer Parametros del Sistema', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>
	    	</div>
		</div>

		{!! Form::close() !!}

	</div>


@endsection
