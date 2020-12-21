<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Tipoactividad;
use App\Actividad;
use App\Tarea;
use App\Registroactividad;

class APIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getTipoactividades(Request $request)
    {
        $data = Tipoactividad::get();
        return response()->json($data);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getActividades(Request $request)
    {
        $data = Actividad::where('codigo_tact', $request->tipoactividad_id)->get();
        return response()->json($data);
    
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getTareas(Request $request)
    {
        $data = Tarea::where('codigo_act', $request->actividad_id)->get();
        return response()->json($data);
    
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getRegistrosact(Request $request)
    {
        $data = Registroactividad::get();
        return response()->json($data);
    }

    

}