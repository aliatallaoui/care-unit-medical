@extends('layouts.home')






    @if (count($services)>0)
        @section('services')

            @foreach ($services as $service)

                <div class="single-slide">
                    <div class="slide-img">
                        <a href=""><img src='{{ $service->photo ? $service->photo->file : '' }}'  alt="" class="img-fluid"></a>
                        <div class="hover-state">
                            <a href="#"><i class="fa fa-stethoscope"></i></a>
                        </div>
                    </div>
                    <div class="single-department item-padding text-center">
                        <a href="rendezvous/"><h3>{{ $service->name }}</h3></a>
                        <p>{{ str_limit($service->content,30) }}</p>
                    </div>
                </div>

            @endforeach
        @endsection
    @endif



{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}




{{--      <!-- Banner Area End -->  --}}
