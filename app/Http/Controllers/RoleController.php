<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Role::all();
        $collection->each(function($item){
            $item->permissions;
        });

        return response($collection, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Role::create(['name' => $request->get('name'), 'guard_name' => 'web'])){
;
        }else{
            return response('Error', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if($role){
            $role->permissions;
            return response($role, 200);
        }else{
            return response( 'Recurso no encontrado', 200);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if($role->update($request->all())){
            return response('Recurso actualizado con éxito', 201);
        }else{
            return response('Error', 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Role::destroy($id)){
            return response('Recurso eliminado con exito', 201);
        }else{
            return response('Error', 400);
        }
    }

    /**
     * Persist and match a role and a permission in database.
     *
     * @return \Illuminate\Http\Response
     */
    public function gen(){
        /*
            Role::create(['name' => 'coevaluador']);
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'director']);
            Role::create(['name' => 'evaluador_admin']);
            Role::create(['name' => 'coordinador_evaluaciones']);
            Role::create(['name' => 'talento_humano']);
            Role::create(['name' => 'help_desk']);
            $role = Role::find(3);
            $permission = Permission::find(256);

            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        */


        Permission::create(['name' => 'menu_administrar_roles_y_permisos']);
        /*
        Permission::create(['name' => 'action_actividad_admin']);
        Permission::create(['name' => 'action_actividad_create']);
        Permission::create(['name' => 'action_actividad_delete']);
        Permission::create(['name' => 'action_actividad_index']);
        Permission::create(['name' => 'action_actividad_update']);
        Permission::create(['name' => 'action_actividad_view']);
        Permission::create(['name' => 'action_area_admin']);
        Permission::create(['name' => 'action_area_create']);
        Permission::create(['name' => 'action_area_delete']);
        Permission::create(['name' => 'action_area_index']);
        Permission::create(['name' => 'action_area_update']);
        Permission::create(['name' => 'action_area_view']);
        Permission::create(['name' => 'action_autoevaluaciondocente_admin']);
        Permission::create(['name' => 'action_autoevaluaciondocente_update']);
        Permission::create(['name' => 'action_autoevaluacion_create']);
        Permission::create(['name' => 'action_autoevaluacion_delete']);
        Permission::create(['name' => 'action_autoevaluacion_index']);
        Permission::create(['name' => 'action_autoevaluacion_update']);
        Permission::create(['name' => 'action_autoevaluacion_view']);
        Permission::create(['name' => 'action_calificacionautoevaluacion_admin']);
        Permission::create(['name' => 'action_calificacionautoevaluacion_create']);
        Permission::create(['name' => 'action_calificacionautoevaluacion_delete']);
        Permission::create(['name' => 'action_calificacionautoevaluacion_update']);
        Permission::create(['name' => 'action_calificacionautoevaluacion_view']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_admin']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_create']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_delete']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_index']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_update']);
        Permission::create(['name' => 'action_calificacioncoevaluacion_view']);
        Permission::create(['name' => 'action_calificacioneadministrativa_admin']);
        Permission::create(['name' => 'action_calificacioneadministrativa_create']);
        Permission::create(['name' => 'action_calificacioneadministrativa_delete']);
        Permission::create(['name' => 'action_calificacioneadministrativa_index']);
        Permission::create(['name' => 'action_calificacioneadministrativa_update']);
        Permission::create(['name' => 'action_calificacioneadministrativa_view']);
        Permission::create(['name' => 'action_coevaluaciondocente_admin']);
        Permission::create(['name' => 'action_coevaluaciondocente_update']);
        Permission::create(['name' => 'action_coevaluacion_admin']);
        Permission::create(['name' => 'action_coevaluacion_create']);
        Permission::create(['name' => 'action_coevaluacion_delete']);
        Permission::create(['name' => 'action_coevaluacion_index']);
        Permission::create(['name' => 'action_coevaluacion_update']);
        Permission::create(['name' => 'action_coevaluacion_view']);
        Permission::create(['name' => 'action_dedicacion_admin']);
        Permission::create(['name' => 'action_dedicacion_create']);
        Permission::create(['name' => 'action_dedicacion_delete']);
        Permission::create(['name' => 'action_dedicacion_index']);
        Permission::create(['name' => 'action_dedicacion_update']);
        Permission::create(['name' => 'action_dedicacion_view']);
        Permission::create(['name' => 'action_departamento_admin']);
        Permission::create(['name' => 'action_departamento_create']);
        Permission::create(['name' => 'action_departamento_delete']);
        Permission::create(['name' => 'action_departamento_index']);
        Permission::create(['name' => 'action_departamento_update']);
        Permission::create(['name' => 'action_departamento_view']);
        Permission::create(['name' => 'action_dia_admin']);
        Permission::create(['name' => 'action_dia_create']);
        Permission::create(['name' => 'action_dia_delete']);
        Permission::create(['name' => 'action_dia_index']);
        Permission::create(['name' => 'action_dia_update']);
        Permission::create(['name' => 'action_dia_view']);
        Permission::create(['name' => 'action_eadministrativadocente_admin']);
        Permission::create(['name' => 'action_eadministrativadocente_update']);
        Permission::create(['name' => 'action_eadministrativa_admin']);
        Permission::create(['name' => 'action_eadministrativa_create']);
        Permission::create(['name' => 'action_eadministrativa_delete']);
        Permission::create(['name' => 'action_eadministrativa_index']);
        Permission::create(['name' => 'action_eadministrativa_update']);
        Permission::create(['name' => 'action_eadministrativa_view']);
        Permission::create(['name' => 'action_empresa_admin']);
        Permission::create(['name' => 'action_empresa_create']);
        Permission::create(['name' => 'action_empresa_delete']);
        Permission::create(['name' => 'action_empresa_index']);
        Permission::create(['name' => 'action_empresa_update']);
        Permission::create(['name' => 'action_empresa_view']);
        Permission::create(['name' => 'action_panelcontrol_autoevaluacion']);
        Permission::create(['name' => 'action_panelcontrol_coevaluacion']);
        Permission::create(['name' => 'action_panelcontrol_evaluacionadministrativa']);
        Permission::create(['name' => 'action_panelcontrol_importar']);
        Permission::create(['name' => 'action_panelcontrol_index']);
        Permission::create(['name' => 'action_periodo_admin']);
        Permission::create(['name' => 'action_periodo_create']);
        Permission::create(['name' => 'action_periodo_delete']);
        Permission::create(['name' => 'action_periodo_index']);
        Permission::create(['name' => 'action_periodo_update']);
        Permission::create(['name' => 'action_periodo_view']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_admin']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_create']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_delete']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_index']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_update']);
        Permission::create(['name' => 'action_preguntaautoevaluacion_view']);
        Permission::create(['name' => 'action_preguntacoevaluacion_admin']);
        Permission::create(['name' => 'action_preguntacoevaluacion_create']);
        Permission::create(['name' => 'action_preguntacoevaluacion_delete']);
        Permission::create(['name' => 'action_preguntacoevaluacion_index']);
        Permission::create(['name' => 'action_preguntacoevaluacion_update']);
        Permission::create(['name' => 'action_preguntacoevaluacion_view']);
        Permission::create(['name' => 'action_preguntaeadministrativa_admin']);
        Permission::create(['name' => 'action_preguntaeadministrativa_create']);
        Permission::create(['name' => 'action_preguntaeadministrativa_delete']);
        Permission::create(['name' => 'action_preguntaeadministrativa_index']);
        Permission::create(['name' => 'action_preguntaeadministrativa_update']);
        Permission::create(['name' => 'action_preguntaeadministrativa_view']);
        Permission::create(['name' => 'action_profesor_admin']);
        Permission::create(['name' => 'action_profesor_cambiarcontrasenausuario']);
        Permission::create(['name' => 'action_profesor_create']);
        Permission::create(['name' => 'action_profesor_delete']);
        Permission::create(['name' => 'action_profesor_index']);
        Permission::create(['name' => 'action_profesor_update']);
        Permission::create(['name' => 'action_profesor_view']);
        Permission::create(['name' => 'action_registroactividad_admin']);
        Permission::create(['name' => 'action_registroactividad_ayuda']);
        Permission::create(['name' => 'action_registroactividad_cargaractividad']);
        Permission::create(['name' => 'action_registroactividad_cargartarea']);
        Permission::create(['name' => 'action_registroactividad_create']);
        Permission::create(['name' => 'action_registroactividad_createregistroactividad']);
        Permission::create(['name' => 'action_registroactividad_delete']);
        Permission::create(['name' => 'action_registroactividad_detalleactividad']);
        Permission::create(['name' => 'action_registroactividad_detalleactividadpdf']);
        Permission::create(['name' => 'action_registroactividad_grabarregistroactividad']);
        Permission::create(['name' => 'action_registroactividad_index']);
        Permission::create(['name' => 'action_registroactividad_reporteactividad']);
        Permission::create(['name' => 'action_registroactividad_reporteactividadpdf']);
        Permission::create(['name' => 'action_registroactividad_update']);
        Permission::create(['name' => 'action_registroactividad_view']);
        Permission::create(['name' => 'action_reportesactividad_registrodepartamento']);
        Permission::create(['name' => 'action_reportesactividad_registrodepartamentopdf']);
        Permission::create(['name' => 'action_reportesactividad_registrodocente']);
        Permission::create(['name' => 'action_reportesactividad_registrodocentepdf']);
        Permission::create(['name' => 'action_reportescoevaluacion_pendientes']);
        Permission::create(['name' => 'action_reportescoevaluacion_pendientespdf']);
        Permission::create(['name' => 'action_reportescoevaluacion_pordepartamento']);
        Permission::create(['name' => 'action_reportescoevaluacion_pordepartamentopdf']);
        Permission::create(['name' => 'action_reportescoevaluacion_realizadas']);
        Permission::create(['name' => 'action_reportescoevaluacion_realizadaspdf']);
        Permission::create(['name' => 'action_reporteseadministrativa_evaluaciondocente']);
        Permission::create(['name' => 'action_reporteseadministrativa_evaluaciondocentepdf']);
        Permission::create(['name' => 'action_reporteseadministrativa_pendientes']);
        Permission::create(['name' => 'action_reporteseadministrativa_pendientespdf']);
        Permission::create(['name' => 'action_reporteseadministrativa_realizadas']);
        Permission::create(['name' => 'action_reporteseadministrativa_realizadaspdf']);
        Permission::create(['name' => 'action_reporteseadministrativa_resumen']);
        Permission::create(['name' => 'action_reporteseadministrativa_resumenpdf']);
        Permission::create(['name' => 'action_site_about']);
        Permission::create(['name' => 'action_site_contact']);
        Permission::create(['name' => 'action_site_error']);
        Permission::create(['name' => 'action_site_index']);
        Permission::create(['name' => 'action_site_login']);
        Permission::create(['name' => 'action_site_logout']);
        Permission::create(['name' => 'action_tarea_admin']);
        Permission::create(['name' => 'action_tarea_create']);
        Permission::create(['name' => 'action_tarea_delete']);
        Permission::create(['name' => 'action_tarea_index']);
        Permission::create(['name' => 'action_tarea_update']);
        Permission::create(['name' => 'action_tarea_view']);
        Permission::create(['name' => 'action_tipoactividad_admin']);
        Permission::create(['name' => 'action_tipoactividad_create']);
        Permission::create(['name' => 'action_tipoactividad_delete']);
        Permission::create(['name' => 'action_tipoactividad_index']);
        Permission::create(['name' => 'action_tipoactividad_update']);
        Permission::create(['name' => 'action_tipoactividad_view']);
        Permission::create(['name' => 'action_ui_rbacajaxassignment']);
        Permission::create(['name' => 'action_ui_rbacauthitemchilditems']);
        Permission::create(['name' => 'action_ui_rbaclistroles']);
        Permission::create(['name' => 'action_ui_usermanagementadmin']);
        Permission::create(['name' => 'action_ui_usermanagementcreate']);
        Permission::create(['name' => 'action_ui_usermanagementupdate']);
        Permission::create(['name' => 'controller_actividad']);
        Permission::create(['name' => 'controller_area']);
        Permission::create(['name' => 'controller_autoevaluacion']);
        Permission::create(['name' => 'controller_autoevaluaciondocente']);
        Permission::create(['name' => 'controller_calificacionautoevaluacion']);
        Permission::create(['name' => 'controller_calificacioncoevaluacion']);
        Permission::create(['name' => 'controller_calificacioneadministrativa']);
        Permission::create(['name' => 'controller_coevaluacion']);
        Permission::create(['name' => 'controller_coevaluaciondocente']);
        Permission::create(['name' => 'controller_dedicacion']);
        Permission::create(['name' => 'controller_departamento']);
        Permission::create(['name' => 'controller_dia']);
        Permission::create(['name' => 'controller_eadministrativa']);
        Permission::create(['name' => 'controller_eadministrativadocente']);
        Permission::create(['name' => 'controller_empresa']);
        Permission::create(['name' => 'controller_panelcontrol']);
        Permission::create(['name' => 'controller_periodo']);
        Permission::create(['name' => 'controller_preguntaautoevaluacion']);
        Permission::create(['name' => 'controller_preguntacoevaluacion']);
        Permission::create(['name' => 'controller_preguntaeadministrativa']);
        Permission::create(['name' => 'controller_profesor']);
        Permission::create(['name' => 'controller_registroactividad']);
        Permission::create(['name' => 'controller_reportesactividad']);
        Permission::create(['name' => 'controller_reportescoevaluacion']);
        Permission::create(['name' => 'controller_reporteseadministrativa']);
        Permission::create(['name' => 'controller_site']);
        Permission::create(['name' => 'controller_tarea']);
        Permission::create(['name' => 'controller_tipoactividad']);

        Permission::create(['name' => 'edit-advanced-profile-features']);
        Permission::create(['name' => 'menu_administrar_usuarios']);
        Permission::create(['name' => 'menu_buzonInformacion']);
        Permission::create(['name' => 'menu_descripcion']);
        Permission::create(['name' => 'menu_DescripcionGeneral']);
        Permission::create(['name' => 'menu_investigadores']);
        Permission::create(['name' => 'menu_mantenimiento']);
        Permission::create(['name' => 'menu_mantenimiento_Actividad']);
        Permission::create(['name' => 'menu_mantenimiento_Dedicacion']);
        Permission::create(['name' => 'menu_mantenimiento_Dia']);
        Permission::create(['name' => 'menu_mantenimiento_Empresa']);
        Permission::create(['name' => 'menu_mantenimiento_PanelControl']);
        Permission::create(['name' => 'menu_mantenimiento_Tarea']);
        Permission::create(['name' => 'menu_mantenimiento_TipoActividad']);
        Permission::create(['name' => 'menu_miAvance']);
        Permission::create(['name' => 'menu_misEncuestas']);
        Permission::create(['name' => 'menu_procesos']);
        Permission::create(['name' => 'menu_procesos_autoevaluacion']);
        Permission::create(['name' => 'menu_procesos_autoevaluacion_Autoevaluacion']);
        Permission::create(['name' => 'menu_procesos_autoevaluacion_Calificaciones']);
        Permission::create(['name' => 'menu_procesos_autoevaluacion_Preguntas']);
        Permission::create(['name' => 'menu_procesos_coevaluacion']);
        Permission::create(['name' => 'menu_procesos_coevaluacion_AsignarCoevaluador']);
        Permission::create(['name' => 'menu_procesos_coevaluacion_Calificaciones']);
        Permission::create(['name' => 'menu_procesos_coevaluacion_Coevaluacion']);
        Permission::create(['name' => 'menu_procesos_coevaluacion_Preguntas']);
        Permission::create(['name' => 'menu_procesos_eadministrativa']);
        Permission::create(['name' => 'menu_procesos_eadministrativa_AsignarEvaAdministrativa']);
        Permission::create(['name' => 'menu_procesos_eadministrativa_Calificaciones']);
        Permission::create(['name' => 'menu_procesos_eadministrativa_EvaAdministrativa']);
        Permission::create(['name' => 'menu_procesos_eadministrativa_Preguntas']);
        Permission::create(['name' => 'menu_procesos_planificacion']);
        Permission::create(['name' => 'menu_procesos_planificacion_Actividad']);
        Permission::create(['name' => 'menu_procesos_planificacion_Area']);
        Permission::create(['name' => 'menu_procesos_planificacion_Departamento']);
        Permission::create(['name' => 'menu_procesos_planificacion_Horario']);
        Permission::create(['name' => 'menu_procesos_planificacion_Materia']);
        Permission::create(['name' => 'menu_procesos_planificacion_Periodo']);
        Permission::create(['name' => 'menu_procesos_planificacion_Profesor']);
        Permission::create(['name' => 'menu_procesos_planificacion_Recuperacion']);
        Permission::create(['name' => 'menu_procesos_planificacion_TipoActividad']);
        Permission::create(['name' => 'menu_procesos_registro']);
        Permission::create(['name' => 'menu_procesos_registro_Actividades']);
        Permission::create(['name' => 'menu_procesos_registro_Control']);
        Permission::create(['name' => 'menu_procesos_registro_RegistrarActividadDocente']);
        Permission::create(['name' => 'menu_procesos_registro_RegistroActividad']);
        Permission::create(['name' => 'menu_reportes']);
        Permission::create(['name' => 'menu_reportes_actividades']);
        Permission::create(['name' => 'menu_reportes_actividad_RegistroDepartamento']);
        Permission::create(['name' => 'menu_reportes_actividad_RegistroDocente']);
        Permission::create(['name' => 'menu_reportes_coevaluacion']);
        Permission::create(['name' => 'menu_reportes_coevaluacion_pendientes']);
        Permission::create(['name' => 'menu_reportes_coevaluacion_PorDepartamento']);
        Permission::create(['name' => 'menu_reportes_coevaluacion_Realizadas']);
        Permission::create(['name' => 'menu_reportes_eadministrativa']);
        Permission::create(['name' => 'menu_reportes_eadministrativa_EvaluacionDocente']);
        Permission::create(['name' => 'menu_reportes_eadministrativa_pendientes']);
        Permission::create(['name' => 'menu_reportes_eadministrativa_Realizadas']);
        Permission::create(['name' => 'menu_reportes_eadministrativa_Resumen']);
        Permission::create(['name' => 'menu_reportes_evaluaciones']);
        Permission::create(['name' => 'menu_reportes_generales']);
        Permission::create(['name' => 'menu_reportes_generales_RepDiario']);
        Permission::create(['name' => 'menu_reportes_generales_RepInasistencia']);
        Permission::create(['name' => 'menu_reportes_generales_RepMaterias']);
        Permission::create(['name' => 'menu_reportes_generales_RepporFecha']);
        Permission::create(['name' => 'menu_reportes_generales_RepProfesor']);

*/
    }

    /**
     * Give roles to users
     *
     * @return \Illuminate\Http\Response
     */
    public function giveRoles(){
        $user = User::find(1);
        $user->assignRole('admin');
        return $user;
    }

    /**
     * Delete role permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function deletePermiision($role_id, $permission_id){
        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);
        if($role->hasPermissionTo($permission)){
            if($role->revokePermissionTo($permission)){
                return response('Permiso revocado exitosamente',201);
            }else{
                return response('Error interno',400);
            }
        }else{
            return response('Este rol no tiene este permiso asignado.', 400);
        }

    }

    /**
     * Give perrmissions to a role
     *
     * @return \Illuminate\Http\Response
     */
    public function givePermission($role_id, $permission_id){
        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);

        if($role->hasPermissionTo($permission)){
            return response('Este rol ya cuenta con este permiso asignado.', 200);
        }else{
            if($role->givePermissionTo($permission)){
                return response('Permiso otorgado con éxito.', 201);
            }else{
                return response('Error.', 400);
            }
        }


    }

    /**
     * Retrieve all the resources from the storage that match with request data
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {


        $collection =  User::orderBy('id','ASC')


        ->paginate(10);

        return response($collection, 200);
    }


}
