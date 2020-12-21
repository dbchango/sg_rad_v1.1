<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $ded_codigo
 * @property string     $ded_nombre
 */
class Dedicacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dedicacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ded_codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ded_codigo', 'ded_nombre'
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
        'ded_codigo' => 'int', 'ded_nombre' => 'string'
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

    public function scopeCode($query, $ded_codigo){
        if($ded_codigo) return $query->where('ded_codigo', '=', $ded_codigo);
    }

    public function scopeNombre($query, $ded_nombre){
        if($ded_nombre) return $query->where('ded_nombre', 'LIKE', "%$ded_nombre%");
    }

    // Functions ...

    // Relations ...

}
