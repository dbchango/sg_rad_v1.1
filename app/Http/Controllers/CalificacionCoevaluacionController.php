<?php

namespace App\Http\Controllers;

use App\CalificacionCoevaluacion;
use Illuminate\Http\Request;

class CalificacionCoevaluacionController extends Controller
{


     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_calificacioncoevaluacion_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_calificacioncoevaluacion_create')->only('store');
        $this->middleware('can:action_calificacioncoevaluacion_delete')->only('destroy');
        $this->middleware('can:action_calificacioncoevaluacion_index')->only('list');
        $this->middleware('can:action_calificacioncoevaluacion_update')->only('update');
        $this->middleware('can:action_calificacioncoevaluacion_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificaciones = CalificacionCoevaluacion::all();
        $calificaciones->each(function($item){
            $item->periodo;
        });
        return response($calificaciones, 200);
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
        $calificacion = new CalificacionCoevaluacion($request->all());
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
        $calificacion = CalificacionCoevaluacion ::find($id);
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
        $calificacion = CalificacionCoevaluacion ::find($id);
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
        if(CalificacionCoevaluacion::destroy($id)){
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
        $code = $request->input('cco_codigo');
        $periodo = $request->input('codigo_per');
        $nombre = $request->input('cco_nombre');
        $valor = $request->input('cco_valor');

        $collection =  CalificacionCoevaluacion::orderBy('cco_codigo','ASC')
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
