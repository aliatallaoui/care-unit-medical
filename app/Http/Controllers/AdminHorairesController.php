<?php

namespace App\Http\Controllers;
use Calendar;
use App\Horaire;
use App\RendezVous;

use Illuminate\Http\Request;

class AdminHorairesController extends Controller
{
    /*  public function index()
    {
        $rendes = RendezVous::all();
        $events = [];
        $data = Horaire::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('admin.rendezvousse.gerertache', compact('calendar','rendes'));
    } */
}

