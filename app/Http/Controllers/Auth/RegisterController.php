<?php

namespace App\Http\Controllers\Auth;

use App\Club;
use App\Role;
use App\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::ADMIN;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'unique:users'],
            'sponsor' => ['nullable', 'exists:users,user_name'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return $validate;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $REFuser = User::where('user_name', '=', $data['sponsor'])->first();

        $FLAG = true;

        if ($REFuser === null) {
            $FLAG = false;
        }

        $role = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_name' => $data['user_name'],
            'club_id' => $data['club'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(60),
        ]);

        // Add User id and Role id into the pivot table
        $user->role()->attach($role->id);

        //Add User ID and Ref User ID into the pivot table for SPONSOR
        if ($FLAG) {
            $user->ref()->attach($REFuser->id);
        }

        # Normal User Club Registration
        $count = Club::where('id', $user->club_id)->pluck('member');
        $count = $count[0];
        $updatingClub = Club::where('id', $user->club_id)->first();
        if ($updatingClub) {
            $updatingClub->update([
                'member' => $count + 1,
            ]);
        }
        // -- - - - - -- - -- - - - - ---

        return $user;
    }
}
