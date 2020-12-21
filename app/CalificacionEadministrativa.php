<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cea_codigo
 * @property int        $codigo_per
 * @property string     $cea_nombre
 */
class CalificacionEadministrativa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calificacion_eadministrativa';

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
        'cea_codigo', 'codigo_per', 'cea_nombre', 'cea_valor'
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
        'cea_codigo' => 'int', 'codigo_per' => 'int', 'cea_nombre' => 'string'
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

    public function scopeCode($query, $cea_codigo){
        if($cea_codigo) return $query->where('cea_codigo', '=', $cea_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNombre($query, $cea_nombre){
        if($cea_nombre) return $query->where('cea_nombre', 'LIKE', "%$cea_nombre%");
    }

    public function scopeValor($query, $cea_valor){
        if($cea_valor) return $query->where('cea_valor', '=', $cea_valor);
    }

    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
