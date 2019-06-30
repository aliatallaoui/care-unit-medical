@extends('layouts.templete')

@section('cssprint')
<style>

     @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printSection,
            #printSection * {
                visibility: visible;
            }

            #printSection {
                position: relative;
                left: 0;
                top: -2000;
            }
        }
    .box_general_3 {
        -moz-border-radius: 5px;
        -ms-border-radius: 5px
    }

    .box_general_3 {
        background-color: #fff;
        padding: 30px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        margin-bottom: 15px;
        border: 1px solid #e1e8ed
    }

    .box_general_3 hr {
        margin: 30px -30px
    }
    .booking .title {
        background-color: #0f9185;
        color: #fff;
        margin: -30px -30px 30px;
        padding: 20px 30px;
        border-radius: 5px 5px 0 0
    }

    .booking .title h3 {
        font-size: 28px;
        font-size: 1.75rem;
        margin: 0;
        color: #fff
    }

    .booking .title small {
        font-size: 13px;
        font-size: .8125rem
    }

    .booking hr {
        margin-top: 15px
    }

    .booking ul.treatments {
        margin: 15px 0 0
    }

    .booking ul.treatments li {
        border-top: 1px dotted #ddd;
        border-bottom: 0;
        width: 100%;
        margin: 0;
        padding: 12px 0 5px
    }

    @media(max-width:991px) {
        .box_profile ul.contacts {
            text-align: center
        }

        .booking ul.treatments li {
            width: auto;
            float: none
        }
        .booking .title {
            background-color: #0f9185;
            color: #fff;
            margin: -30px -30px 30px;
            padding: 20px 30px;
            border-radius: 5px 5px 0 0
        }
        .booking .title,
        .box_profile figure {
            -webkit-border-radius: 5px 5px 0 0;
            -moz-border-radius: 5px 5px 0 0;
            -ms-border-radius: 5px 5px 0 0
        }

        .booking .title h3 {
            font-size: 28px;
            font-size: 1.75rem;
            margin: 0;
            color: #fff
        }

        .booking .title small {
            font-size: 13px;
            font-size: .8125rem
        }
        .booking .title,.box_profile figure{-webkit-border-radius:5px 5px 0 0;-moz-border-radius:5px 5px 0 0;-ms-border-radius:5px 5px 0 0}
        #sidebar_detail {
            position: relative;
            top: -240px
        }

        #sidebar_detail #map {
            width: 100%;
            height: 350px;
            border: 5px solid #fff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
            -moz-box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
            margin-bottom: 25px
        }

        .box_form,
        .box_profile {
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px
        }

        #sidebar_detail h2 {
            color: #6d7b84;
            font-size: 18px;
            font-size: 1.125rem
        }
</style>

    @endsection
//@extends('inc.department')

@section('result_recherche')

<div class="container">
    <div class="row justify-content-between  ">

        <div class="col-md-8 pull-left" >

                <div class="box_general_3 booking">
                    <div class="title">
                <h3>information Patient:</h3>
            </div>
            <div class="container-fluid card card-body">
                {!! Form::model($patient,['method'=>'DELETE','action'=>['RendezVousController@destroy',$patient->id],'class'=>'cmxform
                form-horizontal style-form','id'=>'patient-form']) !!}
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                            <h4>{!! Form::label('name', 'Name:', ['style'=>'display:block']) !!}</h4>
                            {{--  <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >  --}}
                            {!! Form::text('name', null, ['class'=>'form-control col-md-8 single-input','readonly']) !!}
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
                            {!! Form::email('email', null, ['class'=>'form-control col-md-8 single-input ','readonly'])
                            !!}
                            @if ($errors)
                            @foreach ($errors->get('email') as $message)
                            @error('email')
                            <div class="help-block">{{ $message }}</div>
                            @enderror
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 pull-left">
                        <div class="form-group {{ $errors->get('date_naissance') ? 'has-error' : 'has-success' }}">

                            <div class="form-group">
                                <h4>{!! Form::label('date_naissance', 'Date_naissance:', ['style'=>'display:block']) !!}
                                </h4>
                                {!! Form::date('date_naissance', null, ['class'=>'form-control single-input
                                col-lg-12','readonly']) !!}
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
                                ['class'=>'form-control single-input col-lg-12','readonly']) !!}

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

                {!! Form::hidden('rendezVous', $rendezVous, ['class'=>'']) !!}
                {!! Form::hidden('etat', 0, ['class'=>'']) !!}
                {!! Form::hidden('service_id', $rendezVous->service_id, ['class'=>'']) !!}
                {!! Form::hidden('doctor_id', $rendezVous->doctor_id, ['class'=>'']) !!}
                {!! Form::hidden('Duree', $rendezVous->Duree, ['class'=>'']) !!}
                {!! Form::hidden('date_rdv', $rendezVous->date_rdv, ['class'=>'']) !!}
                {!! Form::hidden('Heure', $rendezVous->Heure, ['class'=>'']) !!}
                <div class="form-group ">
                    {!! Form::textarea('message', null,
                    ['class'=>'form-control','placeholder'=>'Message','rows'=>7 ,'readonly']) !!}
                    @if ($errors)
                    @foreach ($errors->get('message') as $message)
                    @error('message')
                    <div class="help-block">{{ $message }}</div>
                    @enderror
                    @endforeach
                    @endif
                </div>


            {{--  <input type="checkbox" name="check" class="m-1 mt-3" onchange="document.getElementById('btnvalidation').disabled = !this.checked;" />

             <label for="check" class="m-1 mt-3 text-uppercase"><strong>accept all conditions de utilisation</strong></label>  --}}


                <input type="submit"  class="btn btn-Danger pull-right m-2" value="DELETE">
                {{--  {!! Form::submit('VALIDE', ['class'=>'btn btn-success pull-right m-2 ']) !!}  --}}

                {{--  <input type="submit" class="btn btn-success pull-right m-2" data-toggle="modal" value="Valide">  --}}









                {!! Form::close() !!}

                <button  name="btnvalidation" class="btn btn-success pull-right m-2"  id="btnvalidation" data-toggle ="{{ $modal }}"
            data-target=".bd-example-modal-lg">IMPRIMME</button>
                @include('inc.form-error')
            </div>
        </div></div>

            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    <div class="title">
                        <h3>Votre réservation</h3>
                    </div>
                    <div class="summary">
                        <ul>
                            <li>
                                <p>Votre rendez-vous n''est pas encore confirmé.</p><br>
                            </li>
                            <li><span class="fa fa-calendar fa-2x"></span> Date: <strong class="float-right">
                                   {{ $rendezVous->date_rdv }}</strong></li>
                            <li><span class="fa fa-clock-o fa-2x"></span> Heure: <strong class="float-right">
                                @php
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
                                   {{ $Heure[$rendezVous->Heure] }} </strong></li>
                            <li><span class="fa fa-user-md fa-2x"></span> Dr

                                <strong class="float-right">{{ $rendezVous->doctor->name }}</strong></li>
                        </ul>
                    </div>
                    <ul class="treatments checkout clearfix">
                        <li><span class="fa fa-stethoscope fa-2x"></span>
                            Specialité <strong class="float-right">{{ $rendezVous->doctor->specialite->name }}</strong>
                        </li>
                        {{--  <li><span class="fa fa-map-marker fa-2x"></span>
                            Commune <strong class="float-right">Douera</strong>
                        </li>  --}}

                    </ul>


                </div>
                <!-- /box_general -->
            </aside>
        </div>

</div>










{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}


<!-- Modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
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
                        <img height="auto" width="200" src="{{ asset('images/logo/logo.png') }}" class="pull-right"
                            alt="">
                    </div>
                </div>
            </div>

            @isset($rendezVous)
            <div class="modal-body">
                <div id="printThis">
                    <div class="text-center h2 mt-5">
                        REÇU DEMANDE DE RENDEZ VOUS DE MEDINO <br><br> DATE RENDEZVOUS:{{ $rendezVous->date_rdv }}
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <h3>FULL NAME: {{ $rendezVous->patient->name }} </h3><br>
                            <h3>Date dce naissence: {{ $rendezVous->patient->date_naissance }} </h3><br>
                            <h3>Sexe: {{ $rendezVous->patient->Sexe == '1' ? 'Male' : 'Female'}} </h3><br>
                            <h3>Email: {{ $rendezVous->patient->email }} </h3><br>
                            <h3>Name Doctor: {{ $rendezVous->doctor->name }} </h3><br>
                            <h3>Service: {{ $rendezVous->service->name }} </h3><br>
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
    document.getElementById("btnPrint").onclick = function () {
        printElement(document.getElementById("printThis"));
        //printElement(document.getElementById("printThisToo"), true, "<hr />");
        //window.print();
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
{{--  <script src="{{ asset('js/print.min.js') }}"></script> --}}
@endsection






