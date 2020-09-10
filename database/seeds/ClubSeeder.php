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
            'commission' => 0.2
        ]);

        Club::create([
            'name' => 'Rajshahi Club',
            'balance' => 11100,
            'member' => null,
            'commission' => 0.1
        ]);
    }
}
