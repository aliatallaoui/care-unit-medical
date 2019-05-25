{{--  <!-- Department Area Starts -->  --}}
<section class="department-area section-padding4">
    <div class="container">
        {{--  <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Choice Our Service</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>  --}}

        <div class="row ">


            @yield('form')


        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="department-slider owl-carousel">
                    @yield('services',View::make('inc.servicedefault'))

                </div>
            </div>
        </div>
    </div>
</section>
{{--      <!-- Department Area Starts -->  --}}
