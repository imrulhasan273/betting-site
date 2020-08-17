<?php

use App\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([
            'name' => 'Dhaka Club',
            'balance' => 10000,
            'member' => null,
            'email' => 'dhakaclub@gmail.com',
            'commission' => 0.02
        ]);

        Club::create([
            'name' => 'Rajshahi Club',
            'balance' => 11100,
            'member' => null,
            'email' => 'rajshahiclub@gmail.com',
            'commission' => 0.05
        ]);
    }
}
