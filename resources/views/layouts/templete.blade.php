<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Medino</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}" type="image/x-icon">

    <!-- CSS Files -->
    <link href="{{ asset('css/lib.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate-3.7.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-4.7.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-4.1.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--  <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">  --}}


</head>
<body>
{{--      <!-- Preloader Starts -->  --}}
    @include('inc.preloader')
{{--      <!-- Preloader End -->  --}}

    {{--  <!-- Header Area Starts -->  --}}
    @include('inc.header')
    {{--  <!-- Header Area End -->  --}}

    {{--  <!-- Banner Area Starts -->  --}}


    {{--  <!-- Footer Area Starts -->  --}}
    @include('inc.footer')
    {{--  <!-- Footer Area End -->  --}}


    {{--  <!-- Javascript -->  --}}

    {{--  <script src="{{ asset('js/lib.js') }}" defer></script>  --}}

    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/bootstrap-4.1.3.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/wow.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/owl-carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/jquery.datetimepicker.full.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/jquery.nice-select.min.js') }}" defer></script>
    <script src="{{ asset('js/vendor/superfish.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    {{--
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>
    --}}

</body>
</html>
