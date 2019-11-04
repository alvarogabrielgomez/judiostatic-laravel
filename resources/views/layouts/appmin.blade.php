<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Omeleth Cupon</title>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/qrious.min.js') }}" async="async"></script>

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <META NAME="Title" CONTENT="TITULO - Omeleth Cupon">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    {{-- <link rel="preload" href="{{ asset('css/style.css') }}" as= "style">
    <link rel="preload" href="{{ asset('css/responsive.css') }}" as= "style">
    <link rel="preload" href="{{ asset('css/modalwindow.css') }}" as= "style"> --}}
    <link rel="preload" href="{{ asset('images/omeleth_red.png') }}" as="image">
    <link rel="preload" href="{{ asset('images/icons/home-icon.svg') }}" as="image">    
    <link rel="preload" href="{{ asset('images/icons/cupon-std-small-vertical.svg') }}" as="image">
    <link rel="preload" href="{{ asset('images/icons/cupon-std.svg') }}" as="image">
    <link rel="preload" href="{{ asset('css/app.css') }}" as= "style">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon/android-icon-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg')}}" color="#bc2b19">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#0f172b">
    <meta name="msapplication-config" content="{{ asset('images/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="#bc2b19">
   
    {{-- <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modalwindow.css') }}"> --}}
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>

    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}"> 

    <meta property="og:url"                content="https://omeleth.com/@yield('id')" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="@yield('title')" />
    <meta property="og:description"        content="@yield('description')" />
    <meta property="og:image"              content="https://omeleth.com/@yield('heroimage')" />
    <meta property="fb:app_id"             content="238563567095772" /> 
    <script>
       function dropdownShow() {
            document.getElementById("dropdown-menu").classList.toggle("show");
        }
        
    </script> 
    

</head>
<body>
        @if (session('status'))
        <script>
          function alertSession(){
            custom.msg('{{ session('status') }}', 5000);
          };
            </script>
          @endif

        <div id="themoderfoquer">

            <div class="shadow"  id="toastdiv">
                <div class="toastprogressbar"></div>
                <div class="title">Title</div>
                <div class="content">Lorem ipsum dolor sit amet</div>
            </div>

            <header class="header-min" id="header" >
                <div class="header-min" id="header-container">
                    <nav id="header-logo">
                        <ul>
                            <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                            <li id="">
                                <div id="header-logo-container" class="classic-logo"></div>
                            </li>
                        </ul>
                    </nav>
                    <div id="header-container-menu" class="normal-opacity-menu">
                        <nav id="header-menu">
                            <ul id="header-menu-buttoms">
                                <div id="wrapper-btn">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/create">New Post</a></li>
                                    <li><a href="scan-code.php">Scan QR</a></li>
                                    
                                </div>

                                <li class="login-status">
                                    @include('partials.loginstatus')                                       
                                </li>
                            </ul>
                
                        </nav>
                    </div>
                </div>
                <!--Final de contenedor header-->
            </header>

        @yield('content')
        
        </div>
    

        <footer id="footer">
                <div id="ir-arriba"><a href="#">{{ __('messages.up') }}</a></div>
              
                <div class="f-container">
                  <div class="b1">
                    <div class="navFooterHeader">{{ __('messages.footer_col1_h1') }}</div>
                    <ul class="navFooter">
                      <li class="">
                        <a href="" class="">{{ __('messages.jobs') }}</a>
                      </li>
                      <li>
                        <a href="" class="">{{ __('messages.blog') }}</a>
                      </li>
                      <li>
                        <a href="" class="">{{ __('messages.about_omeleth') }}</a>
                      </li>
                    </ul>
                  </div>
              
                  <div class="b2">
                    <div class="navFooterHeader">{{ __('messages.footer_col2_h1') }}</div>
                    <ul class="navFooter">
                      <li class="">
                        <a href="documents/with-us.html" class="">{{ __('messages.sell_with_os_in_omeleth') }}</a>
                      </li>
                      <li>
                        <a href="documents/lets-start.html" class="">{{ __('messages.how_start') }}</a>
                      </li>
                    </ul>
                  </div>
              
                  <div class="b3">
                    <div class="navFooterHeader">{{ __('messages.footer_col3_h1') }}</div>
                    <ul class="navFooter">
                      <li class="">
                        <a href="" class="">{{ __('messages.your_account') }}</a>
                      </li>
                      <li>
                        <a href="" class="">{{ __('messages.tell_errors') }}</a>
                      </li>
                      <li>
                        <a href="" class="">{{ __('messages.contr_sugg') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div id="creditos"><div class="logo-creditos"></div></div>
              
                <div id="creditos">
                  <div>
                    <a href="/documents/es/terms">{{ __('messages.terms') }}</a>
                    <a href="/documents/es/privacy-policy">{{ __('messages.privacy') }}</a
                    ><a href="https://ckj.one" rel="external"> © Alvaro Gabriel Gomez</a>.
                    {{ __('messages.rights') }}
                  </div>
                </div>
              </footer>
              
              @if (session('status'))
              <script>
document.addEventListener("DOMContentLoaded", function(event) { 
   setTimeout(() => {
   alertSession();
  }, 200);
});
</script>
@endif

{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
</body>
</html>