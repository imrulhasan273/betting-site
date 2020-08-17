<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'cricket',
            'display_name' => 'Cricket'
        ]);
        Type::create([
            'name' => 'football',
            'display_name' => 'Football'
        ]);
        Type::create([
            'name' => 'basket_ball',
            'display_name' => 'Basket Ball'
        ]);
        Type::create([
            'name' => 'tennis',
            'display_name' => 'Tennis'
        ]);
        Type::create([
            'name' => 'table_tennis',
            'display_name' => 'Table Tennis'
        ]);
        Type::create([
            'name' => 'badminton',
            'display_name' => 'Badminton'
        ]);
    }
}
