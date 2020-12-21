<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_dep
 * @property string     $nombre_dep
 */
class Departamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departamento';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_dep';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_dep', 'nombre_dep'
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
        'codigo_dep' => 'int', 'nombre_dep' => 'string'
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

    public function scopeCode($query, $codigo_dep){
        if($codigo_dep) return $query->where('codigo_dep','=',$codigo_dep);
    }

    public function scopeNombre($query, $nombre_dep){
        if($nombre_dep) return $query->where('nombre_dep','=',"$nombre_dep");
    }

    // Functions ...

    // Relations ...
}
