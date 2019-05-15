@extends('layouts.admin')
@section('content')
    <h1>Admin patients</h1>
    @if ($patients)
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
              <table class="table  table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Table patients</h4>

                @if (Session::has('create_patient'))
                    <div class="alert alert-success col-sm-12">
                        {{ session('create_patient') }}
                    </div>
                @endif
                @if (Session::has('update_patient'))
                    <div class="alert alert-info col-sm-12">
                        {{ session('update_patient') }}
                    </div>
                @endif
                @if (Session::has('delete_patient'))
                    <div class="alert alert-danger col-sm-12">
                        {{ session('delete_patient') }}
                    </div>
                @endif

                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> id </th>
                    <th><i class=" fa fa-user-o"></i>  Name</th>
                    <th><i class=" fa fa-envelope"></i> Email</th>
                    <th><i class=" fa fa-graduation-cap"></i>Date Naissance</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th><i class="fa fa-user"></i> profile</th>
                    <th><i class=" fa fa-clock-o"></i>  Created_at</th>
                    <th><i class=" fa fa-clock-o"></i>  Updated_at</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr class="table-success">
                            <td><a href="#">{{ $patient->id }}</a></td>
                            <td><a href="{{ route('patients.edit',$patient) }}">{{ $patient->name }}</a></td>
                            <td><b>{{ $patient->email }}</b></td>
                            <td>{{ $patient->date_naissance }}</td>
                            <td><strong><span class="btn btn-{{ $patient->etat == 1 ? 'success' : 'danger' }} btn-xs">{{ $patient->etat == 1 ? 'Acive' : 'not Active' }}</span></strong>                                <a href="{{ route('patients.edit',$patient) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
</td>
                            <td>

                                <a href="{{ route('patients.edit',$patient) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                {{-- <a href="{{ route('patients.destroy',$patient->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> --}}
                            </td>
                            <td>{{ $patient->created_at->diffForHumans() }}</td>
                            <td>{{ $patient->updated_at->diffForHumans() }}</td>
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
