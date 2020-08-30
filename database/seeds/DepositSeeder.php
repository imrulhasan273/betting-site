<?php

use App\Deposit;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $InsertDeposit = Deposit::create([
            'user_id' =>  6,
            'deposit_to' => 18818181,
            'deposit_by' => 181818181,
            'amount' => 12000,
            'method_id' => 1,
            'transection_id' => 'KLHJKHKJASS',
            'note' => 'ksks',
            'status' => 'kkskk'
        ]);
    }
}
