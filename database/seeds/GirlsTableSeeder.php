<?php

use App\Girl;
use Illuminate\Database\Seeder;

class GirlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create('ne_NP');

        for($i=0;$i<500;$i++){

            Girl::create([
                'name'=>$faker->name,
                'lat'=>$faker->unique()->latitude(27,29),
                'lng'=>$faker->unique()->longitude(81,88),
            ]);

        }
    }
}
