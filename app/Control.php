<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_con
 * @property int        $codigo_per
 * @property int        $codigo_pro
 * @property int        $codigo_mat
 * @property int        $codigo_dia
 * @property Date       $fecha_con
 * @property string     $temas_con
 * @property string     $observaciones_con
 */
class Control extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'control';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_con';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_con', 'codigo_per', 'codigo_pro', 'codigo_mat', 'codigo_dia', 'fecha_con', 'hora_entrada_con', 'hora_salida_con', 'hora_entrada_real_con', 'hora_salida_real_con', 'numero_horas_con', 'temas_con', 'observaciones_con'
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
        'codigo_con' => 'int', 'codigo_per' => 'int', 'codigo_pro' => 'int', 'codigo_mat' => 'int', 'codigo_dia' => 'int', 'fecha_con' => 'date', 'temas_con' => 'string', 'observaciones_con' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_con'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $codigo_con){
        if($codigo_con) return $query->where('codigo_con', '=', $codigo_con);
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

    public function scopeHoraentrada($query, $hora_entrada_con){
        if($hora_entrada_con) return $query->where('hora_entrada_con', '=', $hora_entrada_con);
    }

    public function scopeHorasalida($query, $hora_salida_con){
        if($hora_salida_con) return $query->where('hora_salida_con', '=', $hora_salida_con);
    }

    public function scopeTemas($query, $temas_con){
        if($temas_con) return $query->where('temas_con', 'LIKE', "%$temas_con%");
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
