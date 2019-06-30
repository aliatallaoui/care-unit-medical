@extends('layouts.templete')

@section('cssprint')
    {{--  <link href="{{ asset('css/print.min.css') }}" rel="stylesheet">  --}}
    <style>
        @media screen {
        #printSection {
            display: none;
        }
        }

        @media print {
        body * {
            visibility:hidden;
        }
        #printSection, #printSection * {
            visibility:visible;
        }
        #printSection {
            position:absolute;
            left:150;
            top:400;
        }
        }
</style>
@endsection
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
                        {!! Form::select('Heure',[''=>'chouse Heure']+$Heure  , null,
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

                    {!! Form::open(['method'=>'POST','action'=>'RendezVousController@valideRendezVous','class'=>'cmxform
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
                                    @isset($doctorsRDV)
                                        @if (count($doctorsRDV) > 0)
                                            {!! Form::select('doctor_id', [''=>'choise doctor']+$doctorsRDV,null,
                                    ['class'=>'form-control single-input col-lg-8','required']) !!}
                                    @if ($errors)
                                    @foreach ($errors->get('doctor_id') as $message)
                                    @error('doctor_id')
                                    <div class="help-block">{{ $message }}</div>
                                    @enderror
                                    @endforeach
                                    @endif
                                        @else
                                            {!! Form::select('doctor_id', [''=>'choise doctor'],null,
                                    ['class'=>'form-control single-input col-lg-8','required']) !!}
                                        @endif
                                    @if ($errors)
                                    @foreach ($errors->get('doctor_id') as $message)
                                    @error('doctor_id')
                                    <div class="help-block">{{ $message }}</div>
                                    @enderror
                                    @endforeach
                                    @endif
                                    @endisset

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
                    @isset($RendezVousPatient)
                        {!! Form::hidden('Heure', $RendezVousPatient->Heure, ['class'=>'']) !!}
                     {!! Form::hidden('date_rdv', $RendezVousPatient->date_rdv, ['class'=>'']) !!}
                      {!! Form::hidden('Duree', $RendezVousPatient->Duree, ['class'=>'']) !!}
                    @endisset


                        {{--
                            {!! Form::hidden('RendezVousPatient[]', $RendezVousPatient, ['class'=>'']) !!}
                            {!! Form::hidden('doctors_Dis[]', $doctors_Dis, ['class'=>'']) !!}
                            {!! Form::hidden('Heure[]', $Heure, ['class'=>'']) !!}
                            {!! Form::hidden('doctorsRDV[]', $doctorsRDV->Duree, ['class'=>'']) !!}
                            {!! Form::hidden('servicesRDV[]', $servicesRDV, ['class'=>'']) !!}
                         --}}

                    @if (isset($service))
                    {!! Form::hidden('service_id',$service->id, ['class'=>'']) !!}
                    @endif

                    {!! Form::hidden('etat', 0, ['class'=>'']) !!}

                    <a href="" class="btn btn-Danger pull-right m-2 ">CANCEL</a>



                    {{--  {!! Form::submit('VALIDE', ['class'=>'btn btn-success pull-right m-2 ']) !!}  --}}
                    <input type="submit" class="btn btn-success pull-right m-2" data-toggle="modal"  value="Valide">
                    {{--  <button type="submit" {{ $enable }}  class="btn btn-success pull-right m-2" data-toggle="modal" data-target=".bd-example-modal-lg">IMPRIMME</button>  --}}




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
                <h3 id="doctors_Dis" class="btn btn-default ">Show All Doctors Disponible</h3>
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
                                    {{-- <h3>{{ str_limit($service->name) }}</h3> --}}
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





{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}


<!-- Modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">RendezVous </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 ">
                        <img height="auto" width="200" src="{{ asset('images/logo/logo.png') }}" class="pull-right"  alt="">
                    </div>
                </div>
            </div>

            @isset($rendez)
            <div class="modal-body">
                <div id="printThis">
                    <div class="text-center h2 mt-5">
                        REÇU DEMANDE DE RENDEZ VOUS DE MEDINO <br><br> DATE RENDEZVOUS:{{ $rendez->date_rdv }}
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <h3>FULL NAME: {{ $rendez->patient->name }} </h3><br>
                            <h3>Date dce naissence: {{ $rendez->patient->date_naissance }} </h3><br>
                            <h3>Sexe: {{ $rendez->patient->Sexe == '1' ? 'Male' : 'Female'}} </h3><br>
                            <h3>Email: {{ $rendez->patient->email }} </h3><br>
                            <h3>Name Doctor: {{ $rendez->doctor->name }} </h3><br>
                            <h3>Service: {{ $rendez->service->name }} </h3><br>
                        </div>
                    </div>
                    <div class="row  mt-5">
                        <div class="col-md-12   mt-5 ">
                            <svg class="barcode pull-right" jsbarcode-value="{{ $BarCode }}" jsbarcode-textmargin="1"
                                jsbarcode-fontoptions="bold">
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnPrint" class="btn btn-primary">IMPRIME</button>
            </div>
        </div>
    </div>
</div>

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
<script src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
<script>

    JsBarcode(".barcode").init();
    document.getElementById("btnPrint").onclick = function() {
            printElement(document.getElementById("printThis"));
            //printElement(document.getElementById("printThisToo"), true, "<hr />");
            window.print();
        }
        function printElement(elem, append, delimiter) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            if (append !== true) {
                $printSection.innerHTML = "";
            } else if (append === true) {
                if (typeof (delimiter) === "string") {
                    $printSection.innerHTML += delimiter;
                } else if (typeof (delimiter) === "object") {
                    $printSection.appendChlid(delimiter);
                }
            }

            $printSection.appendChild(domClone);
            window.print();
        }
    $(document).ready(function () {
        $(".doctors_card").hide();
        $("#doctors_Dis").click(function () {
            $(".doctors_card").toggle();
        });
    });
</script>
{{--  <script src="{{ asset('js/print.min.js') }}"></script>  --}}
@endsection
