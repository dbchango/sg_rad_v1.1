<template>
    <div class="cont">
            <header class="blog-header py-3 bg-dark container-fluid">
                <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                <img src="SG-RAD.png" alt="ESPE" width="150">
                </div>
                <div class="col-4 text-center">
                    <h3 class="blog-header-logo" style="color: #CE5202">REGISTRO DE ACTIVIDADES DOCENTE</h3>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                <img src="logo-espe-blanco.png" alt="ESPE" width="200">
                </div>
                </div>

            </header>

            <div class="app">
            <div class="blog-header bg-dark">
                <div class="nav-scroller">
                    <nav class="nav d-flex justify-content-between">

                   <div class="col-3.5 d-flex justify-content-end align-items-left">
                       <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FFF">Procesos</button>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Planificación</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <router-link class="dropdown-item" :to="{name:'ListadoPeriodo'}" >Periodo</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListadoDepartamento'}" >Departamentos</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListadoAreasConocimiento'}" >Áreas de conocimiento</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListadoProfesor'}" >Profesor</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListaMateria'}" >Materia</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListadoHorario'}" >Horario</router-link>
                        <router-link class="dropdown-item" :to="{name:'ListadoRecuperacion'}" >Recuperación</router-link>
                    </li>
                  </ul>
                </li>
              <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Registro</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href="#">Control de Asistencia</a>
                      <a class="dropdown-item" href="/listadoregistroactividad">Registro de Actividades</a>
                      <a class="dropdown-item" href="">Registrar Actividades Docente</a>
                    </li>
                  </ul>
                </li>
              <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Coevaluación</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href="/listadocaliFficacionescoevaluacion">Calificaciones</a>
                      <a class="dropdown-item" href="/listadopreguntascoevaluacion">Preguntas</a>
                      <a class="dropdown-item" href="/listadoasignarcoevaluador">Asignar CoEvaluador</a>
                      <a class="dropdown-item" href="/listadocoevaluaciones">CoEvaluación</a>
                    </li>
                  </ul>
                </li>
              <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Evaluación Administrativa</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href="/listadocalificacionesevaluacionadministrativa">Calificaciones</a>
                      <a class="dropdown-item" href="/listadopreguntasevaluacionadministrativa">Preguntas</a>
                      <a class="dropdown-item" href="/listadoasignarevaladm">Asignar Eva. Administrativa</a>
                      <router-link class="dropdown-item" :to="{name:'ListadoEvalAdministrativa'}" >Eva. Administrativa</router-link>
                    </li>
                  </ul>
                </li>
              <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Autoevaluación</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href="/listadocalifautoevals">Calificaciones</a>
                      <a class="dropdown-item" href="/listadopregautoevals">Preguntas</a>
                      <a class="dropdown-item" href="/listadoautoevaluaciones">Auto Evaluación</a>
                    </li>
                  </ul>
                </li>
              </ul>
        </div>
        <!--Reportes-->        <div class="dropdown">

            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FFF">Reportes</button>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Actividades</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href="#">Registro por Departamento</a>
                      <a class="dropdown-item" href="#">Registro por Docente</a>
                    </li>
                  </ul>
                </li>
              <li class="dropdown-submenu">
                  <a  class="dropdown-item" tabindex="-1" href="#">Evaluaciones</a>
                  <ul class="dropdown-menu multi-level">
                    <li class="dropdown-submenu">
                      <a class="dropdown-item" href=" #">Coevaluación</a>
                      <a class="dropdown-item" href="#">Eva. Administrativa</a>
                      <a class="dropdown-item" href="#">Resumen Evaluación</a>
                      <a class="dropdown-item" href="#">Evaluación Docente</a>
                    </li>
                  </ul>
                </li>
              </ul>
        </div>
        <!--Mantenimiento-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mantenimiento</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="/panelcontrol">Panel de Control</a>
                            <a class="dropdown-item" href="/listadoempresas">Empresa</a>
                            <a class="dropdown-item" href="/listadodias">Día</a>
                            <a class="dropdown-item" href="/listadotipoactividades">Tipo de Actividad</a>
                            <router-link class="dropdown-item" :to="{name:'ListadoActividades'}" >Actividad</router-link>

                            <a class="dropdown-item" href="/listadotareas">Tarea</a>
                            <a class="dropdown-item" href="/listadodedicaciones">Dedicación</a>
                            </div>
                        </li>

        <!--AdministrarUsuario-->
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AdministrarUsuarios</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <router-link class="dropdown-item" :to="{name:'MainUsuariosAdmin'}" >Administrar Usuarios</router-link>
                            </div>
                        </li>

        <!--FBut-->


                    </div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                       <a class="p-2 text-white" href="/login">Login</a>
                            <a class="p-2 text-white" href="#">Inicio</a>
                            <a class="p-2 text-white" href="#">Salir(admin)</a>
                        </div>
                    </nav>
                </div>
            </div>
                <main class="py-4">

                </main>
            </div>

        <div class="row">
            <div class="col-md-12">
                <!--{{home}} component is working well-->
            </div>


        </div>

    </div>

</template>


<style>
.dropdown-submenu {
    position: relative;
}

.cont{
width: 100%;

}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>

<script>
//TODO - Get the user credentials
import { user } from '../app';
export default {
    data() {
        return {

           user_logged:user

        }
    },
    mounted() {

    }
};
</script>
