@extends('layouts.templete')


{{--  <!-- Banner Area Starts -->  --}}
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Our doctors</h1>
                    <a href="index.html">Home</a> <span>|</span> <a href="doctors.html">Doctors</a>
                </div>
            </div>
        </div>
    </section>
{{--      <!-- Banner Area End -->  --}}

@include('inc.Specialist')

@include('inc.hotline')

{{--  <!-- News Area Starts -->  --}}
@include('inc.news')
{{--  <!-- News Area Starts -->  --}}
