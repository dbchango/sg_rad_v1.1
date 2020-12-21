<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cco_codigo
 * @property int        $codigo_per
 * @property string     $cco_nombre
 */
class CalificacionCoevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calificacion_coevaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cco_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cco_codigo', 'codigo_per', 'cco_nombre', 'cco_valor'
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
        'cco_codigo' => 'int', 'codigo_per' => 'int', 'cco_nombre' => 'string'
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

    public function scopeCode($query, $cco_codigo){
        if($cco_codigo) return $query->where('cco_codigo', '=', $cco_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNombre($query, $cco_nombre){
        if($cco_nombre) return $query->where('cco_nombre', 'LIKE', "%$cco_nombre%");
    }

    public function scopeValor($query, $cco_valor){
        if($cco_valor) return $query->where('cco_valor', '=', $cco_valor);
    }
    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
