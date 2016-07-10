@extends('layouts.master')
@section('title', 'Editar Usuario')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editando Usuario del Sistema</div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/findOneUserByEmail') }}">
                    {!! csrf_field() !!}

                        @if(session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class = "row">    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class = "row"> 
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Buscar
                                    </button>
                                </div>
                            </div>
                        </div>   
                    </form>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editUser') }}">
                    {!! csrf_field() !!}

                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div class = "row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"  @if(session()->has('data')) value= "{{ session('data')->name}}" @endif>

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
                                    <input type="email" class="form-control" name="email" @if(session()->has('data')) value= "{{ session('data')->email}}" @endif>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class = "row"> 
                           <label class="col-md-4 control-label">Tipo</label>
                           <div class="col-md-6">   
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    
                                    @if(session()->has('data'))
                                        @if(session('data')->type == "admin")
                                            <option value="admin" disabled selected>Administrador</option>
                                            <option value="administrativePersonLevel1">Personal Administrativo Nivel 1</option>
                                            <option value="administrativePersonLevel2">Personal Administrativo Nivel 2</option>
                                            <option value="teacher" >Profesor</option>
                                        @endif
                                        @if(session('data')->type == "administrativePersonLevel1")
                                            <option value="admin">Administrador</option>
                                            <option value="administrativePersonLevel1" disabled selected>Personal Administrativo Nivel 1</option>
                                            <option value="administrativePersonLevel2">Personal Administrativo Nivel 2</option>
                                            <option value="teacher">Profesor</option>
                                        @endif
                                        @if(session('data')->type == "administrativePersonLevel2")
                                            <option value="admin">Administrador</option>
                                            <option value="administrativePersonLevel1">Personal Administrativo Nivel 1</option>
                                            <option value="administrativePersonLevel2" disabled selected>Personal Administrativo Nivel 2</option>
                                            <option value="teacher" >Profesor</option>
                                        @endif
                                        @if(session('data')->type == "teacher")
                                            <option value="admin">Administrador</option>
                                            <option value="administrativePersonLevel1">Personal Administrativo Nivel 1</option>
                                            <option value="administrativePersonLevel2">Personal Administrativo Nivel 2</option>
                                            <option value="teacher" disabled selected>Profesor</option>
                                        @endif
                                    @else
                                        <option value="" disabled selected>Seleccione el Tipo</option>
                                        <option value="admin">Administrador</option>
                                        <option value="administrativePersonLevel1">Personal Administrativo Nivel 1</option>
                                        <option value="administrativePersonLevel2">Personal Administrativo Nivel 2</option>
                                        <option value="teacher">Profesor</option>
                                    @endif
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class = "row"> 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

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

@endsection
