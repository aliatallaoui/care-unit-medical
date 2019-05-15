@extends('layouts.templete')

@extends('inc.patient')

@section('form')
<h3 class="mb-5">appointment now</h3>
<h3 class="mb-5">Service: {{ $service->name }}</h3>
{{--  {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true,'class'=>'cmxform
                form-horizontal style-form']) !!}
                <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('name', 'Name:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class'=>'form-control ']) !!}
                        @if ($errors)
                        @foreach ($errors->get('name') as $message)
                        @error('name')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->get('email') ? 'has-error' : 'has-success' }} ">
                    {!! Form::label('email', 'Email:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                        @if ($errors)
                        @foreach ($errors->get('email') as $message)
                        @error('email')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->get('role_id') ? 'has-error' : 'has-success' }}">
                    {!! Form::label('role_id', 'Role:', ['class'=>'control-label col-lg-2']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('role_id', [''=>'choose options']+$roles, null, ['class'=>'form-control'])
                        !!}
                        @if ($errors)
                        @foreach ($errors->get('role_id') as $message)
                        @error('role_id')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>  --}}


         {!! Form::open(['method'=>'POST','action'=>'RendezVousController@store','class'=>'cmxform
                form-horizontal style-form']) !!}
            <div class="form-group {{ $errors->get('name') ? 'has-error' : 'has-success' }}">
                {{--  <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>  --}}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Your Name','required']) !!}
                        @if ($errors)
                        @foreach ($errors->get('name') as $message)
                        @error('name')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
            </div>
            <div class="form-group {{ $errors->get('email') ? 'has-error' : 'has-success' }}">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Your Email','required']) !!}
                        @if ($errors)
                        @foreach ($errors->get('email') as $message)
                        @error('email')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
            </div>


            <div class="form-group {{ $errors->get('date_naissance') ? 'has-error' : 'has-success' }}">

                    <div class="form-group">
                        {!! Form::date('date_naissance', null, ['class'=>'form-control col-lg-12','required']) !!}
                        @if ($errors)
                        @foreach ($errors->get('date_naissance') as $message)
                        @error('date_naissance')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->get('date_rdv') ? 'has-error' : 'has-success' }}">

                    <div class="form-group">
                        {!! Form::date('date_rdv', null, ['class'=>'form-control col-lg-12','required']) !!}
                        @if ($errors)
                        @foreach ($errors->get('date_rdv') as $message)
                        @error('date_rdv')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                    </div>
                </div>



            <br>
            <div class="form-group ">
                {!! Form::textarea('message', null, ['class'=>'form-control','placeholder'=>'Message','rows'=>7,'required' ]) !!}
                        @if ($errors)
                        @foreach ($errors->get('message') as $message)
                        @error('message')
                        <div class="help-block">{{ $message }}</div>
                        @enderror
                        @endforeach
                        @endif
                {{--  <textarea name="message" cols="20" rows="7"  placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>  --}}
            </div>


            {!! Form::hidden('service_id', $service->id, ['class'=>'']) !!}
            {!! Form::hidden('etat', 0, ['class'=>'']) !!}


            {!! Form::submit('appointment', ['class'=>'template-btn']) !!}

            @include('inc.form-error')

        </form>

@endsection
