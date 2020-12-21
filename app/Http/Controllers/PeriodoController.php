<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class PeriodoController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:action_periodo_admin')->only(['list', 'show', 'store', 'destroy']);
        $this->middleware('can:action_periodo_create')->only('store');
        $this->middleware('can:action_periodo_delete')->only('destroy');
        $this->middleware('can:action_periodo_index')->only('list');
        $this->middleware('can:action_periodo_update')->only('update');
        $this->middleware('can:action_periodo_view')->only('show');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return response($periodos, 200);
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
        $periodo = new Periodo($request->all());
        if($periodo->saveOrFail()){
            return "Registro guardado";
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
        $periodo = Periodo::find($id);
        return response($periodo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $periodo = Periodo::find($id);
        if($periodo->update($request->all())){
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
        if(Periodo::destroy($id)){
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
        $code = $request->input('codigo_per');
        $periodo = $request->input('nombre_per');
        $activo = $request->input('activo_per');
        $collection = Periodo::orderBy('codigo_per', 'ASC')
        ->code($code)
        ->nombre($periodo)
        ->activo($activo)
        ->paginate(10);
        return response($collection, 200);
    }
}
