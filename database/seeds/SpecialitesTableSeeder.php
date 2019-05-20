<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SpecialitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('specialites')->insert([
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
