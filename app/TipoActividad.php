<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_tact
 * @property string     $nombre_tact
 */
class TipoActividad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_actividad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_tact';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_tact', 'nombre_tact'
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
        'codigo_tact' => 'int', 'nombre_tact' => 'string'
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

    public function scopeCode($query, $codigo_tact){
        if($codigo_tact) return $query->where('codigo_tact', '=', $codigo_tact);
    }

    public function scopeNombre($query, $nombre_tact){
        if($nombre_tact) return $query->where('nombre_tact', '=', $nombre_tact);
    }

    // Functions ...

    // Relations ...
}
