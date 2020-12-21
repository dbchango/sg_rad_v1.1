<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $iduser
 * @property string     $username
 * @property string     $email
 * @property string     $password
 * @property string     $authkey
 * @property int        $state
 * @property int        $totalsessioncounter
 * @property int        $currentsessioncounter
 */
class CrugeUser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cruge_user';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser', 'regdate', 'actdate', 'logondate', 'username', 'email', 'password', 'authkey', 'state', 'totalsessioncounter', 'currentsessioncounter'
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
        'iduser' => 'int', 'username' => 'string', 'email' => 'string', 'password' => 'string', 'authkey' => 'string', 'state' => 'int', 'totalsessioncounter' => 'int', 'currentsessioncounter' => 'int'
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

    public function scopeCode($query, $iduser){
        if(isset($iduser)) return $query->where('iduser', '=', $iduser);
    }
    public function scopeUsername($query, $username){
        if(isset($username)) return $query->where('username', 'LIKE', "%$username%");
    }
    public function scopeMail($query, $email){
        if(isset($email)) return $query->where('email', 'LIKE', "%$email%");
    }
    public function scopeState($query, $state){
        if(isset($state)) return $query->where('state', '=', $state);
    }
    public function scopeLastaccess($query, $logondate){
        if(isset($logondate)) return $query->where('logondate', '=', $logondate);
    }
    // Functions ...

    // Relations ...
}
