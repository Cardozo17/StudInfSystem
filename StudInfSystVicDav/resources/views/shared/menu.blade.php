<style>


</style>
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    
                @if(Auth::user()->hasRole('admin'))
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-search">
                            </span>Vicente Davila</a>
                        </h4>
                    </div>


                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="/whoWeAre">¿Quienes Somos?</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash text-success"></span><a href="">Contacto</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a href="">Visión</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-comment text-success"></span><a href="">Misión</a>
                                      
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif 

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                            </span>Gestión de Estudiantes</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                             
                                <tr>
                                    <td>
                                        <a href="/students/create">Inscribir Estudiante</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <a href="/students/{id}">Consultar Estudiante</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <a href="/students/{id}/edit">Editar Estudiante</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/students">Ver Lista de Estudiantes</a>
                                    </td>
                                </tr>
                             
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-duplicate">
                            </span> Gestión de Constancias</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file"></span><a href="/studyConstancy">Constancia de Estudio</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-thumbs-down"></span><a href="">Citación</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-thumbs-down"></span><a href="">Autorización</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Gestión de Usuarios</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{ url('/register') }}">Agregar Usuario</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="">Editar Usuario</a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-trash text-danger"></span><a href="" class="text-danger">
                                            Eliminar Usuario</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
