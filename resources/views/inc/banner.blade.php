{{--  <!-- Banner Area Starts -->  --}}
    <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    @if (Session::has('create_rdv'))
                    <div class="alert alert-success col-sm-12">
                        {{ session('create_rdv') }}
                    </div>
                    @endif
                    <h4>Caring for better life</h4>
                    <h1>Leading the way in medical excellence</h1>
                    <p>Earth greater grass for good. Place for divide evening yielding them that. Creeping beginning over gathered brought.</p>
                    <a href="{{ route('rendezvous.index') }}" class="template-btn mt-3">take appointment</a>
                </div>
            </div>
        </div>
    </section>
{{--      <!-- Banner Area End -->  --}}
