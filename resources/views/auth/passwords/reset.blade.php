@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

                <div class="text-center">
                    <img src="{{ asset('img/illustrations/scale.svg') }}" alt="..." class="img-fluid">
                </div>

            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

                <h1 class="display-4 text-center mb-3">
                    Passwort zurücksetzen
                </h1>

                <p class="text-muted text-center mb-5">
                    {{ env('APP_NAME') }} - {{ env('APP_VERSION') }}
                </p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

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

                        <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label>Passwort wiederholen</label>

                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
                    </div>

                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        Passwort zurücksetzen
                    </button>

                    <div class="text-center">
                        <small class="text-muted text-center">
                            <a href="{{ route('login.request') }}">Einloggen?</a>
                        </small>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
