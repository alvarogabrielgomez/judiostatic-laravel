<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Omeleth Cupon - Cupons online baratos e rápidos.</title>
     <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <META NAME="Title" CONTENT="Omeleth Cupon - Cupons online baratos e rápidos.">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">
    <meta property="og:url"                content="https://omeleth.com" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Omeleth Cupon" />
    <meta property="og:description"        content="Conte conosco para resolver o seu dia, e você pode dar o seu prazer quando quiser. Cupons online baratos e rápidos." />
    <meta property="og:image"              content="https://omeleth.com/{{ asset('images/omeleth_red_image.png')}}" />
    <meta property="fb:app_id"             content="238563567095772" />

    <link rel="preload" href="{{ asset('images/icons/main-box-loading.svg')}}" as="image">

    {{-- <link rel="preload" href="{{ asset('css/style.css')}}" as= "style">
    <link rel="preload" href="{{ asset('css/responsive.css')}}" as= "style"> --}}
    <link rel="preload" href="{{ asset('css/app.css') }}" as= "style">

    <link rel="preload" href="{{ asset('images/hero/hero-img-mobile.jpg')}}" as="image"  media="(max-width: 799px)">
    <link rel="preload" href="{{ asset('images/hero/hero-img.jpg')}}" as="image"  media="(min-width: 800px)">
    <link rel="preload" href="{{ asset('slick/slick-theme.css')}}" as= "style">
    <link rel="preload" href="{{ asset('slick/slick.css')}}" as= "style">
    <link rel="preload" href="{{ asset('images/Empty-State2.svg')}}" as= "image">
    
    
    <link rel="preload" href="{{ asset('/slick/slick.min.js')}}" as="script">

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

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    
    <script src="{{ asset('slick/slick.min.js') }}"></script>
  
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">

</head>
<body>
    <div id="app">
    <div id="themoderfoquer">

        <header id="header" class="index-h">
            <div id="header-container">
              <nav id="header-logo">
                <ul>
                  <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                  <li id=""><div id="header-logo-container" class="hero-logo"></div></li>
                </ul>
              </nav>
              <div id="header-container-menu">
                <nav id="header-menu">
                  <ul id="header-menu-buttoms">
                    <li><a href="index.php">Home</a></li>
                  </ul>
                </nav>
              </div>
            </div>          
          </header><!--Final de contenedor header-->
          
    @yield('content')
    </div>
  </div>

  <script>
      var isMobile;
      function widthpx() {
        if ($(document).width() <= 800) {
          isMobile = true;
          $("#onload-carousel").css("background-position", "center");
        } else if ($(document).width() >= 801) {
          isMobile = false;
          $("#onload-carousel").css("background-position", "left");
        }
      }
      widthpx();
      window.onload = function() {
        window.addEventListener("resize", widthpx);
      };
      </script>

    <footer id="footer">
            <div id="ir-arriba"><a href="#">Subir</a></div>
          
            <div class="f-container">
              <div class="b1">
                <div class="navFooterHeader">Saiba mais sobre nós</div>
                <ul class="navFooter">
                  <li class="">
                    <a href="" class="">Jobs</a>
                  </li>
                  <li>
                    <a href="" class="">Blog</a>
                  </li>
                  <li>
                    <a href="" class="">Sobre o Omeleth</a>
                  </li>
                </ul>
              </div>
          
              <div class="b2">
                <div class="navFooterHeader">Venda conosco</div>
                <ul class="navFooter">
                  <li class="">
                    <a href="documents/with-us.html" class=""
                      >Venda seus cupons em Omeleth</a
                    >
                  </li>
                  <li>
                    <a href="documents/lets-start.html" class="">Como começar conosco</a>
                  </li>
                </ul>
              </div>
          
              <div class="b3">
                <div class="navFooterHeader">Deixe-nos ajudá-lo</div>
                <ul class="navFooter">
                  <li class="">
                    <a href="" class="">Sua conta</a>
                  </li>
                  <li>
                    <a href="" class="">Comunicar um erro</a>
                  </li>
                  <li>
                    <a href="" class="">Contribua com sugestões</a>
                  </li>
                </ul>
              </div>
            </div>
            <div id="creditos"><div class="logo-creditos"></div></div>
          
            <div id="creditos">
              <div>
                <a href="documents/terms.html">Condições de uso</a>
                <a href="documents/privacy-policy.html">Privacidade</a
                ><a href="https://ckj.one" rel="external"> © Alvaro Gabriel Gomez</a>.
                TODOS OS DIREITOS RESERVADOS
              </div>
            </div>
          </footer>

          

</body>
</html>

