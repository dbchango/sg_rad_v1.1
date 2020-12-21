<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_rec
 * @property int        $codigo_per
 * @property int        $codigo_pro
 * @property int        $codigo_mat
 * @property int        $codigo_dia
 * @property Date       $fecha_rec
 * @property Date       $fecha_clase_rec
 * @property string     $observaciones_rec
 */
class Recuperacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recuperacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_rec';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_rec', 'codigo_per', 'codigo_pro', 'codigo_mat', 'codigo_dia', 'fecha_rec', 'hora_entrada_rec', 'hora_salida_rec', 'fecha_clase_rec', 'hora_inicio_clase_rec', 'hora_fin_clase_rec', 'observaciones_rec'
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
        'codigo_rec' => 'int', 'codigo_per' => 'int', 'codigo_pro' => 'int', 'codigo_mat' => 'int', 'codigo_dia' => 'int', 'fecha_rec' => 'date', 'fecha_clase_rec' => 'date', 'observaciones_rec' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_rec', 'fecha_clase_rec'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $codigo_rec){
        if($codigo_rec) return $query->where('codigo_rec', '=', $codigo_rec);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeProfesor($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro', '=', $codigo_pro);
    }

    public function scopeMateria($query, $codigo_mat){
        if($codigo_mat) return $query->where('codigo_mat', '=', $codigo_mat);
    }

    public function scopeDia($query, $codigo_dia){
        if($codigo_dia) return $query->where('codigo_dia', '=', $codigo_dia);
    }

    public function scopeFecharec($query, $fecha_rec){
        if($fecha_rec) return $query->where('fecha_rec', '=', $fecha_rec);
    }

    public function scopeHoraent($query, $hora_entrada_rec){
        if($hora_entrada_rec) return $query->where('hora_entrada_rec', '=', $hora_entrada_rec);
    }

    public function scopeHorasal($query, $hora_salida_rec){
        if($hora_salida_rec) return $query->where('hora_salida_rec', '=', $hora_salida_rec);
    }

    public function scopeFechaclase($query, $fecha_clase_rec){
        if($fecha_clase_rec) return $query->where('fecha_clase_rec', '=', $fecha_clase_rec);
    }

    public function scopeHoraini($query, $hora_inicio_clase_rec){
        if($hora_inicio_clase_rec) return $query->where('hora_inicio_clase_rec', '=', $hora_inicio_clase_rec);
    }

    public function scopeHorafin($query, $hora_fin_clase_rec){
        if($hora_fin_clase_rec) return $query->where('hora_fin_clase_rec', '=', $hora_fin_clase_rec);
    }

    public function scopeObservacion($query, $observaciones_rec){
        if($observaciones_rec) return $query->where('observaciones_rec', 'LIKE', "%$observaciones_rec%");
    }
    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }

    public function profesor(){
        return $this->belongsTo('App\Profesor', 'codigo_pro');
    }

    public function materia(){
        return $this->belongsTo('App\Materia', 'codigo_mat');
    }

    public function dia(){
        return $this->belongsTo('App\Dia', 'codigo_dia');
    }
}
