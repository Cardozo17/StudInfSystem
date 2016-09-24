@extends('layouts.master')
@section('title', 'Eliminar Usuario')

@section('content')

<div ng-controller="deleteUserController">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Eliminación de Usuario del Sistema</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/deleteUser') }}">
                    {!! csrf_field() !!}

                        @if(session('message'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session('message') }}
                        </div>
                        @endif

                        @if(session('error_status'))
                        <div class="alert alert-danger" id="errorAlert">
                            {{ session('error_status') }}
                        </div>
                        @endif

                       <!--  <!-- Error Message
                        <div class="alert alert-danger fade in" ng-model= "error_status" ng-bind="error_status" id= "errorAlert">
                        </div> -->

                        <div class = "row">
                            <div class= "col-md-4" >
                                {!! Form::label('email', 'Correo Electrónico del Usuario a Eliminar: ') !!}
                                {!!Form::text('email', null, ['class'=> 'form-control', 'ng-model'=>'email', 'ng-change' => 'emailInputChange()','data-toggle'=>"tooltip", 'title'=>"Correo Electrónico del Usuario", 'placeholder'=>"Correo Electrónico"]) !!}
                            </div>
                            <br>
                            <div class= "col-md-1" >
                                <button type="button" class="btn btn-primary glyphicon glyphicon-search" ng-click= "findUserByEmail()">
                                </button>
                            </div>
                        </div>

                        <h3>Usuario a Eliminar</h3>
                        <br>

                        <div class = "row">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Nombre</label>

                                 <div class="col-md-6">
                                     <input class="form-control" readonly="readonly" ng-model= "name" name="name" type="text" id="name">
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-6">
                                    <input class="form-control" readonly="readonly" type="email" id="emailToChange" name="emailToChange"
                                    ng-model="emailToChange">
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-user"></i>Eliminar Usuario
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

<script src="/js/dynamism_pages/deleteUser.js"></script>
@endsection
