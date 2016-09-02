<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    
    protected $fillable = [
        'name', 'display_name', 'description',
    ];
    
   

   public function users()
    {
        return $this->hasMany('App\Users');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function givePermissionTo($permission)
    {

    	if(is_string($permission))
    	{
    		$permission = Permission::where('name', '=', $permission)->first();
    	}

    	return $this->permissions()->save($permission);

    }

    public function removePermissionTo($permission)
    {

    	if(is_string($permission))
    	{
    		$permission = Permission::where('name', '=', $permission)->first();
    	}

    	return $this->permissions()->detach($permission->id);

    }

    /**
     * Check if User have permission To
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission)
    {

    	$perms = $this->permissions;

    	foreach ($perms as $perm) {

    		if($perm->name == $permission)
    		{
    			return True;
    		}	
    	}

    	return False;

    }



}
