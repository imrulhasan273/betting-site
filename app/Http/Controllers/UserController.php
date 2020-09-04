<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function add()
    {
        // $authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
        // dd($authRole[0]);

        $superAdmin = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'super_admin');
            }
        )->get();
        $superAdmin = $superAdmin[0];


        $user = User::where('id', Auth::user()->id)->get();
        $Authrole = $user[0]->role[0]->name ?? null;

        if ($Authrole == 'admin') {
            $roles = Role::where('id', '!=', $superAdmin->id)
                ->where('name', '!=', 'admin')->get();
        } else {
            $roles = Role::where('id', '!=', $superAdmin->id)->get();
        }

        return view('dashboard.users.add', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'user_name' => ['required', 'unique:users'],
            'password' => 'required',
            'passwordConfirm' => 'required'
        ]);

        //Save to db
        if ($request->password == $request->passwordConfirm) {

            $user = User::create([
                'name' =>  $request->input('name'),
                'user_name' => $request->input('user_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'remember_token' => Str::random(60),
            ]);

            $user->role()->attach($request->role_id);
            return Redirect::route('admin.users')->with('message', 'User Added!');
        }

        return Redirect::route('admin.users')->with('error', 'User is not Added!');
    }
    public function PassEdit(User $user)
    {
        $this->authorize('edit', $user);

        return view('dashboard.users.password.edit', compact('user'));
    }

    public function PassUpdate(Request $request)
    {

        $request->validate([
            'password' => 'required',
        ]);

        $updatingUser = User::where('id', $request->id)->first();
        if ($updatingUser) {
            $updatingUser->update([
                'password' => Hash::make($request->password),
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'User Password is not Updated!';
        if ($updatingUser) {
            $msg1 = 'message';
            $msg2 = 'User Password is Updated!';
        }

        return Redirect::route('admin.users')->with($msg1, $msg2);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        # -- - -- - - - - - -- - - -
        $superAdmin = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'super_admin');
            }
        )->get();
        $superAdmin = $superAdmin[0];


        $userx = User::where('id', Auth::user()->id)->get();
        $Authrole = $userx[0]->role[0]->name ?? null;

        if ($Authrole == 'admin') {
            $roles = Role::where('id', '!=', $superAdmin->id)
                ->where('name', '!=', 'admin')->get();
        } else {
            $roles = Role::where('id', '!=', $superAdmin->id)->get();
        }
        # - - - -- - -  -- - - -- - - -- - - - --

        # $roles = Role::all();
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
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'User info is not Updated!';
        if ($updatingUser) {
            $msg1 = 'message';
            $msg2 = 'User info is Updated!';
        }

        return Redirect::route('admin.users')->with($msg1, $msg2);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $ClubID = $user->clubOwner[0]->id ?? null;

        if ($ClubID != null) {
            if ($user->role[0]->name == 'club_admin') {
                $deleteClub = DB::table('clubs')->where('id', $ClubID)->delete();
            }
        }

        $deleteUser = DB::table('users')->where('id', $user->id)->delete();

        if ($deleteUser) {
            return back()->with('message', 'User Deleted!');
        }
    }

    public function SponsorCommission(Request $request)
    {
        $commission = DB::table('sponsor_commission')->first();

        $UpdateCommission = DB::table('sponsor_commission')->where('id', $commission->id)
            ->update([
                'commission' => $request->commission,
            ]);

        if ($UpdateCommission) {
            return back()->with('message', 'Sponsor Commission Updated');
        }
        return back()->with('error', 'Sponsor Commission Updated Unsuccessfull');
    }
}
