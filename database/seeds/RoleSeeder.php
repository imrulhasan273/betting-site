<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super_admin', 'display_name' => 'Super Admin']);
        Role::create(['name' => 'admin', 'display_name' => 'Admin']);
        Role::create(['name' => 'club_admin', 'display_name' => 'Club Admin']);
        // Role::create(['name' => 'sponsor_admin', 'display_name' => 'Sponsor Admin']);
        Role::create(['name' => 'user', 'display_name' => 'User']);
    }
}
