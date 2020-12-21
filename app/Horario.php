<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_hor
 * @property int        $codigo_per
 * @property int        $codigo_pro
 * @property int        $codigo_mat
 * @property int        $codigo_rec
 * @property int        $codigo_dia
 */
class Horario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'horario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_hor';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_hor', 'codigo_per', 'codigo_pro', 'codigo_mat', 'codigo_rec', 'codigo_dia', 'hora_entrada_hor', 'hora_salida_hor', 'numero_horas_hor'
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
        'codigo_hor' => 'int', 'codigo_per' => 'int', 'codigo_pro' => 'int', 'codigo_mat' => 'int', 'codigo_rec' => 'int', 'codigo_dia' => 'int'
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

    public function scopeCode($query, $codigo_hor){
        if($codigo_hor) return $query->where('codigo_hor','=',$codigo_hor);
    }

    public function scopePeriodo($query, $codigo_per){
        if($codigo_per) return $query->where('codigo_per','=',$codigo_per);
    }

    public function scopeProfesor($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro','=',$codigo_pro);
    }

    public function scopeMateria($query, $codigo_mat){
        if($codigo_mat) return $query->where('codigo_mat','=',$codigo_mat);
    }

    public function scopeRecuperacion($query, $codigo_rec){
        if($codigo_rec) return $query->where('codigo_rec','=',$codigo_rec);
    }

    public function scopeDia($query, $codigo_dia){
        if($codigo_dia) return $query->where('codigo_dia','=',$codigo_dia);
    }

    public function scopeHora_entrada_hor($query, $hora_entrada_hor){
        if($hora_entrada_hor) return $query->where('hora_entrada_hor','=',$hora_entrada_hor);
    }

    public function scopeHora_salida_hor($query, $hora_salida_hor){
        if($hora_salida_hor) return $query->where('hora_salida_hor','=',$hora_salida_hor);
    }

    public function scopeNumero_horas_hor($query, $numero_horas_hor){
        if($numero_horas_hor) return $query->where('numero_horas_hor','=',$numero_horas_hor);
    }

    // Functions ...

    // Relations ...

    public function periodo()
    {
        return $this->belongsTo('App\Periodo','codigo_per');
    }

    public function profesor()
    {
        return $this->belongsTo('App\Profesor','codigo_pro');
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia','codigo_mat');
    }

    public function recuperacion()
    {
        return $this->belongsTo('App\Recuperacion','codigo_rec');
    }

    public function dia()
    {
        return $this->belongsTo('App\Dia','codigo_dia');
    }
}
