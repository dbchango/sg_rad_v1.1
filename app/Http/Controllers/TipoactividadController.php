<?php

namespace App\Http\Controllers;

use App\TipoActividad;
use Illuminate\Http\Request;

class TipoactividadController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_tipoactividad_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_tipoactividad_create')->only('store');
        $this->middleware('can:action_tipoactividad_delete')->only('destroy');
        $this->middleware('can:action_tipoactividad_index')->only('list');
        $this->middleware('can:action_tipoactividad_update')->only('update');
        $this->middleware('can:action_tipoactividad_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposactividades = TipoActividad::all();
        return response($tiposactividades, 200);
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
        $tact = new TipoActividad($request->all());
        if($tact->saveOrFail()){
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
        $tact = TipoActividad::find($id);
        return response($tact, 200);
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
        $tact = TipoActividad::find($id);
        if($tact->update($request->all())){
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
        if(TipoActividad::destroy($id)){
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
        $code = $request->input('codigo_tact');
        $nombre = $request->input('nombre_tact');

        $collection =  TipoActividad::orderBy('codigo_tact','ASC')
        ->code($code)
        ->nombre($nombre)
        ->paginate(10);

        return response($collection, 200);
    }
}
