@extends('layouts.templete')

@section('result_recherche')

    <br><br><br><br><br><br>
    <div class="container mb-5  ">

    <div class="row justify-content-between mx-auto card">
        <div class="col-md-12">
            <div class="card-header">
                <h3>take appointment:</h3>
            </div>
            <div class="container-fluid  card-body">
                    {!!
                Form::open(['method'=>'POST','action'=>'RendezVousController@chercher','class'=>'cmxform
                form-horizontal style-form ']) !!}
                <div class="row justify-content-between align-items-end">
                    <div class="col-6 col-md-2 col-lg-3">
                        {{ csrf_field() }}

                        <h3>{!! Form::label('date_rdv', 'Check In:', ['style'=>'display:block']) !!}</h3>

                        {!! Form::text('date_rdv', null, ['id'=>'datepicker'
                        ,'class'=>'form-control','placeholder'=>'Select Date','required']) !!}

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
    <section class="welcome-area section-padding3">
    <div class="container">

            @isset($doctors )
            @foreach ($doctors as $doctor)
            <div class="row">
            <div class="col-lg-4 align-self-center">
                <div class=" welcome-text doctor-text">
                    <img src="{{ asset('images/homme.svg') }}" class=""  alt="">
                    {{--  <div class="doctor-text text-center">
                        <p>{{ str_limit($service->content,20) }}</p>

                        <ul class="doctor-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                        </ul>
                    </div>  --}}
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="welcome-text doctor-text  mt-5 mt-lg-0">
                    <h2>{{ $doctor->name }}</h2>
                    <p class="pt-3">{{ $doctor->specialite->name }}</p>
                    <p>
                        @php
                            $tombe = false;
                            $indice = $doctor->HeureDisponible($date_rdv);
                            $Heure = [
                                '0'=>'08:00 At 08:30',
                                '1'=>'08:30 At 09:00',
                                '2'=>'09:00 At 09:30',
                                '3'=>'09:30 At 10:00',
                                '4'=>'10:00 At 10:30',
                                '5'=>'10:30 At 11:00',
                                '6'=>'11:00 At 11:30',
                                '7'=>'11:30 At 12:00',
                                '8'=>'12:00 At 12:30',
                                '9'=>'12:30 At 13:00',
                                '10'=>'13:00 At 13:30',
                                '11'=>'13:30 At 14:00',
                                '12'=>'14:00 At 14:30',
                                '13'=>'14:30 At 15:00'
                                ];
                        @endphp

                        @foreach ($Heure as $key => $H)
                            {!! Form::open(['method'=>'POST','action'=>'RendezVousController@valideRendezVous','class'=>'cmxform
                                    style-form ']) !!}

                            {!! Form::hidden('date_rdv', $date_rdv, ['class'=>'']) !!}
                            {!! Form::hidden('Heure', $key, ['class'=>'']) !!}
                            {!! Form::hidden('doctor_id', $doctor->id, ['class'=>'']) !!}
                            {!! Form::hidden('date_rdv', $date_rdv, ['class'=>'']) !!}
                            {!! Form::hidden('service_id', $service->id, ['class'=>'']) !!}
                            @foreach ($indice as $item => $index)
                                @if ($key == $index)
                                    {!! Form::submit( $H , ['class'=>'btn  btn-default   pull-left m-1 btn-sm','Disabled']) !!}
                                    {!! Form::close() !!}
                                    @php
                                    $tombe = true;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($tombe)
                                 @php
                                    $tombe = false;
                                @endphp

                            @else
                                {!! Form::submit( $H , ['class'=>'btn  btn-primary   pull-left m-1 btn-sm']) !!}
                                {!! Form::close() !!}

                            @endif
                        @endforeach
                    </p>
                    {{--  <a href="#" class="btn-succusse  mt-3">learn more</a>  --}}
                </div>
            </div>
            </div>
            @endforeach
            @endisset

    </div>
</section>
@endsection







