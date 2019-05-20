@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-fullcalendar.css') }}">
@endsection


@section('content')
<h1>Gerer Tache Services</h1>
@if (Session::has('delete_resource'))
<div class="alert alert-danger col-sm-12">
    {{ session('delete_resource') }}
</div>
@endif
@if (Session::has('create_resource'))
<div class="alert alert-success col-sm-12">
    {{ session('create_resource') }}
</div>
@endif
@if (Session::has('update_resource'))
<div class="alert alert-info col-sm-12">
    {{ session('update_resource') }}
</div>
@endif



        <h3><i class="fa fa-angle-right"></i> Calendar</h3>
        <!-- page start-->
        <div class="row mt">
          <aside class="col-lg-3 mt">
            <h4><i class="fa fa-angle-right"></i> Draggable Events</h4>
            <div id="external-events">
              <div class="external-event label label-theme">My Event 155</div>
              <div class="external-event label label-success">My Event 2</div>
              <div class="external-event label label-info">My Event 3</div>
              <div class="external-event label label-warning">My Event 4</div>
              <div class="external-event label label-danger">My Event 5</div>
              <div class="external-event label label-default">My Event 6</div>
              <div class="external-event label label-theme">My Event 7</div>
              <div class="external-event label label-info">My Event 8</div>
              <div class="external-event label label-success">My Event 9</div>
              <p class="drop-after">
                <input type="checkbox" id="drop-remove"> Remove After Drop
              </p>
            </div>
          </aside>
          <aside class="col-lg-9 mt">
            <section class="panel">
              <div class="panel-body">
                 @php
                      $calendar->calendar() ;
                 @endphp

              </div>
            </section>
          </aside>
        </div>
        <!-- page end-->





@endsection

@section('scripts')
    <script src="{{ asset('admin/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/calendar-conf-events.js') }}"></script>
@endsection
