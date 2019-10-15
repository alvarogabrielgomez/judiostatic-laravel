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
    
    <META NAME="Title" CONTENT="Login - Omeleth Cupon">
        <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
            <META NAME="Subject" CONTENT="Cupon Business">
                <META NAME="Language" CONTENT="Portuguese">
                    
                    {{-- <link rel="preload" href="{{ asset('css/style.css') }}" as= "style">
                    <link rel="preload" href="{{ asset('css/responsive.css') }}" as= "style"> --}}
                    <link rel="preload" href="{{ asset('css/app.css') }}" as= "style">
                    
                    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-touch-icon-60x60.png') }}">
                    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-touch-icon-76x76.png') }}">
                    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-touch-icon-120x120.png') }}">
                    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
                    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon-180x180.png') }}">
                    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
                    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
                    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
                    
                    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg')}}" color="#bc2b19">
                    <meta name="msapplication-TileColor" content="#da532c">
                    <meta name="theme-color" content="#bc2b19">
                    
                    {{-- <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"> --}}
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
                    <link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }}">
                    <script src="{{ asset('js/app.js') }}" defer></script>
                    
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">

    <meta property="og:url"                content="https://omeleth.com/login" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Login on Omeleth" />
    <meta property="og:description"        content="Login to Omeleth" />
    <meta property="fb:app_id"             content="238563567095772" /> 
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
                        <label class="title" for="titles">Title</label>
                        <label class="content" for="Content">Lorem ipsum dolor sit amet</label>
                    </div>





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
    <div id="creditos">
        <div class="logo-creditos"></div>
    </div>

    <div id="creditos">
        <div><a href="documents/terms.html">{{ __('messages.terms') }}</a> <a
                href="documents/privacy-policy.html">{{ __('messages.privacy') }}</a><a href="https://ckj.one" rel="external"> © Alvaro
                Gabriel Gomez</a>. {{ __('messages.rights') }}</div>
    </div>
</footer>
<script src="{{ asset('js/custom.js') }}" defer></script>

@if (session('status'))
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
   setTimeout(() => {
   alertSession();
  }, 200);
});
</script>
@endif

</body>
</html>