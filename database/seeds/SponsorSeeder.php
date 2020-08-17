<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::create([
            'name' => 'Dhaka Sponsor',
            'balance' => 10000,
            'member' => null,
            'email' => 'dhakasponsor@gmail.com',
            'commission' => 0.2
        ]);

        Sponsor::create([
            'name' => 'Rajshahi Sponsor',
            'balance' => 11100,
            'member' => null,
            'email' => 'rajshahisponsor@gmail.com',
            'commission' => 0.5
        ]);
    }
}
