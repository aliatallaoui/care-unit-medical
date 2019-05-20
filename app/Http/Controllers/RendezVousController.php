<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Service;
use App\RendezVous;
use App\Doctor;
use App\Resource;
use App\Horaire;

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
        return view('rendezvous.index', compact('services'));
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
        // Block validation RendezVous
        $service = Service::findOrfail($request->get('service_id'));

        /* return $service->doctors.'<br>'.$service->resources; */
        //$etat_doctor = true;
        /* foreach ($service->doctors as $doctor) {
            if ($doctor->etat == 0) {
                Doctor::findOrfail($doctor->id)->update(['etat'=>1]);

                $service->doctors()->attach($doctor->id);
                $doctor_of_patient = $doctor->id;

                break;
            } else {
                $doctor_of_patient = 0;
                $etat_doctor = false;
            }
        }
        $etat_resource = true; */

        /* foreach ($service->resources as $resource) {
            if ($resource->etat == 0) {
                $res = Resource::findOrfail($resource->id);

                if ($res->stock > 0) {
                    $res->stock = $res->stock - 1;
                    $service->resources()->attach($res->id);
                    if ($res->stock == 0) {
                        $res->etat = 1;
                        $res->save();
                    }
                } else {
                    $etat_resource = false;
                    break;
                }
            } else {
                $etat_resource = false;
                break;
            }
        } */


        if ($service->ServiceDisponible()) {

            $service->Reserve();


            $patient = Patient::create($request->all());

            $rendezVous = RendezVous::create(['date_rdv'=>$request->date_rdv]);


            $horairecreate = [

                'title'=>$service->name,
                'start_date'=>$rendezVous->date_rdv,
                'end_date'=>$rendezVous->date_rdv,
                'patient_id'=>$patient->id,
                'service_id'=>$service->id,
                'doctor_id'=>$service->Doctor_id()

            ];

            $horaire = Horaire::create($horairecreate);





            Session::flash('create_rdv_ok', 'RendezVous Succsufel');

            /* $rendezVous->patients()->attach($patient->id);
            $rendezVous->services()->attach($service->id); */

            return redirect('/');

        }else{

            $messge = 'RendezVous Fail !';
            Session::flash('create_rdv_fail', $messge );
            return redirect('/');

        }


        // End validation RendezVous


        /* $rendezVous->patients()->attach($patient->id); */
        /* $rendezVous->services()->attach($request->get('service_id')); */


        /* $patient = new Patient;

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->etat = $request->etat;
        $patient->message = $request->message;
        $patient->date_naissance = $request->date_naissance;

        $patient->save();


        $rendezvous = new RendezVous;
        $rendezvous->date_rdv = $request->date_rdv;

        $rendezvous->save(); */





        /*  */

        /* User::create($request->all()); */
       /*  return redirect('/'); */
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
