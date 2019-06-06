<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $photo_id = 1;

        foreach (range(1, 5) as $index) {
            DB::table('doctors')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->e164PhoneNumber,
                'specialite_id' => $faker->numberBetween($min = 1, $max = 5),
                'photo_id' => $photo_id,
                'etat' => $faker->numberBetween($min = 0, $max = 0),
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
            $photo_id++;
        }

    }
}
