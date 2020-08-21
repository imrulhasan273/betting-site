<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('games')->delete();
        
        \DB::table('games')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type_id' => 1,
                'date' => '2020-08-21',
                'time' => '10:30:30',
                'name' => 'BAN vs ENG',
                'tournament_name' => 'Eng Tour',
                'game_update' => '',
                'status' => 'live',
                'created_at' => '2020-08-21 14:41:50',
                'updated_at' => '2020-08-21 14:41:50',
            ),
        ));
        
        
    }
}