<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $res_codigo
 * @property int        $codigo_per
 * @property int        $codigo_dep
 * @property int        $codigo_pro
 */
class ResumenEvaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resumen_evaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'res_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'res_codigo', 'codigo_per', 'codigo_dep', 'codigo_pro', 'res_nota1', 'res_nota2', 'res_nota3', 'res_nota4', 'res_promedio'
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
        'res_codigo' => 'int', 'codigo_per' => 'int', 'codigo_dep' => 'int', 'codigo_pro' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $res_codigo){
        if($res_codigo) return $query->where('res_codigo', '=', $res_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeDepartamento($query, $codigo_dep){
        if($codigo_dep) return $query->where('codigo_dep', '=', $codigo_dep);
    }

    public function scopeProfesor($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro', '=', $codigo_pro);
    }

    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'codigo_dep');
    }

    public function profesor(){
        return $this->belongsTo('App\Profesor', 'codigo_pro');
    }
}
