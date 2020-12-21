<?php

namespace App\Http\Controllers;

use App\Dedicacion;
use Illuminate\Http\Request;

class DedicacionController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_dedicacion_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_dedicacion_create')->only('store');
        $this->middleware('can:action_dedicacion_delete')->only('destroy');
        $this->middleware('can:action_dedicacion_index')->only('list');
        $this->middleware('can:action_dedicacion_update')->only('update');
        $this->middleware('can:action_dedicacion_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicaciones = Dedicacion::all();
        return response($dedicaciones, 200);
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
        $dedicacion = new Dedicacion($request->all());
        if($dedicacion->saveOrFail()){
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
        $dedicacion = Dedicacion::find($id);
        $dedicacion->tipo;
        return response($dedicacion, 200);
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
        $dedicacion = Dedicacion::find($id);
        if($dedicacion->update($request->all())){
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
        if(Dedicacion::destroy($id)){
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
        $code = $request->input('ded_codigo');
        $nombre = $request->input('ded_nombre');
        $collection =  Dedicacion::orderBy('ded_codigo','ASC')
        ->code($code)
        ->nombre($nombre)
        ->paginate(10);
        return response($collection, 200);
    }
}
