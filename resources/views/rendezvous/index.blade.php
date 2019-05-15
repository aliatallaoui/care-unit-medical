@extends('layouts.templete')

@extends('inc.department')

@section('service')

    @if ($services)

    @foreach ($services as $service)


    <div class="single-slide">
        <div class="slide-img">

                <a href=""><img src='{{ $service->photo ? $service->photo->file : '' }}'  alt="" class="img-fluid"></a>
                <div class="hover-state">
                    <a href="#"><i class="fa fa-stethoscope"></i></a>
                </div>
            </div>
            <div class="single-department item-padding text-center">
                <a href="services/create/{{ $service->id }}"><h3>{{ $service->name }}</h3></a>
                <p>{{ $service->content }}</p>
            </div>
        </div>

        @endforeach
    @endif

@endsection


