@extends('layouts.admin')
@section('content')
    <h1>Admin Doctors</h1>
    @if ($doctors)
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Table Doctors</h4>

                @if (Session::has('create_doctor'))
                    <div class="alert alert-success col-sm-12">
                        {{ session('create_doctor') }}
                    </div>
                @endif
                @if (Session::has('update_doctor'))
                    <div class="alert alert-info col-sm-12">
                        {{ session('update_doctor') }}
                    </div>
                @endif
                @if (Session::has('delete_doctor'))
                    <div class="alert alert-danger col-sm-12">
                        {{ session('delete_doctor') }}
                    </div>
                @endif

                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> id </th>
                    <th><i class=" fa fa-photo"></i>  Photo</th>
                    <th><i class=" fa fa-user-o"></i>  Name</th>
                    <th><i class=" fa fa-envelope"></i> Phone Number</th>
                    <th><i class=" fa fa-graduation-cap"></i>Speacialite</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th><i class="fa fa-user"></i> profile</th>

                    <th><i class=" fa fa-clock-o"></i>  Created_at</th>
                    <th><i class=" fa fa-clock-o"></i>  Updated_at</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td><a href="#">{{ $doctor->id }}</a></td>
                            <td><img height="50" src="{{$doctor->photo ? $doctor->photo->file : 'http://placehold.it/50x50'}}" alt="" ></td>
                            <td><a href="{{ route('doctors.edit',$doctor) }}">{{ $doctor->name }}</a></td>
                            <td><b>{{ $doctor->phone_number }}</b></td>
                            <td>{{ $doctor->specialite ? $doctor->specialite->name : 'Speacilite' }}</td>
                            <td><strong><span class="btn btn-{{ $doctor->etat == 1 ? 'success' : 'danger' }} btn-xs">{{ $doctor->etat == 1 ? 'Acive' : 'not Active' }}</span></strong></td>
                            <td>
                                <a href="{{ route('doctors.edit',$doctor) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                @foreach ($doctor->horaires as $horaire)
                                    <li>{{ $horaire->start_date }} <b>{{ $dt }}</b> </li>
                                @endforeach
                                <ul></ul>
                            </td>

                            <td>{{ $doctor->created_at->diffForHumans() }}</td>
                            <td>{{ $doctor->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
              {{-- <a id="add-regular" class="btn btn-default btn-sm" href="javascript:;">Regular</a>
              <a id="add-sticky" class="btn btn-success  btn-sm" href="javascript:;">Sticky</a>
              <a id="add-without-image" class="btn btn-info  btn-sm" href="javascript:;">Imageless</a>
              <a id="add-gritter-light" class="btn btn-warning  btn-sm" href="javascript:;">Light</a>
              <a id="remove-all" class="btn btn-danger  btn-sm" href="general.html#">Remove all</a> --}}
        </div>
        <!-- /col-md-12 -->
        @else

    @endif
    </div>
@endsection
