<?php

namespace App\Http\Controllers;

use App\Service;
use App\Specialite;
use App\RendezVous;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesRequest;
use Illuminate\Support\Facades\Session;


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
    public function create($id)
    {


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


        Service::create($input);
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

        return view('admin.services.edit',compact('service','rendes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesRequest $request, Service $service)
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
        //
        $service = Service::findOrfail($service->id);

        /* unlink(public_path().$user->photo->file); */

        $service->delete();

        Session::flash('delete_service', 'deleted of service succsusful');

        return redirect('/admin/services');


    }
}
