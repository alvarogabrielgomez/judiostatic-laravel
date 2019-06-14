<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Condiciones de Uso Omeleth Cupon</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <meta property="og:url"                content="https://omeleth.com/documents/terms" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Condiciones de Uso Omeleth Cupon" />
    <meta property="og:description"        content="Condiciones de Uso Omeleth Cupon" />
    <meta property="fb:app_id"             content="238563567095772" /> 

</head>
<body>

<style>
code{
    background: #e8eeee;
    border-radius: 4px;
    color: rgba(0,0,0,.87);
    display: block;
    font-size: 14px;
    margin: 20px 0 34px;
    max-width: -webkit-max-content;
    max-width: -moz-max-content;
    max-width: max-content;
    padding: 20px;
    font-family: Oxygen,sans-serif;
}
img{
    margin: 10px auto;
    position: relative;
    max-width: 320px;
    width: 100%;
    height: auto;
    display: block;
}

</style>

<header id="header-d">
    <div id="logo-d"></div>
</header>
<div class="main-d-bg-color">
    <section>
        
        <div class="main-d">
                <div class="light-bar" id="nav-bar" >
                        <div id="nav-bar-container">
                                    <nav>
                                        <ul class="light-bar-text">
                                            <li><a href="/index.php"><div id="home-icon"></div></a></li>
                                            <li class="navbar-divisor">></li>
                                            <li>Documents</li>
                                            <li class="navbar-divisor">></li>
                                            <li>{{$documentRead['lenguaje']}}</li>
                                            <li class="navbar-divisor">></li>
                                            <li>Terms</li>
                                        </ul>
                                    </nav>
                        </div>
                </div>


        <aside id="main-d-sidebar">
                <div class="">
                        <div class="d-header-list">Documentos</div>
                        <ul class="d-list">
                            <li class="">
                                <div class="doc-icon"></div>
                                <a href="privacy-policy#main-d-content-text" class="">Politica de privacidad</a>
                            </li>
                            <li class="selected-d-list">
                                <div class="doc-icon"></div>
                                <a href="" class="">Condiciones de uso</a>
                            </li>
                            <li>
                                <div class="doc-icon"></div>
                                <a href="with-us.html#main-d-content-text" class="">Venda con nosotros</a>
                            </li>
                            <li>
                                    <div class="doc-icon"></div>
                                    <a href="lets-start.html#main-d-content-text" class="">Comenzar con nosotros</a>
                                </li>
                    
                        </ul>
                        </div>
        </aside>
        
        <div id="main-d-content">
                  {{-- <img class="img-privacy" src="{{ asset('images/privacy-img.png') }}"> --}}
        <div id="main-d-content-text">
                {{-- <div class="date-nota-d">
                    <span>Estos terminos y condiciones es de la fecha 14 de Enero del 2019</span>
                </div> --}}

@php
echo $documentRead['document'];
@endphp

        </div>              
        </div>

        </div> 
        <footer id="footer">
            <div id="ir-arriba"><a href="#">Ir Arriba</a></div>
            
            <div class="f-container">
                <div class="b1">
                <div class="navFooterHeader">Conozca sobre nosotros</div>
                <ul class="navFooter">
                    <li class="">
                        <a href="" class="">Trabajos</a>
                    </li>
                    <li>
                        <a href="" class="">Blog</a>
                    </li>
                    <li>
                        <a href="" class="">Sobre Omeleth</a>
                    </li>
            
                </ul>
                </div>
            
            
                <div class="b2">
            
                <div class="navFooterHeader">Venda con nosotros</div>
                <ul class="navFooter">
                    <li class="">
                        <a href="with-us.html" class="">Venda sus cupones en Omeleth</a>
                    </li>
                    <li>
                        <a href="lets-start.html" class="">Como comenzar con nosotros</a>
                    </li>
            
            
                </ul>
                </div>
            
                <div class="b3">
                <div class="navFooterHeader">Deja que te ayudemos</div>
                <ul class="navFooter">
                    <li class="">
                        <a href="" class="">Tu cuenta</a>
                    </li>
                    <li>
                        <a href="" class="">Informar algun error</a>
                    </li>
                    <li>
                        <a href="" class="">Aportar alguna sugerencia</a>
                    </li>
            
                </ul>    </div>
                </div>
                <div id="creditos"><div  class="logo-creditos"></div></div>
            
                <div id="creditos"><div><a href="/documents/terms">Condiciones de Uso</a> <a href="privacy-policy.html">Privacidad</a><a href="https://ckj.one" rel="external"> © Alvaro Gabriel Gomez</a>. TODOS LOS DERECHOS RESERVADOS</div></div>
            
            </footer>
            
    </div>
    </section>
    
</body>
</html>