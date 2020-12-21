<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $cau_codigo
 * @property int        $codigo_per
 * @property string     $cau_nombre
 */
class CalificacionAutoevaluacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calificacion_autoevaluacion';

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
        'cau_codigo', 'codigo_per', 'cau_nombre', 'cau_valor'
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
        'cau_codigo' => 'int', 'codigo_per' => 'int', 'cau_nombre' => 'string'
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

    public function scopeCode($query, $cau_codigo){
        if($cau_codigo) return $query->where('cau_codigo', '=', $cau_codigo);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNombre($query, $cau_nombre){
        if($cau_nombre) return $query->where('cau_nombre', 'LIKE', "%$cau_nombre%");
    }

    public function scopeValor($query, $cau_valor){
        if($cau_valor) return $query->where('cau_valor', '=', $cau_valor);
    }
    // Functions ...

    // Relations ...

    public function periodo(){
        return $this->belongsTo('App\Periodo', 'codigo_per');
    }
}
