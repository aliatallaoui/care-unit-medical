@extends('layouts.admin')

@section('content')
<h1>Planning Appointments</h1>
@if (Session::has('delete_resource'))
<div class="alert alert-danger col-sm-12">
    {{ session('delete_resource') }}
</div>
@endif
@if (Session::has('create_resource'))
<div class="alert alert-success col-sm-12">
    {{ session('create_resource') }}
</div>
@endif
@if (Session::has('update_resource'))
<div class="alert alert-info col-sm-12">
    {{ session('update_resource') }}
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Table Doctors</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> id </th>
                            <th><i class=" fa fa-photo"></i> Name Patient</th>
                            <th><i class=" fa fa-user-o"></i> Eamil</th>
                            <th><i class=" fa fa-photo"></i> Name Doctor</th>
                            <th><i class=" fa fa-envelope"></i> Phone Number</th>
                            <th><i class=" fa fa-edit"></i> Status Rendezvous</th>
                            <th><i class="fa fa-user"></i> Edit</th>
                            <th><i class=" fa fa-clock-o"></i> Start_date</th>
                            <th><i class=" fa fa-clock-o"></i> End_date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rendes)>0)

                        @foreach ($rendes as $rendezvous)

                        @foreach ($rendezvous->patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->horaire->doctor ? $patient->horaire->doctor->name : 'No Doctor' }}</td>
                            <td>{{ $patient->horaire->doctor->phone_number }}</td>
                            <td><strong><span
                                        class="btn btn-{{ $patient->etat == 1 ? 'success' : 'danger' }} btn-xs">{{ $patient->etat == 1 ? 'Acive' : 'not Active' }}</span></strong>
                                <a href="{{ route('patients.edit',$patient) }}" class="btn btn-success btn-xs"><i
                                        class="fa fa-check"></i></a>
                            </td>
                            <td>

                                <a href="{{ route('patients.edit',$patient) }}" class="btn btn-primary btn-xs"><i
                                        class="fa fa-pencil"></i> Edit</a>
                                {{-- <a href="{{ route('patients.destroy',$patient->id) }}" class="btn btn-danger
                                btn-xs"><i class="fa fa-trash-o "></i></a> --}}
                            </td>
                            <td>{{ $patient->horaire->start_date }}</td>
                            <td>{{ $patient->horaire->end_date }}</td>

                        </tr>
                        @endforeach


                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /content-panel -->
        </div>
    </div>
</div>


@endsection
