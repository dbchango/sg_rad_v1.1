<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Mime\Header\Headers;
use Illuminate\Support\Facades\Auth;
use \App\Http\Middleware\VerifyCsrfToken;
class ActividadController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_actividad_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_actividad_index')->only(['list']);
        $this->middleware('can:action_actividad_create')->only('store');
        $this->middleware('can:action_actividad_view')->only('show');
        $this->middleware('can:action_actividad_update')->only('update');
        $this->middleware('can:action_actividad_delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo)
    {

        $collection = Actividad::orderBy('codigo_act','ASC')->tipoactividad($tipo)->get();
        $collection->each(function($element){
            $element->tipo;
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
        $actividad = new Actividad($request->all());
        if($actividad->saveOrFail()){
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
    public function show(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->tipo;
        return response($actividad, 200);
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
        $actividad = Actividad::find($id);
        if($actividad->update($request->all())){
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
        if(Actividad::destroy($id)){
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
        $tipo = $request->input('codigo_tact');
        $actividad = $request->input('nombre_act');

        $collection =  Actividad::orderBy('codigo_act','ASC')
        ->code($code)
        ->nombre($actividad)
        ->tipoactividad($tipo)
        ->paginate(10);
        $collection->each(function($item){
            $item->tipo;
        });
        return response($collection, 200);
    }

    public function listbytact($tipo){
        $collection = Actividad::orderBy('codigo_act','ASC')->tipoactividad($tipo)->get();
        return response($collection);
    }

    public function listall(){
        $collection = Actividad::all();
        return response($collection, 200);
    }
}
