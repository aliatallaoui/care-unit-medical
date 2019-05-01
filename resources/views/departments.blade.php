@extends('layouts.templete')

{{--  <!-- Banner Area Starts -->  --}}
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Departments</h1>
                    <a href="/">Home</a> <span>|</span> <a href="/departments">Departments</a>
                </div>
            </div>
        </div>
    </section>
{{--      <!-- Banner Area End -->  --}}


@include('inc.feature')

@include('inc.department')

@include('inc.hotline')


