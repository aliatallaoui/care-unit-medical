<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use Faker\Factory as Faker;

class DoctorServiceTableSeeder extends Seeder
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
            Doctor::findOrfail($i)->services()->sync([$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10),$faker->numberBetween($min = 1, $max = 10)]);
        }
    }

}
