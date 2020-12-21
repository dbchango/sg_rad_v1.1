<?php

namespace App\Http\Controllers;

use App\Recuperacion;
use Illuminate\Http\Request;

class RecuperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recuperaciones = Recuperacion::all();
        return response($recuperaciones, 200);
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
        $recuperacion = new Recuperacion($request->all());
        if($recuperacion->saveOrFail()){
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
        $recuperacion = Recuperacion::find($id);
        $recuperacion->periodo;
        $recuperacion->profesor;
        $recuperacion->materia;
        $recuperacion->dia;
        return response($recuperacion, 200);
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
        $recuperacion = Recuperacion::find($id);
        if($recuperacion->update($request->all())){
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
        if(Recuperacion::destroy($id)){
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
        $code = $request->input('codigo_rec');
        $periodo = $request->input('codigo_per');
        $profesor = $request->input('codigo_pro');
        $materia = $request->input('codigo_mat');
        $dia = $request->input('codigo_dia');
        $fecha_rec = $request->input('fecha_rec');
        $h_entrada = $request->input('hora_entrada_rec');
        $h_salida = $request->input('hora_salida_rec');
        $f_clase_rec = $request->input('fecha_clase_rec');
        $h_inicio = $request->input('hora_inicio_clase_rec');
        $h_fin = $request->input('hora_fin_clase_rec');
        $observaciones = $request->input('observaciones_rec');

        $collection = Recuperacion::orderBy('codigo_rec', 'ASC')
        ->code($code)
        ->periodo($periodo)
        ->profesor($profesor)
        ->materia($materia)
        ->dia($dia)
        ->fecharec($fecha_rec)
        ->horaent($h_entrada)
        ->horasal($h_salida)
        ->fechaclase($f_clase_rec)
        ->horaini($h_inicio)
        ->horafin($h_fin)
        ->observacion($observaciones)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
            $item->profesor;
            $item->materia;
            $item->dia;
        });
        return response($collection, 200);
    }
}
