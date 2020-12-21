<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_mat
 * @property int        $codigo_per
 * @property string     $ncr_mat
 * @property string     $nombre_mat
 */
class Materia extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'materia';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_mat';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_mat', 'codigo_per', 'ncr_mat', 'nombre_mat'
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
        'codigo_mat' => 'int', 'codigo_per' => 'int', 'ncr_mat' => 'string', 'nombre_mat' => 'string'
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

    public function scopeCode($query, $codigo_mat){
        if($codigo_mat) return $query->where('codigo_mat','=',$codigo_mat);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per','=',$codigo_per);
    }

    public function scopeNrc($query, $nrc){
        if($nrc) return $query->where('ncr_mat','=',"$nrc");

    }

    public function scopeNombre($query, $nombre){
        if($nombre) return $query->where('nombre_mat','LIKE',"%$nombre%");
    }

    // Functions ...

    // Relations ...

    public function periodo()
    {
        return $this->belongsTo('App\Periodo','codigo_per');
    }

}
