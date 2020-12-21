<?php

namespace App\Http\Controllers;

use App\RegistroActividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroactividadController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_registroactividad_admin')->only(['show', 'store', 'destroy']);
        $this->middleware('can:action_registroactividad_create')->only('store');
        $this->middleware('can:action_registroactividad_delete')->only('destroy');
        $this->middleware('can:action_registroactividad_index')->only('list');
        $this->middleware('can:action_registroactividad_update')->only('update');
        $this->middleware('can:action_registroactividad_view')->only('show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros_actividades = RegistroActividad::all();
        return response($registros_actividades, 200);
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
        $registro = new RegistroActividad($request->all());
        if($registro->saveOrFail()){
            return response('Recurso almacenado con exito',201);
        }else{
            return response('Error',500);
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
        $registro = RegistroActividad::find($id);
        $registro->profesor;
        $registro->departamento;
        $registro->area;
        $registro->tipo;
        $registro->actividad;
        $registro->tarea;
        return response($registro, 200);
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
        $registro = RegistroActividad::find($id);
        if($registro->update($request->all())){
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
        if(RegistroActividad::destroy($id)){
            return response('Recurso eliminado',201);
        }else{
            return response("Error", 500);
        }
    }

    /**
     * Retrieve all the resources from the storage that match with request data
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request){
        $code = $request->input('codigo_rac');
        $profesor = $request->input('codigo_pro');
        $departamento = $request->input('codigo_dep');
        $area = $request->input('codigo_area');
        $fecha_rac = $request->input('fecha_rac');
        $codigo_tact = $request->input('codigo_tact');
        $codigo_act = $request->input('codigo_act');
        $codigo_tar = $request->input('codigo_tar');
        $comentario_rac = $request->input('comentario_rac');
        $hinicio_rac = $request->input('hinicio_rac');
        $hfin_rac = $request->input('hfin_rac');
        $horas_rac = $request->input('horas_rac');

        if(
            $collection = RegistroActividad::orderBy('codigo_rac', 'ASC')
            ->code($code)
            ->profesor($profesor)
            ->departamento($departamento)
            ->area($area)
            ->fecharac($fecha_rac)
            ->tipoactividad($codigo_tact)
            ->actividad($codigo_act)
            ->tarea($codigo_tar)
            ->comentario($comentario_rac)
            ->hinicio($hinicio_rac)
            ->hfin($hfin_rac)
            ->horas($horas_rac)
            ->paginate(10)
        )
        {

            $collection->each(function($item){
                $item->profesor;
                $item->departamento;
                $item->area;
                $item->tipo;
                $item->actividad;
                $item->tarea;
            });
            return response($collection, 200);
        };


    }


    /**
     * Busca el intervalo de dos fechas de registro
     *
     * @return \Illuminate\Http\Response
     */
    public function rango(Request $request){
        $departamento = $request->input('codigo_dep');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        if($collection = RegistroActividad::orderBy('codigo_rac', 'ASC')
        ->departamento($departamento)
        ->rango($fecha_inicio,$fecha_fin)
        ->paginate(10)){
            $collection->each(function($item){
                $item->profesor;
            });
            return response($collection, 200);
        };
    }

    /**
     * Busca el intervalo de dos fechas de registro por
     *
     * @return \Illuminate\Http\Response
     */
    public function rangoprof(Request $request){
        $profesor = $request->input('codigo_pro');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        if($collection = RegistroActividad::orderBy('codigo_rac', 'ASC')
        ->profesor($profesor)
        ->rango($fecha_inicio,$fecha_fin)
        ->paginate(10)){
            $collection->each(function($item){
                $item->profesor;
            });
            return response($collection, 200);
        };
    }



}
