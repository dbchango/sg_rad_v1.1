<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $pau_codigo
 * @property int        $codigo_per
 * @property int        $pau_numero
 * @property string     $pau_nombre
 */
class PreguntaAutoevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pregunta_autoevaluacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pau_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pau_codigo', 'codigo_per', 'pau_numero', 'pau_nombre'
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
        'pau_codigo' => 'int', 'codigo_per' => 'int', 'pau_numero' => 'int', 'pau_nombre' => 'string'
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

    public function scopeCode($query, $pau_codigo){
        if($pau_codigo) return $query->where('pau_codigo', '=', $pau_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNumero($query, $pau_numero){
        if($pau_numero) return $query->where('pau_numero', '=', $pau_numero);
    }

    public function scopeNombre($query, $pau_nombre){
        if($pau_nombre) return $query->where('pau_nombre', 'LIKE', "%$pau_nombre%");
    }

    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
