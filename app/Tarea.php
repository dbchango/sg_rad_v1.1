<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_tar
 * @property int        $codigo_act
 * @property string     $nombre_tar
 */
class Tarea extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tarea';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_tar';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_tar', 'codigo_act', 'nombre_tar'
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
        'codigo_tar' => 'int', 'codigo_act' => 'int', 'nombre_tar' => 'string'
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

    public function scopeCode($query, $codigo_tar){
        if($codigo_tar) return $query->where('codigo_tar', '=', $codigo_tar);
    }

    public function scopeActividad($query, $codigo_act){
        if($codigo_act) return $query->where('codigo_act', '=', $codigo_act);
    }

    public function scopeNombre($query, $nombre_tar){
        if($nombre_tar) return $query->where('nombre_tar', 'LIKE', "%$nombre_tar%");
    }


    // Functions ...

    // Relations ...

    public function actividad(){
        return $this->belongsTo('App\Actividad', 'codigo_act');
    }


}
