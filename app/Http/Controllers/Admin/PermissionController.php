<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Gate;

use App\Permission;



class PermissionController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if($user->cannot("display_perm"))
        {
            return view('no_access');
        }

        $permissions = Permission::all()->sortBy('display_name');

        return view('admin.permissions.index')->with('permissions',$permissions);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|alpha|max:255',
            'display_name' => 'required'
        ]);


        $permission = new Permission();
        $permission->name =  $request->name;
        $permission->display_name =  $request->display_name;
        $permission->description = $request->description;

        $permission->save();

        $permissions = Permission::all();

        return view('admin.permissions.index')->with('permissions',$permissions);
    }



    public function create()
    {

        return view('admin.permissions.create');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|alpha|max:255',
            'display_name' => 'required',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        $permission->save();

        // redirect
        session()->flash('status', 'Votre enregistrement à bien été actualisé !');
        $permissions = Permission::all();
        return \Redirect::to('/admin/permission')->with('permissions', $permissions);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit')->with('permission', $permission);
    }

    public function edit($id)
    {

        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit')->with('permission', $permission);
    }


    public function destroy($id)
    {

        $permission = Permission::findOrFail($id);
        $permission->delete();

        session()->flash('status', 'Votre enregistrement à bien été supprimé !');

        return back();
    }







}
