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
    <script src="{{ asset('js/app.js') }}" defer></script>


    <META NAME="Title" CONTENT="TITULO - Omeleth Cupon">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    <link rel="preload" href="{{ asset('css/responsive.css') }}" as= "style">
    <link rel="preload" href="{{ asset('css/responsive.css') }}" as= "style">
    <link rel="preload" href="{{ asset('modalwindow/modalwindow.css') }}" as= "style">
    <link rel="preload" href="{{ asset('images/icons/cupon-std.svg') }}" as="image">

    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#bc2b19">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#bc2b19">
   
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modalwindow/modalwindow.css') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">

    <script src="{{ asset('js/qrious.min.js') }}" async="async"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}"> 

    <meta property="og:url"                content="https://omeleth.com/deals.php?id=@yield('id')" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="" />
    <meta property="og:description"        content="" />
    <meta property="og:image"              content="https://omeleth.com/" />
    <meta property="fb:app_id"             content="238563567095772" /> 
</head>
<body>
    <div id="app">
        <div id="themoderfoquer">

            <header id="header">
                <div id="header-container">
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
                                <li><a href="index.php">Home</a></li>
                                    <li><a href="new-post.php">New Post</a></li>
                                    <li><a href="#main">About</a></li>
                                    <li><a href="scan-code.php">Scan QR</a></li>
                                    <li><a href="#main">Contacto</a></li>
                            </ul>
                
                        </nav>
                    </div>
                </div>
                <!--Final de contenedor header-->
            </header>

        @yield('content')
        </div>
    </div>

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
                    <a href="documents/with-us.html" class="">Venda seus cupons em Omeleth</a>
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
    <div id="creditos">
        <div class="logo-creditos"></div>
    </div>

    <div id="creditos">
        <div><a href="documents/terms.html">Condições de uso</a> <a
                href="documents/privacy-policy.html">Privacidade</a><a href="https://ckj.one" rel="external"> © Alvaro
                Gabriel Gomez</a>. TODOS OS DIREITOS RESERVADOS</div>
    </div>

</footer>
</body>
</html>