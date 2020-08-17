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
            'email' => 'super@gmail.com',
            'password' => Hash::make('0000000000super'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Admin Seeder
        $role = Role::where('name', 'admin')->first();
        $user = User::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0000000000admin'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Club Admin Seeder
        $role = Role::where('name', 'club_admin')->first();
        $user = User::create([
            'name' => 'Mr. Club Owner',
            'email' => 'club@gmail.com',
            'password' => Hash::make('0000000000club'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Sponsor Seeder
        $role = Role::where('name', 'sponsor_admin')->first();
        $user = User::create([
            'name' => 'Sponsor Admin',
            'email' => 'sponsor@gmail.com',
            'password' => Hash::make('0000000000sponsor'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);


        ## Added a club id to the users
        #Normal User Seeder
        $role = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => 'Mr. Normal User',
            'club_id' => 1,
            'email' => 'user@gmail.com',
            'password' => Hash::make('0000000000user'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);
    }
}
