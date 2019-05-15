@extends('layouts.admin')
@section('content')
<h1>Admin Services</h1>
@if ($services)
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Table services</h4>

                @if (Session::has('create_service'))
                <div class="alert alert-success col-sm-12">
                    {{ session('create_service') }}
                </div>
                @endif
                @if (Session::has('update_service'))
                <div class="alert alert-info col-sm-12">
                    {{ session('update_service') }}
                </div>
                @endif
                @if (Session::has('delete_service'))
                <div class="alert alert-danger col-sm-12">
                    {{ session('delete_service') }}
                </div>
                @endif

                <hr>
                <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> id </th>
                        <th><i class=" fa fa-photo"></i> Photo</th>
                        <th><i class=" fa fa-user-o"></i> Name</th>
                        <th><i class=" fa fa-edit"></i>Description</th>
                        <th><i class=" fa fa-pencil"></i> Edit</th>
                        <th><i class=" fa fa-clock-o"></i> Created_at</th>
                        <th><i class=" fa fa-clock-o"></i> Updated_at</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service)
                    <tr>
                        <td><a href="#">{{ $service->id }}</a></td>
                        <td><img height="50"
                                src="{{$service->photo ? $service->photo->file : 'http://placehold.it/50x50'}}" alt="">
                        </td>
                        <td><a href="{{ route('services.edit',$service) }}">{{ $service->name }}</a></td>
                        <td>{{ str_limit($service->content,20) }}</td>
                        <td>
                            <a href="{{ route('services.edit',$service) }}" class="btn btn-primary btn-xs"><i
                                    class="fa fa-pencil"></i> Edit
                            </a>

                        </td>
                        <td>{{ $service->created_at->diffForHumans() }}</td>
                        <td>{{ $service->updated_at->diffForHumans() }}</td>
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


    @endif
</div>
@endsection
