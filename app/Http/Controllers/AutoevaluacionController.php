<?php

namespace App\Http\Controllers;

use App\Autoevaluacion;
use Illuminate\Http\Request;

class AutoevaluacionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_autoevaluacion_index')->only(['list']);
        $this->middleware('can:action_autoevaluacion_create')->only('store');
        $this->middleware('can:action_autoevaluacion_view')->only('show');
        $this->middleware('can:action_autoevaluacion_update')->only('update');
        $this->middleware('can:action_autoevaluacion_delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoevaluaciones = Autoevaluacion::all();
        $autoevaluaciones->each(function($item){
            $item->periodo;
            $item->profesor;
        });
        return response($autoevaluaciones, 200);
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
        $autoevaluacion = new Autoevaluacion($request->all());
        if($autoevaluacion->saveOrFail()){
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
        $autoevaluacion = Autoevaluacion::find($id);
        $autoevaluacion->periodo;
        $autoevaluacion->profesor;
        return response($autoevaluacion, 200);
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
        $autoevaluacion = Autoevaluacion::find($id);
        if($autoevaluacion->update($request->all())){
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
        if(Autoevaluacion::destroy($id)){
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
        $profesor = $request->input('codigo_pro');
        $promedio = $request->input('cau_promedio');
        $observacion = $request->input('cau_observacion');
        $fecha = $request->input('cau_fecha');
        $collection =  Autoevaluacion::orderBy('cau_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->profesor($profesor)
        ->promedio($promedio)
        ->observacion($observacion)
        ->fecha($fecha)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
            $item->profesor;
        });
        return response($collection, 200);
    }
}
