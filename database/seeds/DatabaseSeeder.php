<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PaymentOptionSeeder::class);
        // $this->call(ClubSeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(TypeSeeder::class);
        // $this->call(TypesTableSeeder::class);
        // $this->call(GamesTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
        // $this->call(AnswersTableSeeder::class);

        #$this->call(DepositSeeder::class); //its not necessary.

        $this->call(CommissionSeeder::class);
    }
}
