<style>
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-info-sign">
                            </span>Vicente Dávila</a>
                        </h4>
                    </div>


                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-question-sign text-primary"></span><a href="/about">¿Quiénes Somos?</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-phone text-success"></span><a href="/contact">Contacto</a>
                                    </td>
                                </tr>
                       <!--          <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-eye-open text-info"></span><a href="">Visión</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-fire text-success"></span><a href="">Misión</a>
                                      
                                    </td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('administrativePersonLevel1')
                || Auth::user()->hasRole('administrativePersonLevel2'))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-list-alt">
                            </span>Gestión de Alumnos</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('administrativePersonLevel1'))
                                <tr>
                                    <td>
                                        <a href="/students/create">Inscribir Alumno Nuevo Ingreso</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="">Inscribir Alumno Regular</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <a href="">Inscribir Alumno Inscripción Tardía</a>
                                    </td>
                                </tr>
                                 @endif 
                                 @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('administrativePersonLevel1')
                                 || Auth::user()->hasRole('administrativePersonLevel2'))
                                 <tr>
                                    <td>
                                        <a href="/showFindStudent">Consultar Alumno</a>
                                    </td>
                                </tr>
                                @endif 
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('administrativePersonLevel1'))
                                 <tr>
                                    <td>
                                        <a href="/students/{id}/edit">Editar Alumno</a>
                                    </td>
                                </tr>
                                @endif
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('administrativePersonLevel1')) 
                                <tr>
                                    <td>
                                        <a href="/students">Ver Lista de Alumnos</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <a href="">Retirar Alumno</a>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                @endif 
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher') || Auth::user()->hasRole('administrativePersonLevel1')
                 || Auth::user()->hasRole('administrativePersonLevel2'))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-duplicate">
                            </span> Gestión de Documentos</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('administrativePersonLevel1')
                                || Auth::user()->hasRole('administrativePersonLevel2'))
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file"></span><a href="/repStudyConstancy">Constancia de Estudio</a>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-thumbs-down"></span><a href="/repCitation">Citación</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-thumbs-up"></span><a href="/repAuthorization">Autorización</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->hasRole('admin'))
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
                                        <a href="{{ url('/register') }}">Registrar Usuario</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/editUser">Editar Usuario</a> 
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
                @endif
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('administrativePersonLevel1')) 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-floppy-save">
                            </span> Gestión de Respaldo del Sistema</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        </span><a href="/studentsInfoBackUp">Respaldar Información de Estudiantes</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endif 
            </div>
        </div>
    </div>
</div>
