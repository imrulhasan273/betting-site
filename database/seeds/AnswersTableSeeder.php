<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('answers')->delete();
        
        \DB::table('answers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question_id' => 1,
                'answer' => 'Ban',
                'bet_rate' => 1.3,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:42:19',
                'updated_at' => '2020-08-21 14:42:19',
            ),
            1 => 
            array (
                'id' => 2,
                'question_id' => 1,
                'answer' => 'Eng',
                'bet_rate' => 2.2,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:42:31',
                'updated_at' => '2020-08-21 14:42:31',
            ),
            2 => 
            array (
                'id' => 3,
                'question_id' => 2,
                'answer' => 'Ban',
                'bet_rate' => 2.2,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:42:53',
                'updated_at' => '2020-08-21 14:42:53',
            ),
            3 => 
            array (
                'id' => 4,
                'question_id' => 2,
                'answer' => 'Eng',
                'bet_rate' => 1.1,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:43:03',
                'updated_at' => '2020-08-21 14:43:03',
            ),
            4 => 
            array (
                'id' => 5,
                'question_id' => 3,
                'answer' => 'Ban',
                'bet_rate' => 2.2,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:43:28',
                'updated_at' => '2020-08-21 14:43:28',
            ),
            5 => 
            array (
                'id' => 6,
                'question_id' => 3,
                'answer' => 'Eng',
                'bet_rate' => 1.1,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:43:37',
                'updated_at' => '2020-08-21 14:43:37',
            ),
            6 => 
            array (
                'id' => 7,
                'question_id' => 4,
                'answer' => 'Ban',
                'bet_rate' => 5.0,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:43:56',
                'updated_at' => '2020-08-21 14:43:56',
            ),
            7 => 
            array (
                'id' => 8,
                'question_id' => 4,
                'answer' => 'Eng',
                'bet_rate' => 6.6,
                'place' => 0,
                'bet_amount' => 0,
                'rtrn_amount' => 0,
                'status' => 'active',
                'result' => '',
                'created_at' => '2020-08-21 14:44:07',
                'updated_at' => '2020-08-21 14:44:07',
            ),
        ));
        
        
    }
}