{{--  <!-- Banner Area Starts -->  --}}
<section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                @if (Session::has('create_rdv_ok'))
                <div class="alert alert-success col-sm-12">
                    {{ session('create_rdv') }}
                </div>
                @endif
                @if (Session::has('create_rdv_fail'))
                <div class="alert alert-danger col-sm-12">
                    {{ session('create_rdv_fail') }}
                </div>
                @endif
                <h4>Caring for better life</h4>
                <h1>Leading the way in medical excellence</h1>
                <p>Earth greater grass for good. Place for divide evening yielding them that. Creeping beginning over
                    gathered brought.</p>
                {{--  <a href="{{ route('rendezvous.index') }}" class="template-btn mt-3">take appointment</a> --}}
            </div>
        </div>

    </div>
    <div class="container col-8 mt-5 p-1 card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-header">
            <h3>take appointment:</h3>
        </div>
        <div class="container-fluid mt-1 card-body">
            {!! Form::open(['method'=>'POST','action'=>'RendezVousController@recherche','class'=>'cmxform
            form-horizontal style-form ']) !!}
            <div class="row justify-content-between align-items-end">
                <div class="col-6 col-md-2 col-lg-3">

                    {!! Form::label('date_rdv', 'Check In:', ['style'=>'display:block']) !!}

                    {!! Form::text('date_rdv', null, ['id'=>'datepicker' ,'class'=>'form-control']) !!}

                </div>

                <div class="col-6 col-md-2">
                    {!! Form::label('Horaire', 'Horaire:', ['style'=>'display:block']) !!}
                    {!! Form::select('Heure', [
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

                    ], null, ['id'=>'Horaire','class'=>'form-control']) !!}

                </div>

                <div class="col-6 col-md-2">
                    {!! Form::label('service_id', 'Services:', ['style'=>'display:block']) !!}
                    {!! Form::select('service_id',[''=>'Choise
                    Service']+$servicesRDV,null,['class'=>'form-control']) !!}
                </div>

                {{--  <div class="col-4 col-md-1">
                        <label for="room">Room</label>
                        <select name="room" id="room" class="form-control">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                        </select>
                    </div>  --}}
                {{--  <div class="col-4 col-md-1">
                        <label for="adults">Adult</label>
                        <select name="adults" id="adults" class="form-control">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                        </select>
                    </div>  --}}
                {{--  <div class="col-4 col-md-2 col-lg-1">
                        <label for="children">Children</label>
                        <select name="children" id="children" class="form-control">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                        </select>
                    </div>  --}}
                <div class="col-6 col-md-3">

                    {!! Form::submit('Check Availability', ['class'=>'template-btn mt-3']) !!}

                    {!! Form::close() !!}

                </div>
            </div>




        </div>
    </div>


</section>

{{--      <!-- Banner Area End -->  --}}
