<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'cricket',
                'display_name' => 'Cricket',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'football',
                'display_name' => 'Football',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'basket_ball',
                'display_name' => 'Basket Ball',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'tennis',
                'display_name' => 'Tennis',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'table_tennis',
                'display_name' => 'Table Tennis',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'badminton',
                'display_name' => 'Badminton',
                'created_at' => '2020-08-21 14:38:27',
                'updated_at' => '2020-08-21 14:38:27',
            ),
        ));
        
        
    }
}