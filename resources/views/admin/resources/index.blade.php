@extends('layouts.admin')
@section('content')
<h1>Resources</h1>
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
        <div class="col-md-6 mt ">
            <div class="form-panel">
                <h4><i class="fa fa-plus"></i>Create Resource</h4>
                <hr>
                {!! Form::open(['method'=>'POST','action'=>'ResourceController@store','class'=>'cmxform
                form-horizontal style-form']) !!}
                <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('name', 'Name:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                        @if ($errors)
                        @foreach ($errors->get('name') as $message)
                        @error('name')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->get('stock') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('stock', 'Stock:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::number('stock', 0, ['class'=>'form-control','required','min'=>0]) !!}
                        @if ($errors)
                        @foreach ($errors->get('stock') as $message)
                        @error('stock')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->get('service_id') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('service_id', 'Services:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('service_id[]',
                        $services,
                         null,
                        ['class'=>'form-control',
                        'multiple'=>'multiple'
                        ])
                        !!}
                        <span class="help-block">Press <a id="add-without-image" class="btn btn-default  btn-sm" href="javascript:;">ctrl</a> for multiple selection</span>
                        @if ($errors)
                        @foreach ($errors->get('service_id') as $message)
                        @error('service_id')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>

                {!! Form::hidden('etat', null,['class'=>'']) !!}

                {{--  <div class="form-group {{ $errors->get('etat') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('etat', 'Status:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('etat', [''=>'choose options','1'=>'reserved','0'=>'Not Reserved'], null,
                        ['class'=>'form-control']) !!}
                        @if ($errors)
                        @foreach ($errors->get('etat') as $message)
                        @error('etat')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>  --}}

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {!! Form::submit('Save', ['class'=>'btn btn-theme']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <!-- /col-md-6 -->
        <div class="col-md-6 mt">
            <div class="content-panel mt">
                <table class="table table-hover">
                    <h4><i class="fa fa-angle-right"></i>All Resources</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Etat</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($resources)
                            @foreach ($resources as $resource)
                                <tr>
                                    <td>{{ $resource->id }}</td>
                                    <td><a href="{{ route('resources.edit',$resource) }}">{{ $resource->name }}</a></td>
                                    <td><a href="{{ route('resources.edit',$resource) }}">{{ $resource->stock }}</a></td>
                                    <td>
                                        <a href="{{ route('resources.edit',$resource) }}"><strong>
                                            <span class="btn btn-{{ $resource->etat == 0 ? 'success' : 'danger' }} btn-xs">
                                                {{ $resource->etat == 0 ? 'Not Reserved' : 'Reserved' }}
                                            </span>
                                        </strong></a>
                                    </td>
                                    <td>{{ $resource->created_at->diffForHumans() }}</td>
                                    <td>{{ $resource->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @else
                            <td>non resources</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /col-md-6 -->
@endsection
