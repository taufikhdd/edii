@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-two">
        <div class="container-fluid login-two-container">
            <div class="row main-login-two">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block p-0">
                    <div class="login-bg">
                        <div class="left-content-area">
                            <img src="{{ url('assets/img/logo.png') }}" class="logo" />
                            <div>
                                <h1 style="color: black">EDII</h1>
                                <br><br><br>
                                <h2 style="color: black">Aplikasi Biodata Pelamar</h2>
                                <p style="color: black">PT. Electronic Data Interface Indonesia</p>

                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <a class="font-13 text-black mr-3">{{ __('Find us: ') }}</a>
                                <a class="font-13 text-black mr-3" href="javascript:void(0)">Facebook</a>
                                <a class="font-13 text-black mr-3" href="javascript:void(0)">Twitter</a>
                                <a class="font-13 text-black mr-3" href="javascript:void(0)">Instagram</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                    <div class="login-two-start">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <center><img src="{{ url('assets/img/logo.png') }}" style="width: 180px" class="logo" /></center>
                            <h6 class="right-bar-heading px-3 mt-4 text-dark text-center font-30 text-uppercase">
                                {{ __('Login') }}</h6>
                            <p class="text-center text-muted mt-1 mb-3 font-14">Silahkan masukan username dan password anda
                            </p>
                            <div class="login-two-inputs mt-5">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    placeholder="{{ __('Username') }}" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="las la-user-alt"></i>
                            </div>
                            <div class="login-two-inputs mt-4">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    placeholder="{{ __('Password') }}" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="las la-lock"></i>
                            </div>
                            <div class="login-two-inputs  mt-4 check">
                                <div class="box">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="check"></span>
                                    <label for="one">Ingat saya</label>
                                </div>
                            </div>
                            <div class="login-two-inputs mt-5 text-center d-flex">
                                <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="submit">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    {{ __('Login') }}
                                </button>

                                <a class="btn-login ml-3 mr-3" href="{{ route('register') }}">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    {{ __('Register') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
@endpush

@push('custom-scripts')

@endpush
