@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

                <div class="text-center">
                    <img src="{{ asset('img/illustrations/happiness.svg') }}" alt="..." class="img-fluid">
                </div>

            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

                <h1 class="display-4 text-center mb-3">
                    Anmelden
                </h1>

                <p class="text-muted text-center mb-5">
                    {{ env('APP_NAME') }} - {{ env('APP_VERSION') }}
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">

                        <label>E-Mail</label>

                        <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="name@address.com" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label>Passwort</label>

                        <div class="input-group input-group-merge">

                            <input type="password" name="password" id="password" class="form-control form-control-appended{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" placeholder="Geben Sie Ihr Passwort ein" required>

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" toggle="#password" id="toggle-password"></i>
                                </span>
                            </div>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input{{ $errors->has('remember') ? ' is-invalid' : '' }}" value="{{ old('remember') }}" id="remember" name="remember">
                            <label class="custom-control-label" for="remember">Eingeloggt bleiben</label>
                            @if ($errors->has('remember'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remember') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        Anmelden
                    </button>

                    <div class="text-center">
                        <small class="text-muted text-center">
                            <a href="{{ route('password.request') }}">Passwort vergessen?</a>
                        </small>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        $("#toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
