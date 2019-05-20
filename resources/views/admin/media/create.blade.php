@extends('layouts.admin')

@section('style')

    <link href="{{ asset('admin/css/dropzone.css') }}" rel="stylesheet">

@endsection



@section('content')



        <h3><i class="fa fa-angle-right"></i> Dropzone File Upload</h3>
        <div class="row mt">
          <div class="white-panel mt">
            <div class="panel-body">
                {!! Form::open(['method'=>'POST','action'=>'PhotoController@store','class'=>'dropzone','id'=>'my-awesome-dropzone']) !!}


               {!! Form::close() !!}
            </div>
          </div>
        </div>









@endsection

@section('scripts')

    <script src="{{ asset('admin/js/dropzone.js') }}"></script>

@endsection
