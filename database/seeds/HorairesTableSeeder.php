<?php

use Illuminate\Database\Seeder;
use App\Horaire;

class HorairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=>'Demo Event-1','patient_id'=>1,'doctor_id'=>1,'service_id'=>1,'start_date'=>'2019-05-01', 'end_date'=>'2019-05-02'],
            ['title'=>'Demo Event-2','patient_id'=>2,'doctor_id'=>2,'service_id'=>2,'start_date'=>'2019-05-01', 'end_date'=>'2019-05-02'],
            ['title'=>'Demo Event-3','patient_id'=>3,'doctor_id'=>3,'service_id'=>3,'start_date'=>'2019-05-16', 'end_date'=>'2019-05-19'],
            ['title'=>'Demo Event-3','patient_id'=>4,'doctor_id'=>4,'service_id'=>4,'start_date'=>'2019-05-27', 'end_date'=>'2019-05-28'],
        ];
        foreach ($data as $key => $value) {
            Horaire::create($value);
        }

    }
}
