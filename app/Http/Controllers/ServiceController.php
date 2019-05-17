<?php

namespace App\Http\Controllers;

use App\Service;
use App\RendezVous;
use App\Doctor;
use App\Resource;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ServicesUpdateRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendes = RendezVous::all();

        $services = Service::all();
        return view('admin.services.index',compact('services','rendes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendes = RendezVous::all();

        $doctors = Doctor::pluck('name', 'id')->all();
        $resources = Resource::pluck('name', 'id')->all();


        return view('admin.services.create',compact('rendes','doctors','resources'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)
    {
        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $service = Service::create($input);

        $service->doctors()->sync($request->get('doctor_id'));
        $service->resources()->sync($request->get('resource_id'));


        Session::flash('create_service', 'Create of service succsusful');


        /* User::create($request->all()); */
        return redirect('admin/services');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $rendes = RendezVous::all();
        $doctors = Doctor::pluck('name', 'id')->all();
        $resources = Resource::pluck('name', 'id')->all();


        return view('admin.services.edit',compact('service','rendes','doctors','resources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesUpdateRequest $request, Service $service)
    {
        //
         $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $service->update($input);

        $service->doctors()->sync($request->get('doctor_id'));
        $service->resources()->sync($request->get('resource_id'));


        Session::flash('update_service', 'updated Of service succsusful');

        /* User::create($request->all()); */
        return redirect('admin/services');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {

        /* unlink(public_path().$user->photo->file); */

        $service->doctors()->detach();
        $service->resources()->detach();


        $service->delete();

        Session::flash('delete_service', 'deleted of service succsusful');

        return redirect('/admin/services');


    }


    public function gerertache()
    {
        $rendes = RendezVous::all();

        $doctors = Doctor::all();
        $services = Service::all();
        $resources = Resource::all();

        return view('admin.services.gerertache', compact('doctors','services','resources','rendes'));

    }
}
