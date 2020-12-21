<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Horario::all();
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
        $horario = new Horario($request->all());
        if($horario->saveOrFail()){
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
        $horario = Horario::find($id);
        $horario->periodo;
        $horario->profesor;
        $horario->materia;
        $horario->recuperacion;
        $horario->dia;
        return response($horario, 200);
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
        $horario = Horario::find($id);
        if($horario->update($request->all())){
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
        if(Horario::destroy($id)){
            return response('Recurso eliminado', 201);
        }else{
            return response('Error', 500);
        }
    }

    /**
     * Retrieve all the resources from the storage that match with request data
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $code = $request->input('codigo_hor');
        $codigo_per = $request->input('codigo_per');
        $codigo_pro = $request->input('codigo_pro');
        $codigo_mat = $request->input('codigo_mat');
        $codigo_rec = $request->input('codigo_rec');
        $codigo_dia = $request->input('codigo_dia');
        $hora_entrada_hor = $request->input('hora_entrada_hor');
        $hora_salida_hor = $request->input('hora_salida_hor');
        $numero_horas_hor = $request->input('numero_horas_hor');

        $collection =  Horario::orderBy('codigo_hor','ASC')
        ->code($code)
        ->periodo($codigo_per)
        ->profesor($codigo_pro)
        ->materia($codigo_mat)
        ->recuperacion($codigo_rec)
        ->dia($codigo_dia)
        ->hora_entrada_hor($hora_entrada_hor)
        ->hora_salida_hor($hora_salida_hor)
        ->numero_horas_hor($numero_horas_hor)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
            $item->profesor;
            $item->materia;
            $item->recuperacion;
            $item->dia;
        });
        return response($collection, 200);
    }
}
