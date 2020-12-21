<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $pea_codigo
 * @property int        $codigo_per
 * @property int        $pea_numero
 * @property string     $pea_nombre
 */
class PreguntaEadministrativa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pregunta_eadministrativa';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pea_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pea_codigo', 'codigo_per', 'pea_numero', 'pea_nombre'
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
        'pea_codigo' => 'int', 'codigo_per' => 'int', 'pea_numero' => 'int', 'pea_nombre' => 'string'
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

    public function scopeCode($query, $pea_codigo){
        if($pea_codigo) return $query->where('pea_codigo', '=', $pea_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNumero($query, $pea_numero){
        if($pea_numero) return $query->where('pea_numero', '=', $pea_numero);
    }

    public function scopeNombre($query, $pea_nombre){
        if($pea_nombre) return $query->where('pea_nombre', 'LIKE', "%$pea_nombre%");
    }

    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
