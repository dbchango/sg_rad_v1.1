<?php

namespace App\Http\Controllers;

use App\ResumenEvaluacion;
use Illuminate\Http\Request;

class ResumenEvaluacionController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('role:admin')->only(['list', 'show', 'store', 'destroy']);



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = ResumenEvaluacion::all();
        $collection->each(function($item){
            $item->periodo;
            $item->departamento;
            $item->profesor;
        });
        return response($collection, 200);
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
        $resumen = new ResumenEvaluacion($request->all());
        if($resumen->saveOrFail()){
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
        $resumen = ResumenEvaluacion::find($id);
        $resumen->periodo;
        $resumen->departamento;
        $resumen->profesor;
        return response($resumen, 200);
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
        $resumen = ResumenEvaluacion::find($id);
        if($resumen->update($request->all())){
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
        if(ResumenEvaluacion::destroy($id)){
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
        $code = $request->input('res_codigo');
        $periodo = $request->input('codigo_per');
        $departamento = $request->input('codigo_dep');
        $profesor = $request->input('codigo_pro');

        $collection =  ResumenEvaluacion::orderBy('res_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->departamento($departamento)
        ->profesor($profesor)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
            $item->departamento;
            $item->profesor;
        });
        return response($collection, 200);
    }
}
