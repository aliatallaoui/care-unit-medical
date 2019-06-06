<?php

namespace App\Http\Controllers;
use Calendar;
use App\RendezVous;
use Carbon\Carbon;



use Illuminate\Http\Request;

class AdminHorairesController extends Controller
{
     public function index()
    {


        $rendes = RendezVous::all();
        $Heure = [      '0'=>'08:00:00',
                        '1'=>'08:30:00',
                        '2'=>'09:00:00',
                        '3'=>'09:30:00',
                        '4'=>'10:00:00',
                        '5'=>'10:30:00',
                        '6'=>'11:00:00',
                        '7'=>'11:30:00',
                        '8'=>'12:00:00',
                        '9'=>'12:30:00',
                        '10'=>'13:00:00',
                        '11'=>'13:30:00',
                        '12'=>'14:00:00',
                        '13'=>'14:30:00'

        ];





        $events = [];
        $data = RendezVous::all();
        if($data->count()) {
            foreach ($data as $key => $value) {

                /* $d = Carbon::create($value->date_rdv); */
                $day = Carbon::create($value->date_rdv);
                $day->addHours(8);



                /* $h = Carbon::parse($Heure[$value->Heure]+$value->Duree)); */

                $events[] = Calendar::event(
                    $value->patient->name,
                    false,
                    $day->addMinutes(($value->Heure)*30),
                    $day->addMinutes($value->Duree),
                    null,
                    // Add color and link on event
	                [
	                    'color' => 'green',
	                    'url' => 'patients/index',
                    ]
                    );
            }
        }
        $calendar = Calendar::addEvents($events);

        return view('admin.rendezvousse.gerertache', compact('calendar','rendes'));
    }
}

