<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cea_codigo
 * @property int        $codigo_per
 * @property int        $codigo_pro_evaluador
 * @property int        $codigo_pro_evaluado
 * @property string     $cea_observacion
 * @property DateTime   $cea_fecha
 */
class Eadministrativa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'eadministrativa';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cea_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cea_codigo', 'codigo_per', 'codigo_pro_evaluador', 'codigo_pro_evaluado', 'cea_pregunta01', 'cea_pregunta02', 'cea_pregunta03', 'cea_pregunta04', 'cea_pregunta05', 'cea_pregunta06', 'cea_pregunta07', 'cea_pregunta08', 'cea_pregunta09', 'cea_pregunta10', 'cea_pregunta11', 'cea_pregunta12', 'cea_pregunta13', 'cea_pregunta14', 'cea_pregunta15', 'cea_pregunta16', 'cea_pregunta17', 'cea_pregunta18', 'cea_pregunta19', 'cea_pregunta20', 'cea_promedio', 'cea_observacion', 'cea_fecha'
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
        'cea_codigo' => 'int', 'codigo_per' => 'int', 'codigo_pro_evaluador' => 'int', 'codigo_pro_evaluado' => 'int', 'cea_observacion' => 'string', 'cea_fecha' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'cea_fecha'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $cea_codigo){
        if($cea_codigo) return $query->where('cea_codigo', '=', $cea_codigo);
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

    public function scopeFecha($query, $cea_fecha){
        if($cea_fecha) return $query->where('cea_fecha', '=', $cea_fecha);
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
