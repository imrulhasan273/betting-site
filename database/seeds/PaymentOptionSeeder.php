<?php

use App\PaymentOption;
use Illuminate\Database\Seeder;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = PaymentOption::create([
            'method' => 'Bkash',
            'type' => 'personal',
            'phone' => '017XXXXXXXXX',
            'status' => 'active',
        ]);
    }
}
