<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
Use App\Resource;

class ResourceServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i=1; $i < 5; $i++) {
            Resource::findOrfail($i)->services()->sync([$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10)]);
        }

    }
}
