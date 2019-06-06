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
        $photo_id = 5;
    	foreach (range(1,5) as $index) {
	        DB::table('services')->insert([
	            'name' => $faker->name,
	            'content' => $faker->paragraph,
                'photo_id' => $photo_id,
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
            $photo_id++;
	    }
    }


}
