<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\RendezVous;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Session;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendes = RendezVous::all();

        $patients = Patient::all();
        return view('admin.patients.index', compact('patients','rendes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendes = RendezVous::all();

        return view('admin.patients.create',compact('rendes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        Patient::create($request->all());
        Session::flash('create_patient', 'Created Of patients succsusful');

        /* User::create($request->all()); */
        return redirect('admin/patients');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($patient)
    {

        $rendes = RendezVous::all();
        $patients = Patient::all();

        return view('admin.patients.index', compact('patients','rendes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $rendes = RendezVous::all();

        return view('admin.patients.edit', compact('patient','rendes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $input = $request->all();
        if (empty($request->date_naissance)) {
            $input['date_naissance'] = $patient->date_naissance;
        }
        Patient::findOrfail($patient->id)->update($input);
        Session::flash('update_patient', 'Updated of patient succsusful');
        return redirect('admin/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        Patient::findOrfail($patient->id)->delete();
        Session::flash('delete_patient', 'delete of patient succsusful');
        return redirect('admin/patients');

    }
}
