@extends('layouts.admin')

@section('style')


@include('inc.formfilestyle')
<link href="{{ asset('admin/css/zabuto_calendar.css') }}" rel="stylesheet">



@endsection

@section('content')
<!-- /row -->

<div class="row mt   col-lg-12">

    <div class="col-lg-8 text-center">

        <div class="form-panel">
            {!! Form::model($doctor,['method'=>'DELETE','action'=>['DoctorController@destroy',$doctor],'class'=>'']) !!}
                <div class="form-group">
                    <h3 class="text-center "><i class="fa fa-doctor"></i> Edit Doctor {!! Form::submit('Delete', ['class'=>'btn btn-danger pull-right ']) !!}</h3>
                </div>

            {!! Form::close() !!}

            <div class="form">

                {!! Form::model($doctor,['method'=>'PATCH','action'=>['DoctorController@update',$doctor],'files'=>true,'class'=>'cmxform
                form-horizontal style-form']) !!}
                <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('name', 'Name:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        @if ($errors)
                        @foreach ($errors->get('name') as $message)
                        @error('name')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->get('specialite_id') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('specialite_id', 'Specialite:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('specialite_id', [''=>'choose options']+$specialites, null,
                        ['class'=>'form-control'])
                        !!}
                        @if ($errors)
                        @foreach ($errors->get('specialite_id') as $message)
                        @error('specialite_id')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->get('etat') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('etat', 'Status:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('etat', [''=>'choose options','1'=>'Active','0'=>'not Active'], null,
                        ['class'=>'form-control']) !!}
                        @if ($errors)
                        @foreach ($errors->get('etat') as $message)
                        @error('etat')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->get('phone_number') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('phone_number', 'phone_number:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('phone_number',null ,['class'=>'form-control']) !!}
                        @if ($errors)
                            @foreach ($errors->get('phone_number') as $message)
                                @error('phone_number')
                                    <div class="help-block">{{ $message }}</div>
                                @enderror
                            @endforeach
                        @endif
                    </div>
                </div>
                @if (count($services)>0)
                    <div class="form-group {{ $errors->get('service_id') ? 'has-error' : 'has-success' }}">
                        {!! Form::label('service_id', 'Services:', ['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('service_id[]',
                            $services,
                            $doctor->services->pluck('id')->toArray(),
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
                @endif
                <div class="form-group  {{ $errors->get('photo_id') ? 'has-error' : 'has-success' }} ">
                    <label class="control-label col-md-3">Image Upload</label>
                    <div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ $doctor->photo ? "../../".$doctor->photo->file : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image' }}" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail"
                                style="max-width: 200px; max-height: 150px; line-height: 20px;">
                            </div>
                            @if ($errors)
                            @foreach ($errors->get('photo_id') as $message)
                            @error('photo_id')
                            <div class="help-block">{{ $message }}</div>
                            @enderror
                            @endforeach
                            @endif
                            <div>
                                <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i>
                                        Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i>
                                        Change</span>
                                    {!! Form::file('photo_id',null,['class'=>'default']) !!}

                                </span>
                                <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists"
                                    data-dismiss="fileupload"><i class="fa fa-trash-o"></i>
                                    Remove</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {!! Form::submit('Save', ['class'=>'btn btn-theme']) !!}
                        <button class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            @include('inc.form-error')
        </div>
        <!-- /form-panel -->

    </div>

    <div class="col-md-4 mb">
        <div class="weather pn">
            <i class="fa fa-cloud fa-4x"></i>
            <h2>11º C</h2>
            <h4>BUDAPEST</h4>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- CALENDAR-->
        <div id="calendar" class="mb">
            <div class="panel green-panel no-margin">
                <div class="panel-body">
                    <div id="date-popover" class="popover top"
                        style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                        <div class="arrow"></div>
                        <h3 class="popover-title" style="disadding: none;"></h3>
                        <div id="date-popover-content" class="popover-content"></div>
                    </div>
                    <div id="my-calendar"></div>
                </div>
            </div>
        </div>
        <!-- / calendar -->
    </div>


    <!-- /col-lg-12 -->
</div>



@endsection

@section('scripts')

@include('inc.formfilescripts')

<script src="{{ asset('admin/js/zabuto_calendar.js') }}"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

@endsection
