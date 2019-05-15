@extends('layouts.admin')
@section('content')
<h1>Specialites</h1>
@if (Session::has('Deleted_specialite'))
<div class="alert alert-danger col-sm-12">
    {{ session('Deleted_specialite') }}
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt ">
            <div class="form-panel">
                <h4><i class="fa fa-plus"></i>Create Specialites</h4>
                <hr>
                {!!
                Form::model($specialite,['method'=>'PATCH','action'=>['SpecialiteController@update',$specialite->id],'class'=>'cmxform
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

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-1">
                        {!! Form::submit('Save', ['class'=>'btn btn-theme']) !!}
                    </div>

                {!! Form::close() !!}
                {!! Form::model($specialite,['method'=>'DELETE','action'=>['SpecialiteController@destroy',$specialite],'class'=>'']) !!}

                    <div class="col-lg-offset-2 col-lg-1">
                        {!! Form::submit('Delete', ['class'=>'btn btn-theme04']) !!}
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
        </div>
        <!-- /col-md-6 -->
        <div class="col-md-6 mt">
            <div class="content-panel">
                <table class="table table-hover">
                    <h4><i class="fa fa-angle-right"></i>All Specialites</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($specialites)
                        @foreach ($specialites as $specialite)
                        <tr>
                            <td>{{ $specialite->id }}</td>
                            <td><a href="{{ route('specialites.edit',$specialite->id) }}">{{ $specialite->name }}</a>
                            </td>
                            <td>{{ $specialite->created_at->diffForHumans() }}</td>
                            <td>{{ $specialite->updated_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                        @else
                        <td>non specialites</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /col-md-6 -->
@endsection
