@extends('layouts.templete')

//@extends('inc.department')

@section('result_recherche')

<div class="container mb-5  ">

    <div class="row justify-content-between mx-auto card">
        <div class="col-md-12">
            <div class="card-header">
                <h3>take appointment:</h3>
            </div>
            <div class="container-fluid  card-body">
                {!!
                Form::model($RendezVousPatient,['method'=>'POST','action'=>'RendezVousController@recherche','class'=>'cmxform
                form-horizontal style-form ']) !!}
                <div class="row justify-content-between align-items-end">
                    <div class="col-6 col-md-2 col-lg-3">
                        {{ csrf_field() }}

                        <h3>{!! Form::label('date_rdv', 'Check In:', ['style'=>'display:block']) !!}</h3>

                        {!! Form::text('date_rdv', null, ['id'=>'datepicker'
                        ,'class'=>'form-control','placeholder'=>'Select Date','required']) !!}

                    </div>
                    <div class="col-6 col-md-2">
                        <h3>{!! Form::label('Horaire', 'Horaire:', ['style'=>'display:block']) !!}</h3>
                        {!! Form::select('Heure',[''=>'chouse Heure']+$Heure , null,
                        ['id'=>'Horaire','class'=>'form-control','required']) !!}
                    </div>
                    <div class="col-6 col-md-2">
                        <h3> {!! Form::label('service_id', 'Services:', ['style'=>'display:block']) !!}</h3>
                        {!! Form::select('service_id',[''=>'Choise
                        Service']+$servicesRDV,null,['class'=>'form-control','id'=>'service_id','required']) !!}
                    </div>
                    <div class="col-6 col-md-3">



                        {!! Form::submit('Check Availability', ['class'=>'template-btn mt-3
                        col-xm-3','onclick'=>'onclick="this.disabled=true;this.form.submit();"
                        ']) !!}

                        {!! Form::close() !!}
                    </div>

                </div>
                @if (Session::has('Date_invalid'))
                {{--  @if (Session::has('Heure_invalid') || Session::has('date_valid'))
                                {{ session()->forget(['Heure_invalid','date_valid']) }}
                @endif --}}
                <div class="alert alert-danger col-sm-12">
                    {{ session('Date_invalid') }}
                </div>
                @endif
                @if (Session::has('Heure_invalid'))
                {{--  @if (Session::has('Date_invalid') || Session::has('date_valid'))
                                {{ session()->forget(['Date_invalid','date_valid']) }}
                @endif --}}
                <div class="alert alert-warning col-sm-12">
                    {{ session('Heure_invalid') }}
                </div>
                @endif
                @if (Session::has('date_valid'))
                {{--  @if (Session::has('Date_invalid') || Session::has('Heure_invalid'))
                               {{ session()->forget(['Date_invalid', 'Heure_invalid']) }}
                @endif --}}
                <div class="alert alert-success col-sm-12">
                    {{ session('date_valid') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@isset($valid)
@if ($valid)

    <div class="container mt-5">
        <div class="row justify-content-between mx-auto card">
            <div class="col-md-12">
                <div class="card-header">
                    <h3>information Patient:</h3>
                </div>
                <div class="container-fluid  card-body">

                    {!! Form::open(['method'=>'POST','action'=>'RendezVousController@store','class'=>'cmxform
                    form-horizontal style-form','id'=>'patient-form']) !!}
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                                <h4>{!! Form::label('name', 'Name:', ['style'=>'display:block']) !!}</h4>
                                {{--  <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >  --}}
                                {!! Form::text('name', null, ['class'=>'form-control col-md-8 single-input','required']) !!}
                                @if ($errors)
                                @foreach ($errors->get('name') as $message)
                                @error('name')
                                <div class="help-block">{{ $message }}</div>
                                @enderror
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group {{ $errors->get('email') ? 'has-error' : 'has-success' }}">
                                <h4>{!! Form::label('email', 'Email:', ['style'=>'display:block']) !!}</h4>
                                {!! Form::email('email', null, ['class'=>'form-control col-md-8 single-input ','required'])
                                !!}
                                @if ($errors)
                                @foreach ($errors->get('email') as $message)
                                @error('email')
                                <div class="help-block">{{ $message }}</div>
                                @enderror
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group {{ $errors->get('doctor_id') ? 'has-error' : 'has-success' }}">

                                <div class="form-group">
                                    <h4>{!! Form::label('d', 'Name Doctor:', ['style'=>'display:block']) !!}</h4>
                                    {!! Form::select('doctor_id', [''=>'choise doctor']+$doctorsRDV,null,
                                    ['class'=>'form-control single-input col-lg-8','required']) !!}



                                    @if ($errors)
                                    @foreach ($errors->get('doctor_id') as $message)
                                    @error('doctor_id')
                                    <div class="help-block">{{ $message }}</div>
                                    @enderror
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 pull-left">
                            <div class="form-group {{ $errors->get('date_naissance') ? 'has-error' : 'has-success' }}">

                                <div class="form-group">
                                    <h4>{!! Form::label('date_naissance', 'Date_naissance:', ['style'=>'display:block']) !!}
                                    </h4>
                                    {!! Form::date('date_naissance', null, ['class'=>'form-control single-input
                                    col-lg-12','required']) !!}
                                    @if ($errors)
                                    @foreach ($errors->get('date_naissance') as $message)
                                    @error('date_naissance')
                                    <div class="help-block">{{ $message }}</div>
                                    @enderror
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->get('sexe') ? 'has-error' : 'has-success' }}">

                                <div class="form-group">
                                    <h4>{!! Form::label('sexe', 'Sexe:', ['style'=>'display:block']) !!}</h4>
                                    {!! Form::select('sexe', [''=>'choise Sexe','1'=>'male','2'=>'femele'],null,
                                    ['class'=>'form-control single-input col-lg-12','required']) !!}



                                    @if ($errors)
                                    @foreach ($errors->get('sexe') as $message)
                                    @error('sexe')
                                    <div class="help-block">{{ $message }}</div>
                                    @enderror
                                    @endforeach
                                    @endif
                                </div>
                            </div>


                        </div>

                    </div>

                    <br>


                    <div class="form-group ">
                        {!! Form::textarea('message', null,
                        ['class'=>'form-control','placeholder'=>'Message','rows'=>7,'required' ]) !!}
                        @if ($errors)
                        @foreach ($errors->get('message') as $message)
                        @error('message')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                        {{--  <textarea name="message" cols="20" rows="7"  placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" ></textarea>  --}}
                    </div>

                    {!! Form::hidden('Heure', $RendezVousPatient->Heure, ['class'=>'']) !!}
                     {!! Form::hidden('date_rdv', $RendezVousPatient->date_rdv, ['class'=>'']) !!}
                      {!! Form::hidden('Duree', $RendezVousPatient->Duree, ['class'=>'']) !!}

                    @if (isset($service))
                    {!! Form::hidden('service_id',$service->id, ['class'=>'']) !!}
                    @endif

                    {!! Form::hidden('etat', 0, ['class'=>'']) !!}




                    {!! Form::submit('Submit', ['class'=>'template-btn']) !!}


                    {!! Form::close() !!}


                    @include('inc.form-error')

                </div>
            </div>
        </div>
    </div>







@if (isset($doctors_Dis))
<section class="specialist-area section-top">
    <div class="container">

        <div class="col-lg-6 offset-lg-3">
            <div class=" text-center">
                <h3 id="doctors_Dis" class="btn btn-success ">Show All Doctors Disponible</h3>
            </div>
        </div>
        <div class="doctors_card">


            <div class="row">
                @foreach ($doctors_Dis as $doctor)

                <div class="col-lg-3 col-sm-6">

                    <div class="single-doctor mb-4 mb-lg-0">
                        <div class="doctor-img">

                            <img src={{ asset('images/doctor1.jpg') }} alt="" class="img-fluid">
                        </div>
                        <div class="content-area">

                                <div class="doctor-name text-center">
                                    <h3>{{ str_limit($service->name,8) }}</h3>
                                    <h3>{{ $doctor->name }}</h3>
                                    <h5>{{ $doctor->specialite->name }}</h5>
                                </div>

                            <div class="doctor-text text-center">
                                <p>{{ str_limit($service->content,20) }}</p>



                                <ul class="doctor-icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
 @endif
 @endisset

@endsection

@section('services')
@endsection


@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <script>
        $('#doctors_Dis').click(function() {
            $('.doctors_card').hide();
        });
    </script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".doctors_card").hide();
        $("#doctors_Dis").click(function () {
            $(".doctors_card").toggle();
        });
    });
</script>
@endsection
