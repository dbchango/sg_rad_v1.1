<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_per
 * @property string     $nombre_per
 * @property boolean    $activo_per
 */
class Periodo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'periodo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_per';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_per', 'nombre_per', 'activo_per'
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
        'codigo_per' => 'int', 'nombre_per' => 'string', 'activo_per' => 'boolean'
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

    public function scopeCode($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per', '=', $codigo_per);
    }

    public function scopeNombre($query, $nombre_per){
        if($nombre_per) return $query->where('nombre_per', 'LIKE', "%$nombre_per%");
    }

    public function scopeActivo($query, $activo_per){
        if(isset($activo_per))
        return $query->where('activo_per', '=', $activo_per);
    }

    // Functions ...

    // Relations ...
    public function materias()
    {
        return $this->hasMany('App\Materia', 'codigo_per');
    }
}
