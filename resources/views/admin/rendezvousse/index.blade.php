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
                    <th><i class=" fa fa-photo"></i>  Name Patient</th>
                    <th><i class=" fa fa-user-o"></i>  Eamil</th>
                    <th><i class=" fa fa-photo"></i>  Name Doctor</th>
                    <th><i class=" fa fa-envelope"></i> Phone Number</th>
                    <th><i class=" fa fa-edit"></i> Status Rendezvous</th>
                    <th><i class="fa fa-user"></i> Edit</th>
                    <th><i class=" fa fa-clock-o"></i>  Created_at</th>
                    <th><i class=" fa fa-clock-o"></i>  Updated_at</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($rendes as $rendezvous)
                        <tr>
                            <td><a href="#">{{ $rendezvous->id }}</a></td>
                            <td>{{ $rendezvous- }}</td>
                            <td><a href="{{ route('rendezvouss.edit',$rendezvous) }}">{{ $rendezvous->name }}</a></td>
                            <td><b>{{ $rendezvous->phone_number }}</b></td>
                            <td>{{ $rendezvous->specialite->name }}</td>
                            <td><strong><span class="btn btn-{{ $rendezvous->etat == 1 ? 'success' : 'danger' }} btn-xs">{{ $rendezvous->etat == 1 ? 'Acive' : 'not Active' }}</span></strong></td>
                            <td>
                                {{-- <a href="#" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a> --}}

                                <a href="{{ route('rendezvouss.edit',$rendezvous) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                {{-- <a href="{{ route('rendezvouss.destroy',$rendezvous->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> --}}
                            </td>
                            <td>{{ $rendezvous->created_at->diffForHumans() }}</td>
                            <td>{{ $rendezvous->updated_at->diffForHumans() }}</td>
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
    </div>
</div>


@endsection
