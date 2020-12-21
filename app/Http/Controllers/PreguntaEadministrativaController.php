<?php

namespace App\Http\Controllers;

use App\Eadministrativa;
use App\PreguntaEadministrativa;
use Illuminate\Http\Request;

class PreguntaEadministrativaController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_preguntaeadministrativa_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_preguntaeadministrativa_create')->only('store');
        $this->middleware('can:action_preguntaeadministrativa_delete')->only('destroy');
        $this->middleware('can:action_preguntaeadministrativa_index')->only('list');
        $this->middleware('can:action_preguntaeadministrativa_update')->only('update');
        $this->middleware('can:action_preguntaeadministrativa_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = PreguntaEadministrativa::all();
        $preguntas->each(function($item){
            $item->periodo;
        });
        return response($preguntas, 200);
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
        $pregunta = new PreguntaEadministrativa($request->all());
        if($pregunta->saveOrFail()){
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
        $pregunta = PreguntaEadministrativa::find($id);
        $pregunta->periodo;
        return response($pregunta, 200);
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
        $pregunta = PreguntaEadministrativa::find($id);
        if($pregunta->update($request->all())){
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
        if(PreguntaEadministrativa::destroy($id)){
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
        $code = $request->input('pea_codigo');
        $periodo = $request->input('codigo_per');
        $numero = $request->input('pea_numero');
        $nombre = $request->input('pea_nombre');

        $collection =  PreguntaEadministrativa::orderBy('pea_codigo','ASC')
        ->code($code)
        ->periodo($periodo)
        ->numero($numero)
        ->nombre($nombre)
        ->paginate(10);
        $collection->each(function($item){
            $item->periodo;
        });
        return response($collection, 200);
    }
}
