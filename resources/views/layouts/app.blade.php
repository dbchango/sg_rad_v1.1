<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="blog-header py-3 bg-dark container-fluid">
        <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="SG-RAD.png" alt="ESPE" width="150">
            </a>

        </div>
        <div class="col-4 text-center">
            <h3 class="blog-header-logo" style="color: #CE5202">REGISTRO DE ACTIVIDADES DOCENTE</h3>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
        <img src="logo-espe-blanco.png" alt="ESPE" width="200">
        </div>
        </div>

    </header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm bg-dark">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-submenu">
                          <a  class="dropdown-item" tabindex="-1" href="#">Planificación</a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                            </li>
                          </ul>
                        </li>
                    </ul>
                    <b-navbar>
                        <div class="app">
                            <div class="blog-header bg-dark">
                                <div class="nav-scroller">
                                    <nav class="nav d-flex justify-content-between">

                            <div class="col-3.5 d-flex justify-content-end align-items-left">
                                <div class="dropdown">
                                    @can('menu_procesos')
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FFF">Procesos</button>
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    @role('docente')
                                    @can('menu_procesos_registro_Actividades')
                                    <router-link class="dropdown-item" :to="{name:'aractividad'}" >Registro de actividades</router-link>
                                    @endcan()
                                    @endrole()
                                    @can('menu_procesos_planificacion')
                                        <li class="dropdown-submenu">
                                        <a  class="dropdown-item" tabindex="-1" href="">Planificación</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                @can('menu_procesos_planificacion_Periodo')<router-link class="dropdown-item" :to="{name:'ListadoPeriodo'}" >Periodo</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Departamento')<router-link class="dropdown-item" :to="{name:'ListadoDepartamento'}" >Departamentos</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Area')<router-link class="dropdown-item" :to="{name:'ListadoAreasConocimiento'}" >Áreas de conocimiento</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Profesor')<router-link class="dropdown-item" :to="{name:'ListadoProfesor'}" >Profesor</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Materia')<router-link class="dropdown-item" :to="{name:'ListaMateria'}" >Materia</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Horario')<router-link class="dropdown-item" :to="{name:'ListadoHorario'}" >Horario</router-link>@endcan()
                                                @can('menu_procesos_planificacion_Recuperacion')<router-link class="dropdown-item" :to="{name:'ListadoRecuperacion'}" >Recuperación</router-link>@endcan()
                                            </li>
                                        </ul>
                                        </li>
                                    @endcan()
                                    @can('menu_procesos_registro')
                                    <li class="dropdown-submenu">
                                        <a  class="dropdown-item" tabindex="-1" href="">Registro</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">

                                            @can('menu_procesos_registro_RegistroActividad')<router-link class="dropdown-item" :to="{name:'ListadoRegistroActividad'}" >Registro de Actividades</router-link>@endcan()
                                            </li>
                                        </ul>
                                    </li>
                                    @endcan()
                                    @can('menu_procesos_coevaluacion')
                                    <li class="dropdown-submenu">
                                        <a  class="dropdown-item" tabindex="-1" href="">Coevaluación</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                            @can('menu_procesos_coevaluacion_Calificaciones')<router-link class="dropdown-item" :to="{name:'ListadoCalificacionesCoevaluacion'}" >Calificaciones</router-link>@endcan()
                                            @can('menu_procesos_coevaluacion_Preguntas')<router-link class="dropdown-item" :to="{name:'ListadoPreguntasCoevaluacion'}" >Preguntas</router-link>@endcan()
                                            @can('menu_procesos_coevaluacion_AsignarCoevaluador')<router-link class="dropdown-item" :to="{name:'ListadoAsignarCoevaluador'}" >Asignar CoEvaluador</router-link>@endcan()
                                            @can('menu_procesos_coevaluacion_Coevaluacion')<router-link class="dropdown-item" :to="{name:'ListadoCoevaluaciones'}" >CoEvaluación</router-link>@endcan()
                                            </li>
                                        </ul>
                                    </li>
                                    @endcan()
                                    @can('menu_procesos_eadministrativa')
                                <li class="dropdown-submenu">
                                    <a  class="dropdown-item" tabindex="-1" href="">Evaluación Administrativa</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            @can('menu_procesos_eadministrativa_Calificaciones')<router-link class="dropdown-item" :to="{name:'ListadoCalificacionesEvaluacionAdministrativa'}" >Calificaciones</router-link>@endcan()
                                            @can('menu_procesos_eadministrativa_Preguntas')<router-link class="dropdown-item" :to="{name:'ListadoPreguntasEvaluacionAdministrativa'}" >Preguntas</router-link>@endcan()
                                            @can('menu_procesos_eadministrativa_AsignarEvaAdministrativa')<router-link class="dropdown-item" :to="{name:'ListadoAsignarEvalAdm'}" >Asignar Eva. Administrativa</router-link>@endcan()
                                            @can('menu_procesos_eadministrativa_EvaAdministrativa')<router-link class="dropdown-item" :to="{name:'ListadoEvalAdministrativa'}" >Eva. Administrativa</router-link>@endcan()
                                        </li>
                                    </ul>
                                    </li>
                                    @endcan()
                                    @can('menu_procesos_autoevaluacion')
                                    <li class="dropdown-submenu">
                                    <a  class="dropdown-item" tabindex="-1" href="">Autoevaluación</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            @can('menu_procesos_autoevaluacion_Calificaciones')<router-link class="dropdown-item" :to="{name:'ListadoCalAutoevaluaciones'}" >Calificaciones</router-link>@endcan()
                                            @can('menu_procesos_autoevaluacion_Preguntas')<router-link class="dropdown-item" :to="{name:'ListadoPregAutoevaluaciones'}" >Preguntas</router-link>@endcan()
                                            @can('menu_procesos_autoevaluacion_Autoevaluacion')<router-link class="dropdown-item" :to="{name:'ListadoAutoevaluaciones'}" >Auto Evaluación</router-link>@endcan()
                                        </li>
                                    </ul>
                                    </li>
                                    @endcan()
                                </ul>
                                @endcan()
                            </div>
                        <!--Reportes-->
                        @can('menu_reportes')
                        <div class="dropdown">

                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FFF">Reportes</button>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                @role('admin')
                                <li class="dropdown-submenu">
                                  <a  class="dropdown-item" tabindex="-1" href="">Actividades</a>
                                  <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">

                                      <router-link class="dropdown-item" :to="{name:'ActDepartamento'}" >Registro por Departamento</router-link>
                                      <router-link class="dropdown-item" :to="{name:'ActDocente'}" >Registro por Docente</router-link>

                                    </li>
                                  </ul>
                                </li>
                                @endrole()
                                @can('menu_reportes_evaluaciones')
                              <li class="dropdown-submenu">
                                  <a  class="dropdown-item" tabindex="-1" href="">Evaluaciones</a>
                                  <ul class="dropdown-menu multi-level">
                                    <li class="dropdown-submenu">
                                        <a  class="dropdown-item" tabindex="-1">Coevaluación</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <router-link class="dropdown-item" :to="{name:''}" >Realizadas</router-link>
                                                <router-link class="dropdown-item" :to="{name:''}" >Pendientes</router-link>
                                                <router-link class="dropdown-item" :to="{name:''}" >Promedios departamento</router-link>
                                            </li>
                                        </ul>
                                        <a  class="dropdown-item" tabindex="-1">Eva. administrativa</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <router-link class="dropdown-item" :to="{name:''}" >Calif. Realizadas</router-link>
                                                <router-link class="dropdown-item" :to="{name:''}" >Pendientes</router-link>
                                            </li>
                                        </ul>

                                        <router-link class="dropdown-item" :to="{name:''}" >Resumen Evaluación</router-link>
                                        <router-link class="dropdown-item" :to="{name:''}" >Evaluación Docente</router-link>

                                    </li>
                                  </ul>
                                </li>
                                @endcan()
                              </ul>
                        </div>
                        @endcan()
                        <!--Mantenimiento-->
                        @can('menu_mantenimiento')
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mantenimiento</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                                @can('menu_mantenimiento_PanelControl')<router-link class="dropdown-item" :to="{name:'PanelControl'}" >Panel de Control</router-link>@endcan()
                                                @can('menu_mantenimiento_Dia')<router-link class="dropdown-item" :to="{name:'ListadoDias'}" >Día</router-link>@endcan()
                                                @can('menu_mantenimiento_Empresa')<router-link class="dropdown-item" :to="{name:'ListadoEmpresas'}" >Empresa</router-link>@endcan()
                                                @can('menu_mantenimiento_TipoActividad')<router-link class="dropdown-item" :to="{name:'ListadoTipoActividades'}" >Tipo de Actividad</router-link>@endcan()
                                                @can('menu_mantenimiento_Actividad')<router-link class="dropdown-item" :to="{name:'ListadoActividades'}" >Actividad</router-link>@endcan()
                                                @can('menu_mantenimiento_Tarea')<router-link class="dropdown-item" :to="{name:'ListadoTareas'}" >Tarea</router-link>@endcan()
                                                @can('menu_mantenimiento_Dedicacion')<router-link class="dropdown-item" :to="{name:'ListadoDedicaciones'}" >Dedicación</router-link>@endcan()
                                            </div>
                                        </li>
                        @endcan()
                        <!--AdministrarUsuario-->

                        @role('admin')
                            @can('menu_administrar_usuarios')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AdministrarUsuarios</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <router-link class="dropdown-item" :to="{name:'MainUsuariosAdmin'}" >Administrar Usuarios</router-link>
                                </div>
                            </li>
                            @endcan()
                        @endrole()


                        <!--FBut-->


                                    </div>

                                    </nav>
                                </div>
                            </div>

                            </div>
                    </b-navbar>
                    <ul class="navbar-nav mr-auto">

                        @can('all_access')


                        <ul></ul>
                        @endcan()
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>



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
