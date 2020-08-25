<?php

namespace App\Http\Controllers;

use App\Club;
use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function add()
    {
        return view('dashboard.clubs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'password' => 'required',
            'passwordConfirm' => 'required'
        ]);

        if ($request->password == $request->passwordConfirm) {

            $NewClub = Club::create([
                'name' => $request->club_name,
                'balance' => 0,
                'member' => null,
                'commission' => $request->club_commission
            ]);

            #Club Admin
            $club = Club::where('id', $NewClub->id)->first();   //added
            $role = Role::where('name', 'club_admin')->first();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ]);
            $user->role()->attach($role->id);
            $user->clubOwner()->attach($club->id);    //added

            return Redirect::route('admin.clubs')->with('message', 'Club-User Added!');
        }

        return Redirect::route('admin.clubs')->with('error', 'Club-User Not Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club, User $user)
    {
        $deleteClub = DB::table('clubs')->where('id', $club->id)->delete();
        $deleteUser = DB::table('users')->where('id', $user->id)->delete();
        if ($deleteClub && $deleteUser) {
            return back()->with('message', 'Club and User Deleted!');
        }

        return back()->with('error', 'Club and User are not Deleted!');
    }
}
