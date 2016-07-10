@extends('layouts.master')
@section('title', 'Editar Usuario')

@section('content')

<div ng-controller="findUserController">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Usuario del Sistema</div>
                <br>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editUser') }}">
                        {!! csrf_field() !!}

                        <!-- Getting the oldInput if form fails to use it to repopulate the form -->
                        <?php
                        $oldInput= old();
                        ?>

                        <script>
                            var oldInput = <?php echo json_encode($oldInput); ?>;
                        </script>
                        <!-- ////////////////////////////////////////////////////////////////// -->     

<!-- 
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach -->
    
                        @if(session('message'))
                            <div class="alert alert-success" id="successAlert">
                                {{ session('message') }}
                            </div>
                        @endif

                       <!--  <!-- Success Message 
                        <div class="alert alert-success" ng-model= "success_status" ng-bind="success_status" id = "successAlert">    
                        </div> -->

                        <!-- Error Message -->    
                        <div class="alert alert-danger fade in" ng-model= "error_status" ng-bind="error_status" id = "errorAlert">
                        </div>


                        <div class = "row">
                            <div class= "col-md-4" >
                                {!! Form::label('email', 'Correo Electrónico Actual del Usuario: ') !!}
                                {!!Form::text('email', null, ['class'=> 'form-control', 'ng-model'=>'email', 'ng-change' => 'emailInputChange()','data-toggle'=>"tooltip", 'title'=>"Correo Electrónico del Usuario", 'placeholder'=>"Correo Electrónico"]) !!}
                            </div>
                            <br>
                            <div class= "col-md-1" >
                                <button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findUserByEmail()"></button>
                            </div>
                        </div>    
                        <br>

                        <h3>Datos a Editar del Usuario</h3>
                        <br>

                        <div class = "row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"> Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"  ng-model= "name" value= "{{ old('name')}}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class = "row">    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="emailToChange" ng-model="emailToChange" value="{{ old('emailToChange') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                           <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}"> 
                               <label class="col-md-4 control-label">Tipo de Usuario</label>
                               <div class="col-md-6">   
                                <div class="form-group">
                                    <select name="type" class="form-control">
                                        <option value="" disabled selected>Seleccione el Tipo</option>
                                        <option value="admin">Administrador</option>
                                        <option value="administrativePersonLevel1">Personal Administrativo Nivel 1</option>
                                        <option value="administrativePersonLevel2">Personal Administrativo Nivel 2</option>
                                        <option value="teacher">Profesor</option>
                                    </select>
                                    @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row"> 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class = "row"> 
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>  
                    <div class = "row"> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Editar Usuario
                                </button>
                            </div>
                        </div>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script src="/js/dynamism_pages/findUser.js"></script>
@endsection
