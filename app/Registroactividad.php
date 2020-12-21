<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_rac
 * @property int        $codigo_pro
 * @property int        $codigo_dep
 * @property int        $codigo_area
 * @property Date       $fecha_rac
 * @property int        $codigo_tact
 * @property int        $codigo_act
 * @property int        $codigo_tar
 * @property string     $comentario_rac
 */
class RegistroActividad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'registro_actividad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_rac';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_rac', 'codigo_pro', 'codigo_dep', 'codigo_area', 'fecha_rac', 'codigo_tact', 'codigo_act', 'codigo_tar', 'comentario_rac', 'hinicio_rac', 'hfin_rac', 'horas_rac'
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
        'codigo_rac' => 'int', 'codigo_pro' => 'int', 'codigo_dep' => 'int', 'codigo_area' => 'int', 'fecha_rac' => 'date', 'codigo_tact' => 'int', 'codigo_act' => 'int', 'codigo_tar' => 'int', 'comentario_rac' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_rac'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    public function scopeCode($query, $codigo_rac){
        if($codigo_rac) return $query->where('codigo_rac', '=', $codigo_rac);
    }

    public function scopeProfesor($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro', '=', $codigo_pro);
    }

    public function scopeDepartamento($query, $codigo_dep){
        if($codigo_dep) return $query->where('codigo_dep', '=', $codigo_dep);
    }

    public function scopeArea($query, $codigo_area){
        if($codigo_area) return $query->where('codigo_area', '=', $codigo_area);
    }

    public function scopeFecharac($query, $fecha_rac){
        if($fecha_rac) return $query->where('fecha_rac', '=', $fecha_rac);
    }

    public function scopeTipoactividad($query, $codigo_tact){
        if($codigo_tact) return $query->where('codigo_tact', '=', $codigo_tact);
    }

    public function scopeActividad($query, $codigo_act){
        if($codigo_act) return $query->where('codigo_act', '=', $codigo_act);
    }

    public function scopeTarea($query, $codigo_tar){
        if($codigo_tar) return $query->where('codigo_tar', '=', $codigo_tar);
    }

    public function scopeComentario($query, $comentario_rac){
        if($comentario_rac) return $query->where('comentario_rac', 'LIKE', "%$comentario_rac%");
    }

    public function scopeHinicio($query, $hinicio_rac){
        if($hinicio_rac) return $query->where('hinicio_rac', '=', $hinicio_rac);
    }

    public function scopeHfin($query, $hfin_rac){
        if($hfin_rac) return $query->where('hfin_rac', '=', $hfin_rac);
    }

    public function scopeHoras($query, $horas_rac){
        if($horas_rac) return $query->where('horas_rac', '=', $horas_rac);
    }

    public function scopeRango($query, $fecha_inicio,$fecha_fin){
        if($fecha_inicio && $fecha_fin) return $query->whereBetween('fecha_rac', [$fecha_inicio,$fecha_fin]);
    }

    public function scopeRangoProf($query, $fecha_inicio,$fecha_fin){
        if($fecha_inicio && $fecha_fin) return $query->whereBetween('fecha_rac', [$fecha_inicio,$fecha_fin]);
    }

    // Functions ...

    // Relations ...

    public function profesor(){
        return $this->belongsTo('App\Profesor', 'codigo_pro');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'codigo_dep');
    }

    public function area(){
        return $this->belongsTo('App\Area', 'codigo_area');
    }

    public function tipo(){
        return $this->belongsTo('App\TipoActividad', 'codigo_tact');
    }

    public function actividad(){
        return $this->belongsTo('App\Actividad', 'codigo_act');
    }

    public function tarea(){
        return $this->belongsTo('App\Tarea', 'codigo_tar');
    }
}
