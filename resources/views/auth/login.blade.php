@extends('layouts.app')

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ url('assets/') }}/img/illustrations/boy-with-rocket-light.png" class="img-fluid"
                        alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png"
                        data-app-light-img="illustrations/boy-with-rocket-light.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-3">
                        <img width="150" src="{{url('assets')}}/img/logo.png" class="img-fluid mx-auto" alt="Logo Dux Tracking"/>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 text-center">Bienvenido/a</h4>
                    <p class="mb-4 text-center">Inicia sesión para ingresar</p>

                    <form class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter your email or username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Clave</label>
                                @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}">
                                    <small>{{ __('¿Ovido su contraseña?') }}</small>
                                </a>
                            @endif

                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember-me"> {{ __('Recuerdame') }} </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100"> {{ __('Inicia Sesión') }}</button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
    <!--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
@endsection
