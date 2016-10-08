<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create('ne_NP');

        for($i=0;$i<100;$i++){

            Location::create([
                'district'=>$faker->district,
                'city'=>$faker->cityName,
                'lat'=>$faker->unique()->latitude(27,29),
                'lng'=>$faker->unique()->longitude(81,88),
            ]);

        }
    }
}
