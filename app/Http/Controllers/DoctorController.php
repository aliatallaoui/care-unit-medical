<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Photo;
use App\RendezVous;
use App\Specialite;
use App\Service;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\DoctorsRequest;
use Illuminate\Support\Facades\Session;



class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendes = RendezVous::all();
        /* $dt = Carbon::today(); */
        /* $posts = App\Post::has('comments')->get(); */
       /* $doctors = Doctor::whereHas('horaires', function ($query) {
           $dt = Carbon::today();

            $query->where('start_date', '=', $dt);
        })->get(); */


        $doctors = Doctor::all();

       /*  print_r(Doctor::with('horaires')->get()->toArray()); */



        return view('admin.doctors.index', compact('doctors','rendes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendes = RendezVous::all();

        $specialites = Specialite::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('admin.doctors.create', compact('specialites','rendes','services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorsRequest $request)
    {
         $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $doctor = Doctor::create($input);

        $doctor->services()->sync($request->get('service_id'));


        Session::flash('create_doctor', 'Created Of Doctors succsusful');

        /* User::create($request->all()); */
        return redirect('admin/doctors');
        // return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $rendes = RendezVous::all();

        return view('admin.doctors.show',compact('doctor','rendes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $rendes = RendezVous::all();
        $services = Service::pluck('name', 'id')->all();

        $specialites = Specialite::pluck('name', 'id')->all();
        $doctor = Doctor::findOrfail($doctor->id);
        return view('admin.doctors.edit', compact('doctor','specialites','rendes','services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorsRequest $request, Doctor $doctor)
    {
        $doctor = Doctor::findOrfail($doctor->id);

        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $doctor->update($input);

        $doctor->services()->sync($request->get('service_id'));

        Session::flash('update_doctor', 'Updated of doctor succsusful');


        return redirect('/admin/doctors');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor = Doctor::findOrfail($doctor->id);

        /* unlink(public_path().$user->photo->file); */

        $doctor->services()->detach();

        $doctor->delete();

        Session::flash('delete_doctor', 'Delete of doctor succsusful');

        return redirect('/admin/doctors');

    }
}
