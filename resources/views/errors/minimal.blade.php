@extends('layouts.auth')

@section('content')

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

                <div class="text-center">
                    <img src="{{ asset('img/illustrations/coworking.svg') }}" alt="#asd" class="img-fluid">
                </div>

            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

                <div class="text-center">

                    <h6 class="display-2 text-uppercase text-muted mb-3">
                        @yield('code')
                    </h6>

                    <h1 class="display-4 mb-3">
                        😭 @yield('message') 😭
                    </h1>

                    <p class="text-muted mb-4">
                        Sieht aus, als wären Sie zufällig hier gelandet?
                    </p>

                    <a href="{{ url('') }}" class="btn btn-lg btn-primary">
                        Zurück
                    </a>

                </div>

            </div>
        </div>
    </div>

@endsection
