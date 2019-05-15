<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Service;
use App\RendezVous;
use Illuminate\Http\Request;
use App\Http\Requests\RendezVousRequest;

use Illuminate\Support\Facades\Session;


class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('rendezvous.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RendezVousRequest $request)
    {
        $patient = new Patient;

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->etat = $request->etat;
        $patient->message = $request->message;
        $patient->date_naissance = $request->date_naissance;

        $patient->save();


        $rendezvous = new RendezVous;

        $rendezvous->service_id = $request->service_id;
        $rendezvous->patient_id = $patient->id;
        $rendezvous->date_rdv = $request->date_rdv;

        $rendezvous->save();



        Session::flash('create_rdv', 'Rendez Vous Sucessful');

        /* User::create($request->all()); */
        return redirect('/');
        // return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RendezVous $rendezVous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy(RendezVous $rendezVous)
    {
        //
    }
}
