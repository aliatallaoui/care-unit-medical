<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            $user = [
            'name'=>str_random(10),
            'email'=>str_random(10).'@gmail.com',
            'role_id'=>random_int(1, 3),
            'isActive'=>random_int(0, 1),
            'password' => bcrypt('secret'),
            'photo_id'=>random_int(12, 20),
            ];
            User::create($user);
        }
    }
}
