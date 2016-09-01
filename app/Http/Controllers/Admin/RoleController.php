<?php

namespace App\Http\Controllers\Admin;

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
            abort(403);
        }

        $roles = Role::all();

        return view('admin.roles.index')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name =  $request->name;
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


        $role = Role::find($id)->get();
        $role->name = $request->name;
        $role->description = $request->description;

        $role->save();

        // redirect
        Session::flash('message', 'Mise a jour de votre role réussi !');
        $roles = Role::all();
        return Redirect::to('/admin/role')->with('roles', $roles);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id)->first();

        return view('admin.roles.edit')->with('role', $role);
    }

    public function edit($id)
    {

        $role = Role::findOrFail($id)->first();

        return view('admin.roles.edit')->with('role', $role);
    }


    public function destroy($id)
    {

        return view('admin.roles.index');
    }







}
