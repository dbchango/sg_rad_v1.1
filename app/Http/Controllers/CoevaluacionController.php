<?php

namespace App\Http\Controllers;

use App\Coevaluacion;
use Illuminate\Http\Request;

class CoevaluacionController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_coevaluacion_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_coevaluacion_create')->only('store');
        $this->middleware('can:action_coevaluacion_delete')->only('destroy');
        $this->middleware('can:action_coevaluacion_index')->only('list');
        $this->middleware('can:action_coevaluacion_update')->only('update');
        $this->middleware('can:action_coevaluacion_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coevaluaciones = Coevaluacion::all();
        $coevaluaciones->each(function($item){
            $item->periodo;
            $item->evaluador;
            $item->evaluado;
        });
        return response($coevaluaciones, 200);
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
        $coevaluacion = new Coevaluacion($request->all());
        if($coevaluacion->saveOrFail()){
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
        $coevaluacion = Coevaluacion::find($id);
        $coevaluacion->periodo;
        $coevaluacion->evaluador;
        $coevaluacion->evaluado;
        return response($coevaluacion, 200);
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
        $coevaluacion = Coevaluacion::find($id);
        if($coevaluacion->update($request->all())){
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
        if(Coevaluacion::destroy($id)){
            return response('Recurso eliminado',201);
        }else{

            return response('Error',500);
        }
    }

    /**
     * Retrieve all the resources from the storage that match with request data
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $code = $request->input('coe_codigo');
        $periodo = $request->input('codigo_per');
        $evaluador = $request->input('codigo_pro_evaluador');
        $evaluado = $request->input('codigo_pro_evaluado');
        $promedio = $request->input('coe_promedio');
        $observacion = $request->input('coe_observacion');
        $fecha = $request->input('coe_fecha');

        $collection =  Coevaluacion::orderBy('coe_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->evaluador($evaluador)
        ->evaluado($evaluado)
        ->promedio($promedio)
        ->observacion($observacion)
        ->fecha($fecha)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
            $item->evaluador;
            $item->evaluado;
        });
        return response($collection, 200);
    }
}
