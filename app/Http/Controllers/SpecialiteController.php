<?php

namespace App\Http\Controllers;
use App\RendezVous;
use App\Specialite;
use Illuminate\Http\Request;
use App\Http\Requests\AdminSpecialitesRequest;
use Illuminate\Support\Facades\Session;





class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendes = RendezVous::all();
        $specialites = Specialite::all();
        return view('admin.specialites.index',compact('specialites','rendes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendes = RendezVous::all();
        $specialites = Specialite::all();
        return view('admin.specialites.index', compact('specialites','rendes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminSpecialitesRequest $request)
    {

        Specialite::create($request->all());
        Session::flash('create_specialite', 'Create of Specialite succsusful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendes = RendezVous::all();

        $specialites = Specialite::all();
        $specialite = Specialite::findOrfail($id);
        return view('admin.specialites.edit', compact('specialite','specialites','rendes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialite $specialite)
    {
        $rendes = RendezVous::all();

        Specialite::findOrfail($specialite->id)->update($request->all());
        $specialites = Specialite::all();
        Session::flash('updated_specialite', 'update of Specialite succsusful');
        return view('admin.specialites.index', compact('specialites','rendes'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialite  $specialite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialite $specialite)
    {

        Specialite::findOrfail($specialite->id)->delete();
        $specialites = Specialite::all();
        Session::flash('delete_specialite', 'delete of Specialite succsusful');
        return redirect('admin/specialites');

    }
}
