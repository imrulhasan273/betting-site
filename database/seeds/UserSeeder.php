<?php

use App\Club;
use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Super Admin Seeder
        $role = Role::where('name', 'super_admin')->first();
        $user = User::create([
            'name' => 'Md. Super Admin',
            'user_name' => 'SuperAdmin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('0000000000super'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Admin Seeder
        $role = Role::where('name', 'admin')->first();
        $user = User::create([
            'name' => 'Mr. Admin',
            'user_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0000000000admin'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Club Admin Seeder
        $club = Club::where('id', 1)->first();  //added
        $role = Role::where('name', 'club_admin')->first();
        $user = User::create([
            'name' => 'Mr. Club Owner 1',
            'user_name' => 'club1',
            'email' => 'club1@gmail.com',
            'password' => Hash::make('0000000000club1'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);
        $user->clubOwner()->attach($club->id); //added

        #Club Admin Seeder
        $club = Club::where('id', 2)->first();   //added
        $role = Role::where('name', 'club_admin')->first();
        $user = User::create([
            'name' => 'Mr. Club Owner 2',
            'user_name' => 'club2',
            'email' => 'club2@gmail.com',
            'password' => Hash::make('0000000000club2'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);
        $user->clubOwner()->attach($club->id);    //added


        ## Added a club id to the users
        #Normal User Seeder
        $role = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => 'Mr. Normal User',
            'user_name' => 'user',
            'club_id' => 1,
            'email' => 'user@gmail.com',
            'password' => Hash::make('0000000000user'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        # Normal User Club Registration
        $count = Club::where('id', 1)->pluck('member');
        $count = $count[0];
        $updatingClub = Club::where('id', 1)->first();
        if ($updatingClub) {
            $updatingClub->update([
                'member' => $count + 1,
            ]);
        }
        // -- - - - - -- - -- - - - - ---
        # Normal User Sponsor
        // $superAdmin = User::whereHas(
        //     'role',
        //     function ($q) {
        //         $q->where('name', 'super_admin');
        //     }
        // )->get();
        // $superAdmin = $superAdmin[0];
        // $user->ref()->attach($superAdmin->id);
    }
}
