<?php

namespace App\Http\Controllers;

use App\CalificacionAutoevaluacion;
use Illuminate\Http\Request;

class CalificacionAutoevaluacionController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_calificacionautoevaluacion_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_calificacionautoevaluacion_create')->only('store');
        $this->middleware('can:action_calificacionautoevaluacion_delete')->only('destroy');
        $this->middleware('can:action_calificacionautoevaluacion_update')->only('update');
        $this->middleware('can:action_calificacionautoevaluacion_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificaciones_autoevals = CalificacionAutoevaluacion::all();
        $calificaciones_autoevals->each(function($item){
            $item->periodo;
        });
        return response($calificaciones_autoevals, 200);
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
        $calificacion = new CalificacionAutoevaluacion($request->all());
        if($calificacion->saveOrFail()){
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
        $calificacion = CalificacionAutoevaluacion::find($id);
        $calificacion->periodo;
        return response($calificacion, 200);
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
        $calificacion = CalificacionAutoevaluacion::find($id);
        if($calificacion->update($request->all())){
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
        if(CalificacionAutoevaluacion::destroy($id)){
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
        $code = $request->input('cau_codigo');
        $periodo = $request->input('codigo_per');
        $nombre = $request->input('cau_nombre');
        $valor = $request->input('cau_valor');

        $collection =  CalificacionAutoevaluacion::orderBy('cau_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->nombre($nombre)
        ->valor($valor)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
        });
        return response($collection, 200);
    }

}
