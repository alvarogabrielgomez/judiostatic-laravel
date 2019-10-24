@extends('layouts.loginapp')
@section('title', __('UILogin.register'))
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">

<header id="header" class="header-register">
        <div id="header-container-nomargin" class="animated fadeIn">
          <nav id="header-logo">
            <ul>
              <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
              <li id=""><div id="header-logo-container-register" class="animated fadeIn hero-logo"></div></li>
            </ul>
          </nav>
        </div>          
      </header><!--Final de contenedor header-->


<div class="container">
        <div class="row" style="height: 657px;">
            <div id="main-hero-img" class="animated fadeIn">
                <div id="main-hero-register" class="animated fadeIn">
                    <div class="main-hero-img-register-textcontainer register-info-box">
                        <p id="textbloq1" style="text-align: left;">{{ __('messages.h1_msg_hero') }}</p> 
                        <p id="textbloq2" style="margin-bottom: 39px;text-align: left;">
                                {{ __('messages.p_msg_hero') }}<br>
                        </p> 
                        <a href="/login" class="herob button blue" style = "margin:0px;width: 180px;">{{ __('UILogin.login') }}</a> 
                        <a href="#main"><div id="main-hero-arrow"></div></a>
                    </div>
                    <div class="main-hero-img-register-textcontainer register-box">
                        <form method="POST" action="/registering" class="register-form-box" id="register-from">
                            @csrf    
                            <div id="loading-overlay" style="top: 0px;left: 0px;opacity: 0;display:none; transition: 0.2s all ease-in-out;">
                                    <div class="loader-small-container">
                                        <div class="loader-small">{{ __('messages.loading') }}...</div>
                                    </div>
                                </div>

                                <div id="nav-bar" class="light-bar-t" style="position: absolute; top: 11px; left:0px; margin-top: 0px !important; z-index: 1000;"><div id="nav-bar-container"><nav><ul class="light-bar-text"><li><a href="/"><div id="home-icon"></div></a></li> <li class="navbar-divisor">&gt;</li> <li>{{ __('UILogin.register') }}</li></ul></nav></div></div>
                                <div id="logo-form-register" style=""><div class="lefty-trans-black-logo-form"></div></div>
                                <div class="leyenda-registrar">
                                <h2 style="margin-bottom: 13px;"><strong>{{ __('UILogin.register_h1') }}</strong></h2>
                                <p style="margin: 0px;">{{ __('UILogin.register_p') }}</p>
                                </div>

                                <div class="form-container-view">
                                <div style="margin-top: 63px;justify-content:left;" class="container-input-2col">
                                    <div class="group-input group-row material-sm">
                                            <input class="input-material{{$errors->has('name') ? ' invalid-data' : ''}}" id="client_first" type="text" name="client_first" value="{{ old('name') }}" required autofocus>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="label-material">{{ __('UILogin.name') }}</label>

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="group-input group-row material-sm">
                                            <input class="input-material" id="client_last" type="text" name="client_last" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label class="label-material">{{ __('UILogin.last_name') }}</label>
                                    </div>
                                    <br>
                                </div>

                                <div class="group-input group-centrado material-sm">
                                        <input style="width: 91.5%;max-width: 471px;" class="input-material{{$errors->has('email') ? ' invalid-data' : ''}}" id="email" type="email" name="email" value="{{ old('email') }}" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label-material">{{ __('UILogin.email') }}</label>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif


                                </div>
                                <br>
                                <div style="justify-content:left;" class="container-input-2col" style="margin-top: -6px;">
                                <div class="group-input group-row material-sm">
                                        <input class="input-material{{$errors->has('password') ? ' invalid-data' : ''}}" id="password" type="password" name="password" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label-material">{{ __('UILogin.password') }}</label>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif


                                </div>
                                <div class="group-input group-row material-sm">
                                        <input class="input-material" id="password_confirmation" type="password" name="password_confirmation" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="label-material">{{ __('UILogin.confirm') }}</label>
                                    </div>
                                </div>
                                <label style="font-size: 0.8em;width: 300px;display: block;">{{ __('UILogin.password_requirements') }}</label>
                            <br>
                            </div>
                            <button form="register-from" onClick="mostrarCargando()" type="submit" name="register-submit" class="button red register-submit">{{ __('pagination.next') }}</button>
                        
                        
                        
                        </form>
                           
                    </div>
                </div>

                


            </div>
        </div>
</div>

<script>

// function mostrarCargando() {
//     var nombres = document.getElementById("client_first").value;
//     var apellidos = document.getElementById("client_last").value;
//     var email = document.getElementById("email").value;
//     var pwd = document.getElementById("password").value;
//     var pwd2 = document.getElementById("password_confirmation").value;


// if(nombres === "" || apellidos === "" || email === "" || pwd === "" || pwd2 === ""){
//     console.log("Faltan Campos");
// }else{
//     var registerbtn = document.getElementById("loading-overlay");
//     registerbtn.style.display = "flex";
//     registerbtn.style.opacity = "100";
// }

// }

</script>

@endsection


{{-- 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="client_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="client_email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="client_pwd" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}
