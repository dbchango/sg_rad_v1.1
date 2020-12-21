<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $coe_codigo
 * @property int        $codigo_per
 * @property int        $codigo_pro_evaluador
 * @property int        $codigo_pro_evaluado
 * @property string     $coe_observacion
 * @property DateTime   $coe_fecha
 */
class Coevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coevaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'coe_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coe_codigo', 'codigo_per', 'codigo_pro_evaluador', 'codigo_pro_evaluado', 'coe_pregunta01', 'coe_pregunta02', 'coe_pregunta03', 'coe_pregunta04', 'coe_pregunta05', 'coe_pregunta06', 'coe_pregunta07', 'coe_pregunta08', 'coe_pregunta09', 'coe_pregunta10', 'coe_pregunta11', 'coe_pregunta12', 'coe_pregunta13', 'coe_pregunta14', 'coe_pregunta15', 'coe_pregunta16', 'coe_pregunta17', 'coe_pregunta18', 'coe_pregunta19', 'coe_pregunta20', 'coe_promedio', 'coe_observacion', 'coe_fecha'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'coe_codigo' => 'int', 'codigo_per' => 'int', 'codigo_pro_evaluador' => 'int', 'codigo_pro_evaluado' => 'int', 'coe_observacion' => 'string', 'coe_fecha' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'coe_fecha'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $coe_codigo){
        if($coe_codigo) return $query->where('coe_codigo', '=', $coe_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeEvaluador($query, $codigo_pro_evaluador){
        if($codigo_pro_evaluador) return $query->where('codigo_pro_evaluador', '=', $codigo_pro_evaluador);
    }

    public function scopeEvaluado($query, $codigo_pro_evaluado){
        if($codigo_pro_evaluado) return $query->where('codigo_pro_evaluado', '=', $codigo_pro_evaluado);
    }

    public function scopePromedio($query, $coe_promedio){
        if($coe_promedio) return $query->where('coe_promedio', '=', $coe_promedio);
    }

    public function scopeObservacion($query, $coe_observacion){
        if($coe_observacion) return $query->where('coe_observacion', 'LIKE', "%$coe_observacion%");
    }

    public function scopeFecha($query, $coe_fecha){
        if($coe_fecha) return $query->where('coe_fecha', '=', $coe_fecha);
    }
    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }

    public function evaluador(){
        return $this->belongsTo('App\Profesor', 'codigo_pro_evaluador');
    }

    public function evaluado(){
        return $this->belongsTo('App\Profesor', 'codigo_pro_evaluado');
    }
}
