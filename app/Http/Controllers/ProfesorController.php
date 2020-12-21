<?php

namespace App\Http\Controllers;

use App\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_profesor_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_profesor_create')->only('store');
        $this->middleware('can:action_profesor_delete')->only('destroy');
        $this->middleware('can:action_profesor_index')->only('list');
        $this->middleware('can:action_profesor_update')->only('update');
        $this->middleware('can:action_profesor_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return response($profesores, 200);
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
        $profesor = new Profesor($request->all());
        if($profesor->saveOrFail()){
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
        $profesor = Profesor::find($id);
        $profesor->departamento;
        $profesor->area;
        $profesor->dedicacion;
        return response($profesor, 200);
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
        $profesor = Profesor::find($id);
        if($profesor->update($request->all())){
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
        if(Profesor::destroy($id)){
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
        $code = $request->input('codigo_pro');
        $cedula = $request->input('cedula_pro');
        $miespe = $request->input('miespe_pro');
        $nombre = $request->input('nombre_pro');
        $apellido = $request->input('apellido_pro');
        $email  = $request->input('email_pro');
        $departamento  = $request->input('codigo_dep');
        $area  = $request->input('cod_area');
        $estado  = $request->get('estado_pro');
        $director  = $request->input('director_pro');
        $jarea  = $request->input('jarea_pro');
        $dedicacion  = $request->input('ded_codigo');
        $collection = Profesor::orderBy('codigo_pro', 'ASC')
        ->code($code)
        ->cedula($cedula)
        ->miespe($miespe)
        ->nombre($nombre)
        ->apellido($apellido)
        ->email($email)
        ->departamento($departamento)
        ->area($area)
        ->estado($estado)
        ->director($director)
        ->jarea($jarea)
        ->dedicacion($dedicacion)
        ->paginate(10);
        $collection->each(function($item){
            $item->departamento;
            $item->area;
            $item->dedicacion;
            $item->registros;
        });
        return response($collection, 200);
    }
}
