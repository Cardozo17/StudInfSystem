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
                    <div class="panel-body">
                        <div  style="background-color: lightgrey; border: 10px solid #008B8B; padding: 25px; margin: 25px;">
                            <h1><b>Bienvenido al Sistema de Información Estudiantil SIEEB1.0 </b></h1>
                        </div>
                        <h5>
                            <div style="background-color: lightgrey;">
                                <b>
                                    <ul> 
                                        <li> Debe iniciar sesión con una cuenta de usuario validada para poder tener acceso a este sistema.
                                        </li>
                                        <br>
                                    <li>Lo invitamos a iniciar sesión si tiene una cuenta y contraseña asignadas.</li>
                                    <br>
                                    <li>En caso de no tener una cuenta y contraseña dirijase con el administrador del sistema para que le sea asignada una sí realmente considera que cuenta con las credenciales para obtener acceso al sistema. </li>
                                </b>
                            </div>
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

