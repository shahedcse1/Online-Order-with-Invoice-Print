@extends('layouts.auth')

@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center vh-100">
            <!-- login section -->
            <div class="col-xl-6 col-lg-6 col-md-12 order-1 order-lg-0">
                <!-- form body -->
                <div class="form rounded-xl mb-4 mb-md-0">
                    <div class="form-header">Jafrin's Home Made Food.<br>

                        online order: <a href="https://www.jafrinshomemadefood.com/" target="_blank">
                            jafrinshomemadefood.com
                        </a></div>
                    <div class="form-body">
                        <h2 class="fw-bolder mb-4">Hi, welcome back! 👋👋</h2>
                        <p class="text-muted mb-5">
                            Delightful Baby Foods.
                        </p>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="Email" value="{{ old('email') }}" autocomplete="email">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" autocomplete="current-password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- remember --}}
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                    {{-- remember --}}
                                    @if (Route::has('password.request'))
                                        <a class="text-muted small-lg" href="{{ route('password.request') }}">
                                            {{ __('Forgotten password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-lg">
                                Submit
                            </button>
                        </form>
                    </div>
                    {{-- <div class="form-footer">
          Don't have an account? <a href="{{ route('register') }}">Register</a>.
      </div> --}}
                </div>
                <!-- form body -->
            </div>
            <!-- login section -->
            <!-- Company section -->
            <div class="col-xl-6 col-lg-6 col-md-12 order-0 order-lg-1">
                <div class="text-center">
                    {{-- large --}}
                    <div class="d-none d-lg-block">
                        <img src="https://www.jafrinshomemadefood.com/eezocmyd/2023/08/logo-v2-01-01.png" alt=""
                            class="auth_banner">
                    </div>
                    {{-- large --}}
                    {{-- small --}}
                    <div class="d-lg-none py-4">
                        <a href="{{ url('/') }}">
                            <img src="'https://www.jafrinshomemadefood.com/eezocmyd/2023/08/logo-v2-01-01.png"
                                alt="Logo" class="logo">
                        </a>
                    </div>
                    {{-- small --}}
                </div>
            </div>
            <!-- Company section -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
@endsection
