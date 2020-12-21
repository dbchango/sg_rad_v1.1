<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
    *
    * @var array
    */
    protected $appends = ['all_permissions','can'];


    /**
     * Get all user permissions.
     *
     * @return bool
     */
    public function getAllPermissionsAttribute()
    {
        return $this->getAllPermissions();
    }


    /**
     * Get all user permissions in a flat array.
     *
     * @return array
     */
    public function getCanAttribute() {
        $permissions = [];
          foreach (Permission::all() as $permission) {
            if (Auth::user()) {
              $permissions[] = $permission->name;
            }
          }
          return $permissions;
    }

    public function scopeCode($query, $id){
        if($id) return $query->where('id', '=', $id);
    }

    public function scopeName($query, $name){
        if($name) return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeEmail($query, $email){
        if($email) return $query->where('email', 'LIKE', "%$email%");
    }


}
