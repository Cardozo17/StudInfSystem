@extends('master')

@section('title', 'Inscribir Estudiante')

@section('content')

	<h1>Constancia de Estudio</h1>

	<div ng-controller="studyConstancyController">
	    
	    {{ Form::open(array('action' => array('ReportController@post', $student->id)))}}

	    <div class= "form-group">
	   	
			<h3>Indique la Cédula</h3>    
			<br>
	    	<div class = "row">
	    		<div class= "col-md-3"  >
					{!! Form::label('document_id', 'Cedula de Identidad: ') !!}
					{!!Form::text('document_id', null, ['class'=> 'form-control', 'ng-model'=>'personId',  'name'=> 'id']) !!}
					{{ Form::hidden('id', $student->id) }}
				</div>
				<br>
				<button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "prueba()"></button>
				
	    	</div>

	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-4" ng-readonly="true">
					{!! Form::label('name', 'Nombre: ') !!}
					{!!Form::text('name', null, ['class'=> 'form-control', 'ng-model'=>'firstName','ng-disabled'=>'true']) !!}
				</div>

				<div class= "col-md-4" ng-disabled = "true">
					{!! Form::label('last_name', 'Apellido: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control','ng-model'=>'lastName', 'ng-disabled'=>'true']) !!}
				</div>
				<div class= "col-md-2" ng-readonly="true">
					{!! Form::label('Age', 'Edad: ') !!}
					{!!Form::text('last_name', null, ['class'=> 'form-control', 'ng-model'=>'age','ng-disabled'=>'true']) !!}
				</div>
			</div>

			<br>
	    	<br>
	    	<div class = "row">
	    		<div class= "col-md-12">
	    			<!-- <button type="button" class="btn btn-primary form-control" ng-click = ""> 
	    				Generar Constancia
	    			</button>
 -->	    			{!!Form::submit('Generar Constancia', ['class'=> 'btn btn-primary form-control'])!!}
	    		</div>	
	    	</div>

	    	<br>
	    	<form class="form-horizontal" role="form" method="POST" action="/reporting">
						First name: <input type="number" name="id" value= ""><br>
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	                    <div class="form-group">
	                        <div class="col-sm-offset-3 col-sm-5">
	                            <button type="submit" class="btn btn-primary">Generar</button>
	                        </div>
	                    </div>
            </form>

		</div>
		
		{!! Form::close() !!}



	</div>

	<script src="/js/createConstancy.js"></script>
@endsection