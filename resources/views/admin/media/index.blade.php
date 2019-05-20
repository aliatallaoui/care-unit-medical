@extends('layouts.admin')

@section('content')
    <h1>Admin patients</h1>
    @if ($photos)
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
                    <th><i class=" fa fa-user-o"></i>  Photo</th>
                    <th><i class=" fa fa-clock-o"></i>  Created_at</th>
                    <th><i class=" fa fa-clock-o"></i>  Updated_at</th>
                    <th><i class=" fa fa-Edit"></i> Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr class="table-success">
                            <td><a href="#">{{ $photo->id }}</a></td>
                            <td><img height="75px" src="{{ $photo->file }}" alt=""></td>
                            <td>{{ $photo->created_at->diffForHumans() }}</td>
                            <td>{{ $photo->updated_at->diffForHumans() }}</td>
                            <td>

                                {!! Form::open(['method'=>'DELETE','action'=>['PhotoController@destroy',$photo->id]]) !!}

                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                                {!! Form::close() !!}

                            </td>

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
