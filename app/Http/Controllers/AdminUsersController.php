<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use App\RendezVous;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUsersRequest;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $rendes = RendezVous::all();


        return view('admin.users.index',compact('users','rendes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rendes = RendezVous::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create',compact('roles','rendes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $request)
    {

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        User::create($input);

        /* User::create($request->all()); */
        return redirect('admin/users');
        // return $request->all();

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
        $rendes = RendezVous::all();
        $roles = Role::pluck('name', 'id')->all();
        $user = User::findOrfail($id);
        return view('admin.users.edit',compact('user','roles','rendes'));
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
        $user = User::findOrfail($id);

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        /* unlink(public_path().$user->photo->file); */

        $user->delete();

        Session::flash('Deleted_user', 'Delete of user succsusful');

        return redirect('/admin/users');


    }
}
