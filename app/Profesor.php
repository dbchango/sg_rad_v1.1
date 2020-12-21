<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $codigo_pro
 * @property string     $miespe_pro
 * @property string     $nombre_pro
 * @property string     $apellido_pro
 * @property string     $email_pro
 * @property int        $codigo_dep
 * @property int        $cod_area
 * @property int        $estado_pro
 * @property int        $director_pro
 * @property int        $jarea_pro
 * @property int        $ded_codigo
 */
class Profesor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profesor';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_pro';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_pro', 'cedula_pro', 'miespe_pro', 'huella_pro', 'nombre_pro', 'apellido_pro', 'email_pro', 'codigo_dep', 'cod_area', 'estado_pro', 'director_pro', 'jarea_pro', 'ded_codigo'
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
        'codigo_pro' => 'int', 'miespe_pro' => 'string', 'nombre_pro' => 'string', 'apellido_pro' => 'string', 'email_pro' => 'string', 'codigo_dep' => 'int', 'cod_area' => 'int', 'estado_pro' => 'int', 'director_pro' => 'int', 'jarea_pro' => 'int', 'ded_codigo' => 'int'
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
    public function scopeCode($query, $codigo_pro){
        if($codigo_pro) return $query->where('codigo_pro','=', $codigo_pro);
    }

    public function scopeCedula($query, $cedula_pro){
        if($cedula_pro) return $query->where('cedula_pro','LIKE', "%$cedula_pro%");
    }

    public function scopeMiespe($query, $miespe_pro){
        if($miespe_pro) return $query->where('miespe_pro','LIKE', "%$miespe_pro%");
    }

    public function scopeNombre($query, $nombre_pro){
        if($nombre_pro) return $query->where('nombre_pro','LIKE', "%$nombre_pro%");
    }

    public function scopeApellido($query, $apellido_pro){
        if($apellido_pro) return $query->where('apellido_pro','LIKE', "%$apellido_pro%");
    }

    public function scopeEmail($query, $email_pro){
        if($email_pro) return $query->where('email_pro','LIKE', "%$email_pro%");
    }

    public function scopeDepartamento($query, $codigo_dep){
        if($codigo_dep) return $query->where('codigo_dep','=', $codigo_dep);
    }

    public function scopeArea($query, $cod_area){
        if($cod_area) return $query->where('cod_area','=', $cod_area);
    }

    public function scopeEstado($query, $estado_pro){
        if($estado_pro) return $query->where('estado_pro','==', $estado_pro);
    }

    public function scopeDirector($query, $director_pro){
        if($director_pro) return $query->where('director_pro','=', $director_pro);
    }

    public function scopeJarea($query, $jarea_pro){
        if($jarea_pro) return $query->where('jarea_pro','=', $jarea_pro);
    }

    public function scopeDedicacion($query, $ded_codigo){
        if($ded_codigo) return $query->where('ded_codigo','=', $ded_codigo);
    }
    // Functions ...

    // Relations ...

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'codigo_dep');
    }

    public function area(){
        return $this->belongsTo('App\Area', 'cod_area');
    }

    public function dedicacion(){
        return $this->belongsTo('App\Dedicacion', 'ded_codigo');
    }

    public function registros(){
        return $this->hasMany('App\Registroactividad', 'codigo_pro');
    }

}
