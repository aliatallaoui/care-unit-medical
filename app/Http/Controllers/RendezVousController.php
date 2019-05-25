<?php

namespace App\Http\Controllers;
use App\Service;
use App\RendezVous;
use App\Doctor;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use App\Http\Requests\RendezVousRequest;


use Illuminate\Support\Facades\Session;


use Carbon\Carbon;





class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RendezVousPatient = new RendezVous;

        $servicesRDV = Service::pluck('name', 'id')->all();
        $doctorsRDV = doctor::pluck('name', 'id')->all();




        return view('rendezvous.index', compact( 'servicesRDV','RendezVousPatient','doctorsRDV'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($rendezvous)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RendezVousRequest $request)
    {

        return 'it work';


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function recherche(Request $request)
    {
        // attribute of Rendez Vous of Patient
        $RendezVousPatient = new RendezVous;
        $RendezVousPatient->date_rdv = $request->date_rdv;
        $RendezVousPatient->service_id = $request->service_id;
        $RendezVousPatient->Heure = $request->Heure;
        $RendezVousPatient->Duree = 30;
        // Atribute of validation of rendez vous
        $service = Service::findOrfail($request->service_id);
        $doctors_service = $service->doctors;
        $date_rdv_patient = Carbon::parse($RendezVousPatient->date_rdv);
        $rendesvouses = RendezVous::where('service_id',$RendezVousPatient->service_id)->get();

        // doctors_notD_id homa doctors li y9dro ykhdmo service bsah reserved fi date li demendah
        $doctors_not_Dis = array();
        $count_not_Dis = 0;
        // doctors_D_id homa doctors li y9dro ykhdmo service w mhmch reserved fi date li demendah
        $doctors_Dis = array();
        $count_Dis = 0;

        foreach ($rendesvouses as $Rendezvous) {

            $dateRDV = Carbon::parse($Rendezvous->date_rdv);

            if($dateRDV == $date_rdv_patient && $Rendezvous->Heure == $RendezVousPatient->Heure){

                // doctors not disponible for this rendezvous
                $doctors_not_Dis[$count_not_Dis] = Doctor::findOrfail($Rendezvous->doctor_id);
                $count_not_Dis++;

            }
        }

        if ($count_not_Dis > 0) {

            foreach ($doctors_service as $doctor) {
                $disponible = true;
                foreach ($doctors_not_Dis as $Doctor_not_Dis) {
                    if ($doctor->id == $Doctor_not_Dis->id) {
                        $disponible = false;
                    }
                }
                if ($disponible) {

                    $doctors_Dis[$count_Dis] = Doctor::findOrfail($doctor->id);
                    $count_Dis++;

                }


            }

            Session::flash('Rendezvous_succsucful', 'Votre Date Reserved');

            $servicesRDV = Service::pluck('name', 'id')->all();
            $doctorsRDV = Arr::pluck($doctors_Dis, 'name', 'id');

            return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service'));


        }else{
           $doctorsRDV = doctor::pluck('name', 'id')->all();
           $doctors_Dis = $service->doctors;
           $servicesRDV = Service::pluck('name', 'id')->all();
           Session::flash('Rendezvous_fail', 'Votre Date Reserved');
           return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service'));


        }






    }
}
