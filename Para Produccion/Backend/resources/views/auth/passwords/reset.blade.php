@extends('layouts.loginapp') 
@section('title', __('UILogin.reset_pwd')) 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}"/>
<div class="login-img"></div>

    <div id="main-login-container">
        <div id="main-login">
            <div id="login-form">
                <div id="pwd-form-container" class="admin-login" style="padding: 20px; position:relative; transition: 0.7s; display: flex; flex-direction: column; justify-content: center;">
                        
                        <div style="width: 95%;" class="shadow-light boxedtoast"  id="toastlogin">
                                <div class="toastprogressbar"></div>
                                <div class="title">Title</div>
                                <div class="content">Lorem ipsum dolor sit amet</div>
                        </div>
                    
                    <form id="form-resetpwd" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}"/>

                        <div id="loading-overlay" style="top: 0px;left: 0px;opacity: 0;display:none;">
                                <div class="loader-small-container">
                                    <div class="loader-small">Loading...</div>
                                </div>
                            </div>

                            <div id="nav-bar" class="light-bar-t" style="position: absolute; top: 11px; left:0px; margin-top: 0px !important; z-index: 1000;"><div id="nav-bar-container"><nav><ul class="light-bar-text"><li><a href="/"><div id="home-icon"></div></a></li> <li class="navbar-divisor">&gt;</li> <li>{{ __('UILogin.reset_pwd') }}</li></ul></nav></div></div>
                            <div id="logo-form-register" style="display:block; position: relative;"><div class="lefty-trans-black-logo-form"></div></div>
                            <div class="leyenda-resetpwd">
                            <h2 style="margin-bottom: 13px;"><strong>{{ __('passwords.reset_pwd_h1') }}</strong></h2>
                            <p style="margin: 0px;">{{ __('passwords.reset_pwd_p') }}</p>
                            </div>

                        <div class="group-inputs-resetpwd">
                        

                        <div class="group-input group-centrado material-sm" style="margin-bottom: 14px;">
                            <input class="input-material{{$errors->has('email') ? ' invalid-data' : ''}}" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" style="width:285px;" required autofocus />
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label class="label-material">{{ __('UILogin.email') }}</label>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert" style="margin-bottom: -5px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group-input group-centrado material-sm" style="margin-bottom: 14px;">
                                <input class="input-material{{$errors->has('password') ? ' invalid-data' : ''}}" id="password" type="password" name="password" style="width:285px;" required />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-material">{{ __('UILogin.password') }}</label>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert" style="margin-bottom: -5px;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                        </div>

                        <div class="group-input group-centrado material-sm">
                                <input class="input-material{{$errors->has('password') ? ' invalid-data' : ''}}" id="password-confirm" type="password" name="password_confirmation" style="width:285px;" required />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-material">{{ __('UILogin.confirm') }}</label>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert" style="margin-bottom: -5px;">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>

                </form>
                <button form="form-resetpwd" type="submit" class="button red register-submit">{{ __('UILogin.reset_pwd') }}</button>
                </div>
            </div>
        </div>
    </div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Reset Password") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $token }}"
                        />

                        <div class="form-group row">
                            <label
                                for="email"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __("E-Mail Address") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="client_email"
                                    value="{{ $email ?? old('email') }}"
                                    required
                                    autofocus
                                />

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong
                                        >{{ $errors->first('email') }}</strong
                                    >
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="password"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __("Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="client_pwd"
                                    required
                                />

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong
                                        >{{ $errors->first('password') }}</strong
                                    >
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="password-confirm"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __("Confirm Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Reset Password") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection 
