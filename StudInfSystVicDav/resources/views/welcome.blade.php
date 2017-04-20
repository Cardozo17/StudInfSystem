@extends('layouts.app')

@section('content')

<style>
    body {
        background-image: url(/images/blue-bg.jpg);
        background-position: center top;
        background-size: 100% auto;
    }
</style>

<body>
<div ng-controller= "welcomeController">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido</div>
                    {{ csrf_field() }}
                    <div class="panel-body">

                        <h1>Bienvenido al Sistema de Información Estudiantil</h1>
                        <h5> Debe iniciar sesión con una cuenta de usuario validada para poder tener acceso a este sistema.
                            <br> Lo invitamos a iniciar sesión si tiene una cuenta y contraseña asignadas.<br>
                            En caso de no tener una cuenta y contraseña dirijase con el administrador del sistema para que le sea asignada una sí realmente considera que cuenta con las credenciales para obtener acceso al sistema.
                            <h5>
                    </div>
                </div>
            </div>
         </div>
     </div>
    </div>
</body>

<script src="/js/dynamism_pages/welcome.js"></script>
@endsection

