<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('roles')->insert([
                'name' => 'Admin',
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
        DB::table('roles')->insert([
                'name' => 'Agente',
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);

        DB::table('roles')->insert([
                'name' => 'Doctor',
                'created_at'=>$faker->dateTime($max = 'now', $timezone = null),
                'updated_at'=>$faker->dateTime($max = 'now', $timezone = null),
            ]);
    }
}
