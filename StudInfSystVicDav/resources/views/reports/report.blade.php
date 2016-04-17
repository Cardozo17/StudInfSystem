@extends('master')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Reporte</div>
 
				<div class="panel-body">
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
			</div>
		</div>
	</div>
</div>
@endsection