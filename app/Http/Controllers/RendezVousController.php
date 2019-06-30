<?php

namespace App\Http\Controllers;

use App\Service;
use App\RendezVous;
use App\Doctor;
use App\Patient;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use App\Http\Requests\PatientRequest;


use Illuminate\Support\Facades\Session;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\ServiceProvider;



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
        $Heure = [      '0'=>'08:00 At 08:30',
                        '1'=>'08:30 At 09:00',
                        '2'=>'09:00 At 09:30',
                        '3'=>'09:30 At 10:00',
                        '4'=>'10:00 At 10:30',
                        '5'=>'10:30 At 11:00',
                        '6'=>'11:00 At 11:30',
                        '7'=>'11:30 At 12:00',
                        '8'=>'12:00 At 12:30',
                        '9'=>'12:30 At 13:00',
                        '10'=>'13:00 At 13:30',
                        '11'=>'13:30 At 14:00',
                        '12'=>'14:00 At 14:30',
                        '13'=>'14:30 At 15:00'

        ];
        return view('rendezvous.index', compact('servicesRDV', 'RendezVousPatient', 'doctorsRDV', 'Heure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* $RendezVousPatient = new RendezVous;
        $servicesRDV = Service::pluck('name', 'id')->all();
        $doctorsRDV = doctor::pluck('name', 'id')->all();
        $Heure = [      '0'=>'08:00 At 08:30',
                        '1'=>'08:30 At 09:00',
                        '2'=>'09:00 At 09:30',
                        '3'=>'09:30 At 10:00',
                        '4'=>'10:00 At 10:30',
                        '5'=>'10:30 At 11:00',
                        '6'=>'11:00 At 11:30',
                        '7'=>'11:30 At 12:00',
                        '8'=>'12:00 At 12:30',
                        '9'=>'12:30 At 13:00',
                        '10'=>'13:00 At 13:30',
                        '11'=>'13:30 At 14:00',
                        '12'=>'14:00 At 14:30',
                        '13'=>'14:30 At 15:00'

        ];
        return view('rendezvous.index', compact('servicesRDV', 'RendezVousPatient', 'doctorsRDV', 'Heure')); */
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $verfieRendezvous = RendezVous::where('service_id', $request->service_id)->where('doctor_id', $request->doctor_id)->where('date_rdv', $request->date_rdv)->where('Heure', $request->Heure)->get()->all();

        if (empty($verfieRendezvous)) {
            $patient = Patient::create($request->all());

            // $patient = Patient::findOrfail(46);
            // $rendez = RendezVous::findOrfail(31);
            $rendez = $request->rendezVous;
            // return $rendez;
            $rendezVous = new RendezVous;
            $rendezVous->patient_id = $patient->id ;
            $rendezVous->service_id = $request->service_id;
            $rendezVous->doctor_id = $request->doctor_id;
            $rendezVous->date_rdv = $request->date_rdv;
            $rendezVous->Heure = $request->Heure;
            $rendezVous->Duree = $request->Duree;


            $rendezVous->save();



            // = RendezVous::create([
            //     'patient_id'=>$patient->id,
            //     'service_id'=>$request->service_id,
            //     'doctor_id'=>$request->doctor_id,
            //     'date_rdv'=>$request->date_rdv,
            //     'Heure'=>$request->Heure,
            //     'Duree'=>$request->Duree
            // ]);


            $BarCode = $rendezVous->date_rdv .''. $patient->id ;
            Session::flash('create_rdv_successful', 'Congrats , Your RendezVous Succseful');
            $modal = 'modal';
            // $RendezVousPatient = $request->RendezVousPatient ;
            // $doctors_Dis = $request->doctors_Dis ;
            // $Heure = $request->Heure ;
            // $doctorsRDV = $request->doctorsRDV ;
            // $servicesRDV = $request->servicesRDV ;
            return view('rendezvous.imprime', compact('BarCode', 'modal', 'rendezVous', 'patient'));
        // return view('imprime', compact('rendez', 'BarCode'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
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
        RendezVous::where('patient_id', $id)->delete();
        Patient::findOrFail($id)->delete();
        return redirect('/');
    }

    public function recherche(Request $request)
    {

        // Data Reservation Patient
        $RendezVousPatient = new RendezVous;
        $RendezVousPatient->date_rdv = $request->date_rdv;
        $RendezVousPatient->service_id = $request->service_id;
        $RendezVousPatient->Heure = $request->Heure;
        $RendezVousPatient->Duree = 30;


        $service = Service::findOrfail($request->service_id);
        $doctors = $service->doctors;
        $rendesvouses = RendezVous::where('service_id', $RendezVousPatient->service_id)->where('date_rdv', $RendezVousPatient->date_rdv)->get();



        // Varible for Manipule
        $date_rdv_patient = Carbon::parse($RendezVousPatient->date_rdv);
        $valid = true;
        // doctor disponible
        $doctors_Dis = array();
        $count_Dis = 0;

        // Heure date rdv
        $Heure = [      '0'=>'08:00 At 08:30',
                         '1'=>'08:30 At 09:00',
                         '2'=>'09:00 At 09:30',
                         '3'=>'09:30 At 10:00',
                         '4'=>'10:00 At 10:30',
                         '5'=>'10:30 At 11:00',
                         '6'=>'11:00 At 11:30',
                         '7'=>'11:30 At 12:00',
                         '8'=>'12:00 At 12:30',
                         '9'=>'12:30 At 13:00',
                         '10'=>'13:00 At 13:30',
                         '11'=>'13:30 At 14:00',
                         '12'=>'14:00 At 14:30',
                         '13'=>'14:30 At 15:00'

         ];
        // Validation Doctors Etat Disponible
        foreach ($doctors as $doctor) {
            $rendezvousDoctors = $doctor->rendezvouses;
            if (count($rendezvousDoctors) > 0) {
                foreach ($rendezvousDoctors as $rendezvousDoctor) {
                    $date_rdv_doctor = Carbon::parse($rendezvousDoctor->date_rdv);

                    if ($date_rdv_doctor == $date_rdv_patient && $rendezvousDoctor->Heure == $RendezVousPatient->Heure) {
                        unset($Heure[$rendezvousDoctor->Heure]);
                    } else {
                        $doctors_Dis[$count_Dis] = $doctor;
                        $count_Dis++;
                    }
                }
            } else {
                $doctors_Dis[$count_Dis] = $doctor;
                $count_Dis++;
            }
        }

        if ($count_Dis > 0) {
            $servicesRDV = Service::pluck('name', 'id')->all();
            $doctorsRDV = Arr::pluck($doctors_Dis, 'name', 'id');
            $valid = true;
            if (Session::has('Heure_invalid') || Session::has('Date_invalid')) {
                session()->forget(['Heure_invalid','Date_invalid']);
            }

            Session::flash('date_valid', 'your Date and Heure  Disponible ');
            $enable = 'Disabled';
            return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service', 'Heure', 'doctors_Dis', 'valid', 'enable'));
        } else {
            if (Session::has('Heure_invalid') || Session::has('date_valid')) {
                session()->forget(['Heure_invalid','date_valid']);
            }
            Session::flash('Date_invalid', 'sorry ,this date reserved  ');
            $valid = false;
            $servicesRDV = Service::pluck('name', 'id')->all();
            return view('rendezvous.index', compact('RendezVousPatient', 'servicesRDV', 'service', 'Heure', 'valid'));
        }
    }
    public function orderPdf(PatientRequest $request)
    {
        return 'hello world ';
    }

    public function valideRendezVous(Request $request)
    {
        $rendezVous = new RendezVous;
        $rendezVous->date_rdv = $request->date_rdv;
        $rendezVous->Heure = $request->Heure;
        $rendezVous->service_id = $request->service_id;
        $rendezVous->doctor_id = $request->doctor_id;
        $rendezVous->Duree = 30;
        $modal = '';

        return view('rendezvous.create', compact('rendezVous', 'modal'));
    }
    public function chercher(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $doctors = $service->doctors;
        $rendezvous = RendezVous::where('date_rdv', $request->date_rdv);
        $date_rdv = $request->date_rdv;
        $servicesRDV = Service::pluck('name', 'id')->all();


        return view('rendezvous.edit', compact('doctors', 'service', 'rendezvous', 'date_rdv', 'servicesRDV'));

        // return 'hello world';
    }
}


    // public function recherche(Request $request)
    // {
    //     // attribute of Rendez Vous of Patient
    //     $valid = true;
    //     $RendezVousPatient = new RendezVous;
    //     $RendezVousPatient->date_rdv = $request->date_rdv;
    //     $RendezVousPatient->service_id = $request->service_id;
    //     $RendezVousPatient->Heure = $request->Heure;
    //     $RendezVousPatient->Duree = 30;
    //     // Atribute of validation of rendez vous
    //     $service = Service::findOrfail($request->service_id);
    //     $doctors_service = $service->doctors;
    //     $date_rdv_patient = Carbon::parse($RendezVousPatient->date_rdv);
    //     $rendesvouses = RendezVous::where('service_id',$RendezVousPatient->service_id)->get();


    //     $Heure = [      '0'=>'08:00 At 08:30',
    //                     '1'=>'08:30 At 09:00',
    //                     '2'=>'09:00 At 09:30',
    //                     '3'=>'09:30 At 10:00',
    //                     '4'=>'10:00 At 10:30',
    //                     '5'=>'10:30 At 11:00',
    //                     '6'=>'11:00 At 11:30',
    //                     '7'=>'11:30 At 12:00',
    //                     '8'=>'12:00 At 12:30',
    //                     '9'=>'12:30 At 13:00',
    //                     '10'=>'13:00 At 13:30',
    //                     '11'=>'13:30 At 14:00',
    //                     '12'=>'14:00 At 14:30',
    //                     '13'=>'14:30 At 15:00'

    //     ];


    //     // doctors_notD_id homa doctors li y9dro ykhdmo service bsah reserved fi date li demendah
    //     $doctors_not_Dis = array();
    //     $count_not_Dis = 0;
    //     // doctors_D_id homa doctors li y9dro ykhdmo service w mhmch reserved fi date li demendah
    //     $doctors_Dis = array();
    //     $count_Dis = 0;

    //     foreach ($rendesvouses as $Rendezvous) {

    //         $dateRDV = Carbon::parse($Rendezvous->date_rdv);

    //         if($dateRDV == $date_rdv_patient){

    //             if ($Rendezvous->Heure == $RendezVousPatient->Heure) {
    //                 // doctors not disponible for this rendezvous
    //                 $doctors_not_Dis[$count_not_Dis] = Doctor::findOrfail($Rendezvous->doctor_id);
    //                 $count_not_Dis++;
    //             }
    //             unset($Heure[$Rendezvous->Heure]);

    //         }
    //     }

    //     if ($count_not_Dis > 0) {

    //         foreach ($doctors_service as $doctor) {
    //             $disponible = true;
    //             foreach ($doctors_not_Dis as $Doctor_not_Dis) {
    //                 if ($doctor->id == $Doctor_not_Dis->id) {
    //                     $disponible = false;
    //                 }
    //             }
    //             if ($disponible) {

    //                 $doctors_Dis[$count_Dis] = Doctor::findOrfail($doctor->id);
    //                 $count_Dis++;

    //             }


    //         }

    //         if (count($doctors_Dis)>0) {

    //             Session::flash('Rendezvous_succsucful', 'your Date and Heure  Disponible ');
    //             $servicesRDV = Service::pluck('name', 'id')->all();
    //             $doctorsRDV = Arr::pluck($doctors_Dis, 'name', 'id');
    //             $valid = true;

    //             return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service','Heure','doctors_Dis','valid'));

    //         }else{

    //             if (empty($Heure)) {
    //                 if (Session::has('Heure_invalid') || Session::has('date_valid')){
    //                     session()->forget(['Heure_invalid','date_valid']);
    //                 }

    //                 Session::flash('Date_invalid', 'sorry ,this date reserved  ');
    //             }else{
    //                 if (Session::has('Date_invalid') || Session::has('date_valid')) {
    //                     session()->forget(['Date_invalid','date_valid']);
    //                 }
    //                 Session::flash('Heure_invalid', 'sorry ,this Heure reserved  ... choise other Heure ');
    //             }

    //             $valid = false;

    //             $servicesRDV = Service::pluck('name', 'id')->all();
    //             $doctorsRDV = Arr::pluck($doctors_Dis, 'name', 'id');
    //             return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service','Heure','doctors_Dis','valid'));


    //         }



    //     }else{

    //        $doctorsRDV = $service->doctors;
    //        $doctorsRDV = Arr::pluck($doctorsRDV, 'name', 'id');
    //        $doctors_Dis = $service->doctors;
    //        $servicesRDV = Service::pluck('name', 'id')->all();
    //        if (Session::has('Date_invalid') || Session::has('Heure_invalid')) {
    //             session()->forget(['Date_invalid','Heure_invalid']);
    //         }

    //         $valid = true;
    //        Session::flash('date_valid', 'Your Day is Valide, Please Fill  your information And reserve ');
    //        return view('rendezvous.index', compact('doctorsRDV', 'RendezVousPatient', 'servicesRDV', 'service','Heure','doctors_Dis','valid'));

    //     }

    // }
