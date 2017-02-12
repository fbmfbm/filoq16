<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserAdded;
use App\Events\UserDeleted;
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
        if ($user->cannot("display_user")) {

            return view('no_access');
        }

        $users = User::with('role')->orderBy('name', 'asc')->get();

        return view('admin.users.index')->with('users', $users);
    }


    public function store(Request $request)
    {
        array_map('trim', $request->all());

        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $basic_user_role = Role::where('name','user')->first();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $basic_user_role->id,
            'password' => bcrypt($request->password),
        ]);

        event(new UserAdded($request->name));


        return redirect()->route('admin.user.index');
    }


    public function create()
    {

        return view('admin.users.create');
    }


    public function update(Request $request, $id)
    {
        array_map('trim', $request->all());

        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != "") {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->save();

        // redirect
        session()->flash('status', 'Votre enregistrement à bien été actualisé !');

        return \Redirect::to('/admin/user/' . $user->id)->with('users', $user);
    }

    public function show($id)
    {
        $roles = Role::all()->sortBy('display_name');
        $user = User::findOrFail($id);

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function edit($id)
    {
        $roles = Role::all()->sortBy('display_name');
        $user = User::findOrFail($id);

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        event(new UserDeleted($user));
        session()->flash('status', 'Votre enregistrement à bien été supprimé !');
        return back();
    }

    public function activeUser($id)
    {

        $user = User::findOrFail($id);
        ($user->is_active) ? $user->is_active = false : $user_active = true;

        $user->save();

        return back();

    }


}
