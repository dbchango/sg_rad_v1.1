<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_act
 * @property int        $codigo_tact
 * @property string     $nombre_act
 */
class Actividad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actividad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_act';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_act', 'codigo_tact', 'nombre_act'
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
        'codigo_act' => 'int', 'codigo_tact' => 'int', 'nombre_act' => 'string'
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

    public function scopeCode($query, $codigo_act){
        if($codigo_act) return $query->where('codigo_act', '=', $codigo_act);
    }

    public function scopeNombre($query, $nombre_act){
        if($nombre_act) return $query->where('nombre_act', '=', $nombre_act);
    }

    public function scopeTipoactividad($query, $codigo_tact){
        if($codigo_tact) return $query->where('codigo_tact', '=', $codigo_tact);
    }

    // Functions ...

    // Relations ...

    public function tipo(){
        return $this->belongsTo('App\Tipoactividad', 'codigo_tact');
    }
}
