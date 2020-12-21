<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $pco_codigo
 * @property int        $codigo_per
 * @property int        $pco_numero
 * @property string     $pco_nombre
 */
class PreguntaCoevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pregunta_coevaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pco_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pco_codigo', 'codigo_per', 'pco_numero', 'pco_nombre'
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
        'pco_codigo' => 'int', 'codigo_per' => 'int', 'pco_numero' => 'int', 'pco_nombre' => 'string'
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

    public function scopeCode($query, $pco_codigo){
        if($pco_codigo) return $query->where('pco_codigo', '=', $pco_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNumero($query, $pco_numero){
        if($pco_numero) return $query->where('pco_numero', '=', $pco_numero);
    }

    public function scopeNombre($query, $pco_nombre){
        if($pco_nombre) return $query->where('pco_nombre', 'LIKE', "%$pco_nombre%");
    }
    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
