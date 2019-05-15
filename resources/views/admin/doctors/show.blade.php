@extends('layouts.admin')
@section('content')
<div class="col-lg-12 mt">
    <div class="row mt content-panel">

        <!-- /col-md-4 -->
        <div class="col-md-6 col-md-offset-1 profile-text">
            <h3>{{ $doctor->name }}</h3>
            <h6 class="btn btn-xs btn-{{ $doctor->etat == 1 ? 'success' : 'danger' }}">{{ $doctor->etat == 1 ? 'Active' : 'not Active' }}</h6>
                <h4>Name: {{ $doctor->name }}</h4>
                <h4>Email:</h4>
                <h4>Phone Number:</h4>
                <h4>Etat:</h4>
                <h4>Create_at:</h4>
                <h4>updated_at:</h4>

            <br>
            <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
        </div>
        <!-- /col-md-6 -->
        <div class="col-md-4 mt  centered">
            <div class="profile-pic">
                <p><img src="/{{ $doctor->photo->file }}" class="img-circle"></p>
                <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                    <button class="btn btn-theme02">Add</button>
                </p>
            </div>
        </div>
        <!-- /col-md-4 -->
    </div>
    <!-- /row -->
</div>

@endsection
