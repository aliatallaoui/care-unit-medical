<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('resources')->insert([
                'name' => $faker->jobTitle(),
                'stock' => $faker->numberBetween($min = 2, $max = 15),
                'etat' => $faker->numberBetween($min = 0, $max = 0),
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
        }

    }
}
