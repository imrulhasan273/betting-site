<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function add()
    {
        $roles = Role::all();

        return view('dashboard.users.add', compact('roles'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'password' => 'required',
            'passwordConfirm' => 'required'
        ]);


        //Save to db
        if ($request->password == $request->passwordConfirm) {

            $user = User::create([
                'name' =>  $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'remember_token' => Str::random(60),
            ]);

            $user->role()->attach($request->role_id);
            return Redirect::route('admin.users')->with('message', 'User Added!');
        }

        return Redirect::route('admin.users')->with('error', 'User is not Added!');
    }
    public function edit(User $user)
    {
        $roles = Role::all();

        $thisRole = $user->role[0];

        return view('dashboard.users.edit', compact('user', 'roles', 'thisRole'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
        ]);

        $updatingUser = User::where('id', $request->id)->first();
        if ($updatingUser) {
            $updatingUser->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->thisRole != $request->role_id) {

                $det = $updatingUser->role()->detach($request->thisRole);
                if ($det) {
                    $updatingUser->role()->attach($request->role_id);
                }
            }
            return Redirect::route('admin.users')->with('message', 'User info Updated!');
        }

        return Redirect::route('admin.users')->with('error', 'User info is not Updated!');
    }

    public function destroy(User $user)
    {
        $ClubID = $user->clubOwner[0]->id;

        if ($user->role[0]->name == 'club_admin') {
            $deleteClub = DB::table('clubs')->where('id', $ClubID)->delete();
        }

        $deleteUser = DB::table('users')->where('id', $user->id)->delete();

        if ($deleteUser) {
            return back()->with('message', 'User Deleted!');
        }
    }
}
