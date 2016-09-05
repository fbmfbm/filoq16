<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Gate;

use App\Role;



class RoleController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if($user->cannot("display_role"))
        {
            return view('no_access');
        }

        $permissions = Permission::all()->sortBy('display_name');
        $roles = \App\Role::with('Permissions')->get();

        return view('admin.roles.index', ['roles'=>$roles, 'permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|alpha|max:255',
            'display_name' => 'required'
        ]);


        $role = new Role();
        $role->name =  $request->name;
        $role->display_name =  $request->display_name;
        $role->description = $request->description;

        $role->save();

        $roles = Role::all();

        return view('admin.roles.index')->with('roles',$roles);
    }



    public function create()
    {

        return view('admin.roles.create');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|alpha|max:255',
            'display_name' => 'required',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;

        $role->save();

        // redirect
        session()->flash('status', 'Votre enregistrement à bien été actualisé !');
        $roles = Role::all();
        return \Redirect::to('/admin/role')->with('roles', $roles);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit')->with('role', $role);
    }

    public function edit($id)
    {

        $role = Role::findOrFail($id);

        return view('admin.roles.edit')->with('role', $role);
    }


    public function destroy($id)
    {

        $role = Role::findOrFail($id);
        $role->delete();

        session()->flash('status', 'Votre enregistrement à bien été supprimé !');

        return back();
    }


    public function togglePermission($id, $permId)
    {
        $perm = Permission::findOrFail($permId);
        $role = Role::findOrFail($id);
        if($role->hasPermissionTo($perm->name))
        {
            $role->removePermissionTo($perm->name);
        }else{

            $role->givePermissionTo($perm->name);
        }

        return back();

    }






}
