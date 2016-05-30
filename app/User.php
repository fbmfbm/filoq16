<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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


    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    


    public function hasRole($role)
    {

        if(is_string($role))
        {

            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->role)->count();
    }


    public function hasPermissionTo($permission)
    {

        if(is_string($permission))
        {
            $permission = Permission::where('name','=', $permission)->first();
        }

        $roles = $this->role;

        foreach ($roles as $role ) {


            if($role->hasPermissionTo($permission->name))
            {
                return true;
            }
        }
        return false;
    }
}
