@extends('layouts.admin')
@section('content')
    <h1>Admin Users</h1>
    @if ($users)
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Table Users</h4>

                @if (Session::has('Deleted_user'))
                    <div class="alert alert-danger col-sm-12">
                        {{ session('Deleted_user') }}
                    </div>
                @endif

                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> id </th>
                    <th><i class=" fa fa-photo"></i>  Photo</th>
                    <th><i class=" fa fa-user-o"></i>  Name</th>
                    <th><i class=" fa fa-envelope"></i> Email</th>
                    <th><i class=" fa fa-graduation-cap"></i>Role</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th><i class="fa fa-user"></i> profile</th>
                    <th><i class=" fa fa-clock-o"></i>  Created_at</th>
                    <th><i class=" fa fa-clock-o"></i>  Updated_at</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="#">{{ $user->id }}</a></td>
                            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}" alt="" ></td>
                            <td><a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></td>
                            <td><b>{{ $user->email }}</b></td>
                            <td>{{ $user->role->name }}</td>
                            <td><strong><span class="label label-{{ $user->isActive == 1 ? 'success' : 'danger' }} label-large">{{ $user->isActive == 1 ? 'Acive' : 'not Active' }}</span></strong></td>
                            <td>
                                {{-- <a href="#" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a> --}}

                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                {{-- <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> --}}
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /content-panel -->

        </div>
        <!-- /col-md-12 -->
        @else

    @endif
    </div>
@endsection
