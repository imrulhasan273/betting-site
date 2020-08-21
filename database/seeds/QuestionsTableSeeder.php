<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questions')->delete();
        
        \DB::table('questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'game_id' => 1,
                'question' => 'Win',
                'is_active' => 1,
                'created_at' => '2020-08-21 14:42:09',
                'updated_at' => '2020-08-21 14:42:09',
            ),
            1 => 
            array (
                'id' => 2,
                'game_id' => 1,
                'question' => 'Loss',
                'is_active' => 1,
                'created_at' => '2020-08-21 14:42:43',
                'updated_at' => '2020-08-21 14:42:43',
            ),
            2 => 
            array (
                'id' => 3,
                'game_id' => 1,
                'question' => 'Batting First',
                'is_active' => 1,
                'created_at' => '2020-08-21 14:43:18',
                'updated_at' => '2020-08-21 14:43:18',
            ),
            3 => 
            array (
                'id' => 4,
                'game_id' => 1,
                'question' => 'Toss Win',
                'is_active' => 1,
                'created_at' => '2020-08-21 14:43:48',
                'updated_at' => '2020-08-21 14:43:48',
            ),
        ));
        
        
    }
}