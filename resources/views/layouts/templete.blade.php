<!DOCTYPE html>
<html lang="en">
<head>
   @include('inc.head')
   @yield('cssprint')
</head>
<body>
    {{--    <!-- Preloader Starts -->  --}}
    @include('inc.preloader')
    {{--    <!-- Preloader End -->  --}}

    {{--  <!-- Header Area Starts -->  --}}
    @include('inc.header')
    {{--  <!-- Header Area End -->  --}}
    <div class="specialist-area">
        @yield('result_recherche')

    </div>

    {{--  <!-- Footer Area Starts -->  --}}
    @include('inc.footer')
    {{--  <!-- Footer Area End -->  --}}

    @include('inc.scripts')

    @yield('scripts')
</body>
</html>
