import VueRouter from 'vue-router';

import HomeComponent from './components/home';
import AdminComponent from './components/adminh';
import RegistrarActividad from './components/registraract';
import Ayuda from './components/help';
import PanelControl from './components/Mantenimiento/PanelControl/panelcontrol';

import FormularioProfesor from './components/Procesos/Planificacion/Profesor/formularioprofesor';
import ListadoProfesor from './components/Procesos/Planificacion/Profesor/listadoprofesor';
import InfoProfesor from './components/Procesos/Planificacion/Profesor/infoprofesor';
import EditarProfesor from './components/Procesos/Planificacion/Profesor/editprofesor';

import FormularioPeriodo from './components/Procesos/Planificacion/Periodo/formularioperiodo';
import ListadoPeriodo from './components/Procesos/Planificacion/Periodo/listadoperiodo';
import InfoPeriodo from './components/Procesos/Planificacion/Periodo/infoperiodo';
import EditarPeriodo from './components/Procesos/Planificacion/Periodo/editperiodo';

import FormularioDepartamento from './components/Procesos/Planificacion/Departamentos/formulariodepartamento';
import ListadoDepartamento from './components/Procesos/Planificacion/Departamentos/listadodepartamento';
import InfoDepartamento from './components/Procesos/Planificacion/Departamentos/infodepartamento';
import EditarDepartamento from './components/Procesos/Planificacion/Departamentos/editdepartamento';

import FormularioAreasConocimiento from './components/Procesos/Planificacion/AreasDeConocimiento/formularioarea';
import ListadoAreasConocimiento from './components/Procesos/Planificacion/AreasDeConocimiento/listadoarea';
import InfoArea from './components/Procesos/Planificacion/AreasDeConocimiento/infoarea';
import EditarArea from './components/Procesos/Planificacion/AreasDeConocimiento/editarea';

import FormularioMateria from './components/Procesos/Planificacion/Materia/formulariomateria';
import ListadoMateria from './components/Procesos/Planificacion/Materia/listadomateria';
import InfoMateria from './components/Procesos/Planificacion/Materia/infomateria';
import EditarMateria from './components/Procesos/Planificacion/Materia/editmateria';

import FormularioHorario from './components/Procesos/Planificacion/Horario/formulariohorario';
import ListadoHorario from './components/Procesos/Planificacion/Horario/listahorario';
import EditarHorario from './components/Procesos/Planificacion/Horario/edithorario';
import InfoHorario from './components/Procesos/Planificacion/Horario/infohorario';

import ListadoRecuperacion from './components/Procesos/Planificacion/Recuperacion/listadorecuperacion.vue';
import FormularioRecuperacion from './components/Procesos/Planificacion/Recuperacion/formulariorecuperacion';
import EditarRecuperacion from './components/Procesos/Planificacion/Recuperacion/editrecuperacion';
import InfoRecuperacion from './components/Procesos/Planificacion/Recuperacion/inforecuperacion';

import ListadoRegistroActividad from './components/Procesos/Registro/RegistroActividades/listadoregistroactividades';
import FormularioRegistroActividad from './components/Procesos/Registro/RegistroActividades/formularioregistroactividades';
import EditarRegistroActividad from './components/Procesos/Registro/RegistroActividades/editregistroactividades';
import InfoRegistroActividad from './components/Procesos/Registro/RegistroActividades/inforegistroactividades';

import ListadoAsignarCoevaluador from './components/Procesos/Coevaluacion/AsignarCoevaluador/listadoasignarcoevaluador';
import FormularioAsignarCoevaluador from './components/Procesos/Coevaluacion/AsignarCoevaluador/formularioasignarcoevaluador';
import EditarAsignarCoevaluador from './components/Procesos/Coevaluacion/AsignarCoevaluador/editasignarcoevaluador';
import InfoAsignarCoevaluador from './components/Procesos/Coevaluacion/AsignarCoevaluador/infoasignarcoevaluador';

import ListadoCalificacionesCoevaluacion from './components/Procesos/Coevaluacion/Calificaciones/listadocalifcoevaliaciones';
import FormularioCalificacionesCoevaluacion from './components/Procesos/Coevaluacion/Calificaciones/formulariocalifcoevaliaciones';
import EditarCalificacionesCoevaluacion from './components/Procesos/Coevaluacion/Calificaciones/editcalifcoevaliaciones';
import InfoCalificacionesCoevaluacion from './components/Procesos/Coevaluacion/Calificaciones/infocalifcoevaliaciones';

import ListadoPreguntasCoevaluacion from './components/Procesos/Coevaluacion/Preguntas/listadopregcoevaluacion';
import FormularioPreguntasCoevaluacion from './components/Procesos/Coevaluacion/Preguntas/formulariopregcoevaluacion';
import EditarPreguntasCoevaluacion from './components/Procesos/Coevaluacion/Preguntas/editpregcoevaluacion';
import InfoPreguntasCoevaluacion from './components/Procesos/Coevaluacion/Preguntas/infopregcoevaluacion';

import ListadoPreguntasEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Preguntas/listadopreeadministrativas';
import FormularioPreguntasEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Preguntas/formulariopreeadministrativas';
import InfoPreguntasEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Preguntas/infopreeadministrativas';
import EditarPreguntasEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Preguntas/editpreeadministrativas';

import ListadoCalificacionesEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Calificaciones/listadocaleadministrativas'
import FormularioCalificacionesEvaluacionAdministrativa from './components/Procesos/EvaluacionAdministrativa/Calificaciones/formulariocaleadministrativas'
import InfoCalificacioneadministrativa from './components/Procesos/EvaluacionAdministrativa/Calificaciones/infocalifeadministrativa';
import EditarCalificacioneadministrativa from './components/Procesos/EvaluacionAdministrativa/Calificaciones/editcalifeadministrativa';

import FormularioAsignarEvalAdm from './components/Procesos/EvaluacionAdministrativa/AsignarEvaluacionAdministrativa/formularioasignarevaladmin';
import ListadoAsignarEvalAdm from './components/Procesos/EvaluacionAdministrativa/AsignarEvaluacionAdministrativa/listadoasignarevaladmin';
import EditarAsignarEvalAdm from './components/Procesos/EvaluacionAdministrativa/AsignarEvaluacionAdministrativa/editasignarevaladmin';
import InfoAsignarEvalAdm from './components/Procesos/EvaluacionAdministrativa/AsignarEvaluacionAdministrativa/infoasignarevaladmin'

import FormularioCalAutoevaluaciones from './components/Procesos/Autoevaluacion/Calificaciones/formulariocalifautoevaluaciones';
import ListadoCalAutoevaluaciones from './components/Procesos/Autoevaluacion/Calificaciones/listadocalifautoevaluaciones';
import EditCalAutoevaluaciones from './components/Procesos/Autoevaluacion/Calificaciones/editcalifautoevaluaciones';
import InfoCalAutoevaluaciones from './components/Procesos/Autoevaluacion/Calificaciones/infocalifautoevaluaciones';

import FormularioPregAutoevaluaciones from './components/Procesos/Autoevaluacion/Preguntas/formulariopreguntas';
import ListadoPregAutoevaluaciones from './components/Procesos/Autoevaluacion/Preguntas/listadopreautoevaluaciones';
import EditarPregAutoevaluaciones from './components/Procesos/Autoevaluacion/Preguntas/editpreautoevaluacion';
import InfoPregAutoevaluaciones from './components/Procesos/Autoevaluacion/Preguntas/infopreautoevaluacion';

import FormularioAutoevaluaciones from './components/Procesos/Autoevaluacion/Autoevaluacion/formularioautoevaluacion';
import ListadoAutoevaluaciones from './components/Procesos/Autoevaluacion/Autoevaluacion/listadoautoevaluacion';
import InfoAutoevaluaciones from './components/Procesos/Autoevaluacion/Autoevaluacion/infoevaluacion';
import EditarAutoevaluaciones from './components/Procesos/Autoevaluacion/Autoevaluacion/editautoevaluacion';

import FormularioCoevaluaciones from './components/Procesos/Coevaluacion/Coevaluacion/formulariocoevaluacion';
import ListadoCoevaluaciones from './components/Procesos/Coevaluacion/Coevaluacion/listadocoevaluacion';
import EditarCoevaluacion from './components/Procesos/Coevaluacion/Coevaluacion/editcoevaluacion';
import InfoCoevaluacion from './components/Procesos/Coevaluacion/Coevaluacion/infocoevaluacion';

import FormularioActividades from './components/Mantenimiento/Actividad/formularioactividad';
import ListadoActividades from './components/Mantenimiento/Actividad/listadoactividad';
import EditarActividad from './components/Mantenimiento/Actividad/editactividad';
import InfoActividad from './components/Mantenimiento/Actividad/infoactividad';

import ListadoEmpresas from './components/Mantenimiento/Empresa/listadoempresa';
import FormularioEmpresas from './components/Mantenimiento/Empresa/formularioempresa';
import EditarEmpresa from './components/Mantenimiento/Empresa/editempresa';
import InfoEmpresa from './components/Mantenimiento/Empresa/infoempresa';

import ListadoDias from './components/Mantenimiento/Dia/listadodia';
import FormularioDias from './components/Mantenimiento/Dia/formulariodia';
import EditarDia from './components/Mantenimiento/Dia/editdia';
import InfoDia from './components/Mantenimiento/Dia/infodia';

import ListadoTareas from './components/Mantenimiento/Tarea/listadotarea';
import FormularioTareas from './components/Mantenimiento/Tarea/formulariotarea';
import InfoTareas from './components/Mantenimiento/Tarea/infotarea';
import EditarTareas from './components/Mantenimiento/Tarea/edittarea';

import ListadoTipoActividades from './components/Mantenimiento/TipoActividad/listadotipoactividad';
import FormularioTipoActividades from './components/Mantenimiento/TipoActividad/formulariotipoactividad';
import EditarTipoActividades from './components/Mantenimiento/TipoActividad/edittipoactividad';
import InfoTipoActividades from './components/Mantenimiento/TipoActividad/infotipoactividad';

import ListadoDedicaciones from './components/Mantenimiento/Dedicacion/listadodedicacion';
import FormularioDedicaciones from './components/Mantenimiento/Dedicacion/formulariodedicacion';
import EditarDedicaciones from './components/Mantenimiento/Dedicacion/editdedicacion';
import InfoDedicaciones from './components/Mantenimiento/Dedicacion/infodedicaion';

import ListadoEvalAdministrativa from './components/Procesos/EvaluacionAdministrativa/EvaAdministrativa/listadoevaladmin';
import FormularioEvalAdministrativa from './components/Procesos/EvaluacionAdministrativa/EvaAdministrativa/formularioevaladmin';
import EditarEvalAdministrativa from './components/Procesos/EvaluacionAdministrativa/EvaAdministrativa/editevaladmin';
import InfoEvalAdministrativa from './components/Procesos/EvaluacionAdministrativa/EvaAdministrativa/infoevaladmin';

import MainUsuariosAdmin from './components/AdministrarUsuarios/mainadministrador.vue';

import ListaRoles from './components/RolesYPermisos/listaroles';
import AsignarPermisosARoles from './components/RolesYPermisos/asignarpermisos-a-roles';
import ListaUsers from './components/RolesYPermisos/listausers';
import AsignarRolesYPermisosAUsers from './components/RolesYPermisos/asignarrolespermisos-users';

import Register from './components/Auth/register';
import Login from './components/Auth/login';
import ActDepartamento from './components/Reportes/Actividades/ActDepartamento.vue'
import ActDocente from './components/Reportes/Actividades/ActDocente.vue';
import EditarUsuario from './components/AdministrarUsuarios/editusuarios.vue';
import FormularioUsuario from './components/AdministrarUsuarios/formulariousuario.vue';

import CrearRoles from './components/RolesYPermisos/crearroles.vue';
import CrearPermisos from './components/RolesYPermisos/crearpermisos.vue';
import EditarRoles from './components/RolesYPermisos/editarroles.vue';
import EditarPermisos from './components/RolesYPermisos/editarpermisos.vue';
import ListaPermisos from './components/RolesYPermisos/listapermisos.vue';

export const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeComponent,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/admin',
        name: 'admin',
        component: AdminComponent,
        meta: {
            auth: false
        }
    },

    {
        path: '/app/help',
        name: 'Ayuda',
        component: Ayuda,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/regiact',
        name: 'aractividad',
        component: RegistrarActividad,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoperiodo',
        name: 'ListadoPeriodo',
        component: ListadoPeriodo,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioperiodo',
        name: 'Formularioeriodo',
        component: FormularioPeriodo,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadodepartamento',
        name: 'ListadoDepartamento',
        component: ListadoDepartamento,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariodepartamento',
        name: 'FormularioDepartamento',
        component: FormularioDepartamento,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoareasconocimiento',
        name: 'ListadoAreasConocimiento',
        component: ListadoAreasConocimiento,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioareasconocimiento',
        name: 'FormularioAreasConocimiento',
        component: FormularioAreasConocimiento,
        meta: {
            auth: false
        }
    },

    {
        path: '/app/listadomateria',
        name: 'ListaMateria',
        component: ListadoMateria,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariomateria',
        name: 'FormularioMateria',
        component: FormularioMateria,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariohorario',
        name: 'FormularioHorario',
        component: FormularioHorario,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadohorario',
        name: 'ListadoHorario',
        component: ListadoHorario,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioprofesor',
        name: 'FormularioProfesor',
        component: FormularioProfesor,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoprofesor',
        name: 'ListadoProfesor',
        component: ListadoProfesor,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadorecuperacion',
        name: 'ListadoRecuperacion',
        component: ListadoRecuperacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariorecuperacion',
        name: 'FormularioRecuperacion',
        component: FormularioRecuperacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioregistroactividad',
        name: 'FormularioRegistroActividad',
        component: FormularioRegistroActividad,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoregistroactividad',
        name: 'ListadoRegistroActividad',
        component: ListadoRegistroActividad,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoasignarcoevaluador',
        name: 'ListadoAsignarCoevaluador',
        component: ListadoAsignarCoevaluador,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioasignarcoevaluador',
        name: 'FormularioAsignarCoevaluador',
        component: FormularioAsignarCoevaluador,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadocaliFficacionescoevaluacion',
        name: 'ListadoCalificacionesCoevaluacion',
        component: ListadoCalificacionesCoevaluacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariocalificacionescoevaluacion',
        name: 'FormularioCalificacionesCoevaluacion',
        component: FormularioCalificacionesCoevaluacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadopreguntascoevaluacion',
        name: 'ListadoPreguntasCoevaluacion',
        component: ListadoPreguntasCoevaluacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariopreguntascoevaluacion',
        name: 'FormularioPreguntasCoevaluacion',
        component: FormularioPreguntasCoevaluacion,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadopreguntasevaluacionadministrativa',
        name: 'ListadoPreguntasEvaluacionAdministrativa',
        component: ListadoPreguntasEvaluacionAdministrativa,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariopreguntasevaluacionadministrativa',
        name: 'FormularioPreguntasEvaluacionAdministrativa',
        component: FormularioPreguntasEvaluacionAdministrativa,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadocalificacionesevaluacionadministrativa',
        name: 'ListadoCalificacionesEvaluacionAdministrativa',
        component: ListadoCalificacionesEvaluacionAdministrativa,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariocalificacionesevaluacionadministrativa',
        name: 'FormularioCalificacionesEvaluacionAdministrativa',
        component: FormularioCalificacionesEvaluacionAdministrativa,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioasignarevaladm',
        name: 'FormularioAsignarEvalAdm',
        component: FormularioAsignarEvalAdm,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoasignarevaladm',
        name: 'ListadoAsignarEvalAdm',
        component: ListadoAsignarEvalAdm,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariocalifautoevals',
        name: 'FormularioCalAutoevaluaciones',
        component: FormularioCalAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadocalifautoevals',
        name: 'ListadoCalAutoevaluaciones',
        component: ListadoCalAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariopregfautoevals',
        name: 'FormularioPregAutoevaluaciones',
        component: FormularioPregAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadopregautoevals',
        name: 'ListadoPregAutoevaluaciones',
        component: ListadoPregAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoautoevaluaciones',
        name: 'ListadoAutoevaluaciones',
        component: ListadoAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioautoevaluaciones',
        name: 'FormularioAutoevaluaciones',
        component: FormularioAutoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariocoevaluaciones',
        name: 'FormularioCoevaluaciones',
        component: FormularioCoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadocoevaluaciones',
        name: 'ListadoCoevaluaciones',
        component: ListadoCoevaluaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioactividades',
        name: 'FormularioActividades',
        component: FormularioActividades,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoactividades',
        name: 'ListadoActividades',
        component: ListadoActividades,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoempresas',
        name: 'ListadoEmpresas',
        component: ListadoEmpresas,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioempresas',
        name: 'FormularioEmpresas',
        component: FormularioEmpresas,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadodias',
        name: 'ListadoDias',
        component: ListadoDias,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariodias',
        name: 'FormularioDias',
        component: FormularioDias,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadotareas',
        name: 'ListadoTareas',
        component: ListadoTareas,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariotareas',
        name: 'FormularioTareas',
        component: FormularioTareas,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadotipoactividades',
        name: 'ListadoTipoActividades',
        component: ListadoTipoActividades,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariotipoactividades',
        name: 'FormularioTipoActividades',
        component: FormularioTipoActividades,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadodedicaciones',
        name: 'ListadoDedicaciones',
        component: ListadoDedicaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formulariodedicaciones',
        name: 'FormularioDedicaciones',
        component: FormularioDedicaciones,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/materias/info/:id',
        name: 'InfoMateria',
        component: InfoMateria,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/materias/edit/:id',
        name: 'EditarMateria',
        component: EditarMateria,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/horario/info/:id',
        name: 'InfoHorario',
        component: InfoHorario,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/horario/edit/:id',
        name: 'EditarHorario',
        component: EditarHorario,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/departamento/info/:id',
        name: 'InfoDepartamento',
        component: InfoDepartamento,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/departamento/edit/:id',
        name: 'EditarDepartamento',
        component: EditarDepartamento,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/area/edit/:id',
        name: 'EditarArea',
        component: EditarArea,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/area/info/:id',
        name: 'InfoArea',
        component: InfoArea,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/periodo/info/:id',
        name: 'InfoPeriodo',
        component: InfoPeriodo,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/periodo/edit/:id',
        name: 'EditarPeriodo',
        component: EditarPeriodo,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/profesor/edit/:id',
        name: 'EditarProfesor',
        component: EditarProfesor,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/profesor/info/:id',
        name: 'InfoProfesor',
        component: InfoProfesor,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/recuperacion/edit/:id',
        name: 'EditarRecuperacion',
        component: EditarRecuperacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/recuperacion/info/:id',
        name: 'InfoRecuperacion',
        component: InfoRecuperacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/registroactividades/info/:id',
        name: 'InfoRegistroActividad',
        component: InfoRegistroActividad,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/registroactividades/edit/:id',
        name: 'EditarRegistroActividad',
        component: EditarRegistroActividad,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/asignarevaladmin/edit/:id',
        name: 'InfoAsignarEvalAdm',
        component: InfoAsignarEvalAdm,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/asignarevaladmin/edit/:id',
        name: 'EditarAsignarEvalAdm',
        component: EditarAsignarEvalAdm,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califeadministrativa/info/:id',
        name: 'InfoCalificacioneadministrativa',
        component: InfoCalificacioneadministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califeadministrativa/edit/:id',
        name: 'EditarCalificacioneadministrativa',
        component: EditarCalificacioneadministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/preeadministrativas/info/:id',
        name: 'InfoPreguntasEvaluacionAdministrativa',
        component: InfoPreguntasEvaluacionAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/preeadministrativas/edit/:id',
        name: 'EditarPreguntasEvaluacionAdministrativa',
        component: EditarPreguntasEvaluacionAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/listadoeadministrativas',
        name: 'ListadoEvalAdministrativa',
        component: ListadoEvalAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/formularioeadministrativas',
        name: 'FormularioEvalAdministrativa',
        component: FormularioEvalAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/preeadministrativas/edit/:id',
        name: 'EditarEvalAdministrativa',
        component: EditarEvalAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/preeadministrativas/info/:id',
        name: 'InfoEvalAdministrativa',
        component: InfoEvalAdministrativa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/autoevaluaciones/info/:id',
        name: 'InfoAutoevaluaciones',
        component: InfoAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/autoevaluaciones/edit/:id',
        name: 'EditarAutoevaluaciones',
        component: EditarAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califautoevaluaciones/info/:id',
        name: 'InfoCalAutoevaluaciones',
        component: InfoCalAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califautoevaluaciones/edit/:id',
        name: 'EditCalAutoevaluaciones',
        component: EditCalAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/pregautoevaluaciones/info/:id',
        name: 'InfoPregAutoevaluaciones',
        component: InfoPregAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/pregautoevaluaciones/edit/:id',
        name: 'EditarPregAutoevaluaciones',
        component: EditarPregAutoevaluaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/asigncoevaluador/info/:id',
        name: 'InfoAsignarCoevaluador',
        component: InfoAsignarCoevaluador,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/asigncoevaluador/edit/:id',
        name: 'EditarAsignarCoevaluador',
        component: EditarAsignarCoevaluador,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califcoevaluacion/info/:id',
        name: 'InfoCalificacionesCoevaluacion',
        component: InfoCalificacionesCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/califcoevaluacion/edit/:id',
        name: 'EditarCalificacionesCoevaluacion',
        component: EditarCalificacionesCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/coevaluacion/edit/:id',
        name: 'EditarCoevaluacion',
        component: EditarCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/coevaluacion/info/:id',
        name: 'InfoCoevaluacion',
        component: InfoCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/pregcoevaluacion/edit/:id',
        name: 'EditarPreguntasCoevaluacion',
        component: EditarPreguntasCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/pregcoevaluacion/info/:id',
        name: 'InfoPreguntasCoevaluacion',
        component: InfoPreguntasCoevaluacion,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/actividad/edit/:id',
        name: 'EditarActividad',
        component: EditarActividad,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/actividad/info/:id',
        name: 'InfoActividad',
        component: InfoActividad,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/dedicacion/edit/:id',
        name: 'EditarDedicaciones',
        component: EditarDedicaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/dedicacion/info/:id',
        name: 'InfoDedicaciones',
        component: InfoDedicaciones,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/dia/edit/:id',
        name: 'EditarDia',
        component: EditarDia,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/dia/info/:id',
        name: 'InfoDia',
        component: InfoDia,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/empresa/edit/:id',
        name: 'EditarEmpresa',
        component: EditarEmpresa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/empresa/info/:id',
        name: 'InfoEmpresa',
        component: InfoEmpresa,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/tarea/info/:id',
        name: 'InfoTareas',
        component: InfoTareas,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/tarea/edit/:id',
        name: 'EditarTareas',
        component: EditarTareas,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/tipoactividad/edit/:id',
        name: 'EditarTipoActividades',
        component: EditarTipoActividades,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path: '/app/tipoactividad/info/:id',
        name: 'InfoTipoActividades',
        component: InfoTipoActividades,
        props:true,
        meta: {
            auth: false
        }
    },
    {
        path:'/app/panelcontrol',
        name:'PanelControl',
        component: PanelControl,
        props: false,
        meta: {
            auth: false
        }
    },
    {

        path:'/app/usuarios-admin',
        name:'MainUsuariosAdmin',
        component: MainUsuariosAdmin,
        props: false,

    },
    {
        path:'/app/login',
        name:'Login',
        component: Login,
        props: false,
    },
    {
        path:'/app/roles',
        name:'ListaRoles',
        component: ListaRoles,
        props: false,
    },
    {
        path:'/app/roles/agregarpermisos/:id',
        name:'AsignarPermisosARoles',
        component: AsignarPermisosARoles,

        props:true,
    },
    {
        path:'/app/users',
        name:'ListaUsers',
        component: ListaUsers,
        props: false,
    },
    {
        path:'/app/users/agregarrolesypermisos/:id',
        name:'AsignarRolesYPermisosAUsers',
        component: AsignarRolesYPermisosAUsers,

        props:true,
    },
    {
        path:'/app/Actividades-Departamento',
        name:'ActDepartamento',
        component: ActDepartamento,
        props: false,
        meta: {
            auth: false
        }
    },
    {
        path:'/app/Actividades-Docente',
        name:'ActDocente',
        component: ActDocente,
        props: false,
        meta: {
            auth: false
        }
    },
    {
        path:'/app/usuario/edit/:id',
        name:'EditarUsuario',
        component: EditarUsuario,
        props: true,
        meta: {
            auth: false
        }
    },

    {
        path:'/app/usuario/crear',
        name:'FormularioUsuario',
        component: FormularioUsuario,
        props: false,
        meta: {
            auth: false
        }
    },
    {
        path:'/app/role/crear',
        name:'CrearRoles',
        component: CrearRoles,
        props: false,
        meta: {
            auth: false
        }
    },

    {
        path:'/app/role/edit/:id',
        name:'EditarRoles',
        component: EditarRoles,
        props: true,
        meta: {
            auth: false
        }
    },

    {
        path:'/app/permission/create',
        name:'CrearPermisos',
        component: CrearPermisos,
        props: false,
        meta: {
            auth: false
        }
    },

    {
        path:'/app/permission/edit/:id',
        name:'EditarPermisos',
        component: EditarPermisos,
        props: true,
        meta: {
            auth: false
        }
    },

    {
        path:'/app/operaciones',
        name:'ListaPermisos',
        component: ListaPermisos,
        props: false,
        meta: {
            auth: false
        }
    }






];

export default new VueRouter({
    history: true,
    mode: 'history',
    routes,

});
