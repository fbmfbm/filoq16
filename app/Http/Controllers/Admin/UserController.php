<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Gate;

use App\Role;
use App\User;



class UserController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if($user->cannot("users_add"))
        {
            abort(403);
        }

        $users = User::all();

        return view('admin.users.index')->with('users',$users);
    }

    public function store(Request $request)
    {
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 0,
            'password' => bcrypt($request->password),
        ]);

        $users = User::all();

        return view('admin.users.index')->with('users',$users);
    }



    public function create()
    {

        return view('admin.users.create');
    }


    public function update(Request $request, $id)
    {


        $user = User::find($id)->get();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        // redirect
        Session::flash('message', 'Mise a jour de votre utilisateur réussi !');
        $users = User::all();
        return Redirect::to('/admin/user')->with('users', $rusers);
    }

    public function show($id)
    {
        $user = User::findOrFail($id)->first();

        return view('admin.users.edit')->with('user', $user);
    }

    public function edit($id)
    {

        $user = User::findOrFail($id)->first();
        // TO DO !!!!
        return view('admin.users.edit')->with('user', $user);
    }


    public function destroy($id)
    {
        // TODO !!!!!
        return view('admin.users.index');
    }







}
