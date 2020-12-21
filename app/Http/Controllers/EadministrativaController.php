<?php

namespace App\Http\Controllers;

use App\Eadministrativa;
use Illuminate\Http\Request;

class EadministrativaController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_eadministrativa_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_eadministrativa_create')->only('store');
        $this->middleware('can:action_eadministrativa_delete')->only('destroy');
        $this->middleware('can:action_eadministrativa_index')->only('list');
        $this->middleware('can:action_eadministrativa_update')->only('update');
        $this->middleware('can:action_eadministrativa_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eadministrativas = Eadministrativa::all();
        $eadministrativas->each(function($item){
            $item->periodo;
            $item->evaluador;
            $item->evaluado;
        });
        return response($eadministrativas,200);
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
        $eadministrativa = new Eadministrativa($request->all());
        if($eadministrativa->saveOrFail()){
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
        $eadministrativa = Eadministrativa::find($id);
        $eadministrativa->periodo;
        $eadministrativa->evaluador;
        $eadministrativa->evaluado;
        return response($eadministrativa, 200);
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
        $eadministrativa = Eadministrativa::find($id);
        if($eadministrativa->update($request->all())){
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
        if(Eadministrativa::destroy($id)){
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
        $code = $request->input('codigo_act');
        $periodo = $request->input('codigo_per');
        $evaluador = $request->input('codigo_pro_evaluador');
        $evaluado = $request->input('codigo_pro_evaluado');
        $fecha = $request->input('cea_fecha');

        $collection =  Eadministrativa::orderBy('cea_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->evaluador($evaluador)
        ->evaluado($evaluado)
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
