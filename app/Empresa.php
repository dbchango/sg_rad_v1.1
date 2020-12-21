<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_emp
 * @property string     $nombre_emp
 * @property int        $limite_acceso_emp
 * @property string     $emp_firma_encargado
 * @property string     $emp_pie_encargado
 * @property string     $emp_firma_subdirector
 * @property string     $emp_pie_subdirector
 */
class Empresa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresa';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_emp';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_emp', 'nombre_emp', 'limite_acceso_emp', 'emp_firma_encargado', 'emp_pie_encargado', 'emp_firma_subdirector', 'emp_pie_subdirector'
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
        'codigo_emp' => 'int', 'nombre_emp' => 'string', 'limite_acceso_emp' => 'int', 'emp_firma_encargado' => 'string', 'emp_pie_encargado' => 'string', 'emp_firma_subdirector' => 'string', 'emp_pie_subdirector' => 'string'
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

    public function scopeCode($query, $codigo_emp){
        if($codigo_emp) return $query->where('codigo_emp', '=', $codigo_emp);
    }

    public function scopeNombre($query, $nombre_emp){
        if($nombre_emp) return $query->where('nombre_emp', 'LIKE', "%$nombre_emp%");
    }

    // Functions ...

    // Relations ...
}
