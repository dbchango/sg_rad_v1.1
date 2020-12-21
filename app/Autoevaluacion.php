<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cau_codigo
 * @property int        $codigo_per
 * @property int        $codigo_pro
 * @property string     $cau_observacion
 * @property DateTime   $cau_fecha
 */
class Autoevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autoevaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cau_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cau_codigo', 'codigo_per', 'codigo_pro', 'cau_pregunta01', 'cau_pregunta02', 'cau_pregunta03', 'cau_pregunta04', 'cau_pregunta05', 'cau_pregunta06', 'cau_pregunta07', 'cau_pregunta08', 'cau_pregunta09', 'cau_pregunta10', 'cau_pregunta11', 'cau_pregunta12', 'cau_pregunta13', 'cau_pregunta14', 'cau_pregunta15', 'cau_pregunta16', 'cau_pregunta17', 'cau_pregunta18', 'cau_pregunta19', 'cau_pregunta20', 'cau_promedio', 'cau_observacion', 'cau_fecha'
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
        'cau_codigo' => 'int', 'codigo_per' => 'int', 'codigo_pro' => 'int', 'cau_observacion' => 'string', 'cau_fecha' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'cau_fecha'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $cau_codigo){
        if($cau_codigo) return $query->where('cau_codigo', '=', $cau_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeProfesor($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro', '=', $codigo_pro);
    }

    public function scopePromedio($query, $cau_promedio){
        if($cau_promedio) return $query->where('cau_promedio', '=', $cau_promedio);
    }

    public function scopeObservacion($query, $cau_observacion){
        if($cau_observacion) return $query->where('cau_observacion', 'LIKE'. "%$cau_observacion%");
    }

    public function scopeFecha($query, $cau_fecha){
        if($cau_fecha) return $query->where('cau_fecha', 'LIKE'. "%$cau_fecha%");
    }

    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }

    public function profesor(){
        return $this->belongsTo('App\Profesor', 'codigo_pro');
    }
}
