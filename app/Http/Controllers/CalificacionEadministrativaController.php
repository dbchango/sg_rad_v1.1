<?php

namespace App\Http\Controllers;

use App\CalificacionEadministrativa;
use Illuminate\Http\Request;

class CalificacionEadministrativaController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_calificacioneadministrativa_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_calificacioneadministrativa_create')->only('store');
        $this->middleware('can:action_calificacioneadministrativa_delete')->only('destroy');
        $this->middleware('can:action_calificacioneadministrativa_index')->only('list');
        $this->middleware('can:action_calificacioneadministrativa_update')->only('update');
        $this->middleware('can:action_calificacioneadministrativa_view')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificaciones_ea = CalificacionEadministrativa::all();
        $calificaciones_ea->each(function($item){
            $item->periodo;
        });
        return response($calificaciones_ea, 200);
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
        $calificacion = new CalificacionEadministrativa($request->all());
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
        $calificacion = CalificacionEadministrativa::find($id);
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
        $calificacion = CalificacionEadministrativa::find($id);
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
        if(CalificacionEadministrativa::destroy($id)){
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
        $code = $request->input('cea_codigo');

        $periodo = $request->input('codigo_per');
        $nombre = $request->input('cea_nombre');
        $valor = $request->input('cea_valor');

        $collection =  CalificacionEadministrativa::orderBy('cea_codigo','ASC')
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
