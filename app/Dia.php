<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_dia
 * @property string     $nombre_dia
 */
class Dia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dia';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_dia';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_dia', 'nombre_dia'
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
        'codigo_dia' => 'int', 'nombre_dia' => 'string'
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

    public function scopeCode($query, $codigo_dia){
        if($codigo_dia) return $query->where('codigo_dia','=', $codigo_dia);
    }

    public function scopeNombre($query, $nombre_dia){
        if($nombre_dia) return $query->where('nombre_dia','=', $nombre_dia);
    }
    // Functions ...

    // Relations ...
}
