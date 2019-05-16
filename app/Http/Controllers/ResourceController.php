<?php

namespace App\Http\Controllers;
use App\RendezVous;
use App\Resource;
use App\Service;

use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;
use Illuminate\Support\Facades\Session;


class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendes = RendezVous::all();
        $services = Service::pluck('name', 'id')->all();

        $resources = Resource::all();
        return view('admin.resources.index', compact('resources','rendes','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendes = RendezVous::all();
        $services = Service::pluck('name', 'id')->all();

        $resources = Resource::all();
        return view('admin.resources.index', compact('resources','rendes','services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceRequest $request)
    {
        $resource = $request->all();
        if ($request->stock > 0) {
            $resource['etat'] = 0;
        }else{
            $resource['etat'] = 1;
        }
        $resourceId = Resource::create($resource);

        $resourceId->services()->sync($request->get('service_id'));


        Session::flash('create_resource', 'Create of service succsusful');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        $rendes = RendezVous::all();
        $services = Service::pluck('name', 'id')->all();
        $resources = Resource::all();
        return view('admin.resources.edit', compact('resource','resources','rendes','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceRequest $request, Resource $resource)
    {


        $resourceupdate = $request->all();

        if ($request->stock > 0) {
            $resource->etat = 0;
            /* $resourceupdate['etat'] = 0; */
        } else {
            $resource->etat = 0;
            /* $resourceupdate['etat'] = 1; */
        }

        /* Resource::findOrfail($resource->id); */
        $resource->update($resourceupdate);

        $resource->services()->sync($request->get('service_id'));

        /* $resources = Resource::all(); */
        Session::flash('update_resource', 'update of resource succsusful');

        return redirect('admin/resources');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->services()->detach();
        Resource::findOrfail($resource->id)->delete();
        $resources = Resource::all();
        Session::flash('delete_resource', 'delete of resource succsusful');
        return redirect('admin/resources');


    }
}
