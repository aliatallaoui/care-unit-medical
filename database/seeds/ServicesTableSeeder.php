<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('services')->insert([
	            'name' => $faker->name,
	            'content' => $faker->paragraph,
                'photo_id' => $faker->numberBetween($min = 6, $max = 11),
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
	        ]);
	    }
    }


}
