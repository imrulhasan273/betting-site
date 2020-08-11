<?php

// use random;
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
            'password' => Hash::make('0000000000'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Admin Seeder
        $role = Role::where('name', 'admin')->first();
        $user = User::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0000000000'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Club Admin Seeder
        $role = Role::where('name', 'club_admin')->first();
        $user = User::create([
            'name' => 'Mr. Club Owner',
            'email' => 'club@gmail.com',
            'password' => Hash::make('0000000000'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Normal User Seeder
        $role = Role::where('name', 'user')->first();
        $user = User::create([
            'name' => 'Mr. Normal User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('0000000000'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);

        #Normal User Seeder
        $role = Role::where('name', 'user')->first();
        $user = User::create([
            'name' => 'Test User',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('0000000000'),
            'remember_token' => Str::random(60),
        ]);
        $user->role()->attach($role->id);
    }
}
