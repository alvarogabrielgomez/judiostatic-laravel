@extends('layouts/appindex')
@section('content')
<!-- Scripts -->

<section id="main-hero">
        <div id="main-hero-img">
            <div id="main-hero-img-carousel" class="animated fadeIn">
                <div class="main-hero-img-carousel-textcontainer">
    
                    <p id="textbloq1">{{ __('messages.h1_msg_hero') }}</p>
            
                    <p id="textbloq2">
                        {{ __('messages.p_msg_hero') }}<br><br> {{ __('messages.p_msg_hero2') }}
                    </p>
                    <a href="/deals" class="herob button blue">{{ __('messages.btn_hero') }}</a>
                    <a href="#main"><div id="main-hero-arrow"></div></a>
                </div>
            
            </div>
        </div>
    </section><!--Final main portada-->

    <section>
        <div id="main-container" style = "margin-top:0px;">
            <div id='main'>
                <h1>{{ __('messages.h1_carousel') }}</h1>
               <h3>{{ __('messages.h3_carousel') }}</h3> 
               <div id="onload-carousel">

                   <div id='loader-carousel'>
                    <carousel-component></carousel-component><!-- Aca carga el carousel -->
                   </div>     
               </div>

               <div id="main-posts-container">
                <div class="main-post">

                  <h1>
                    Adquira o seu código promocional Omeleth e aproveite tudo ao melhor preço
                  </h1>
              
                  <p style="margin-top: 38px;">
                    Se você gosta de bons negócios, barato, não se esqueça de visitar os
                    diferentes cupons e códigos de desconto que o Omeleth pode lhe oferecer,
                    acompanhe diferentes promoções para que você possa encontrar as economias
                    que melhor se adequam ao que você deseja.
                  </p>
              
                  <h1>Como usar um código promocional do Omeleth</h1>
                  <p style="margin-top: 38px;">
                    Você está interessado no que estamos falando? Muito bem, explicamos de
                    forma muito simples como usar os cupons de desconto Omeleth:
                  </p>
                  <p>
                    É muito simples, o processo é um círculo que deve ser fechado, em 3 etapas
                    rápidas:
                  </p>
                  <ul>
                    <li>
                      Decida que comida você quer comprar online, hambúrgueres? Uma combinação
                      de 2x1 ?, cerveja ?, sanduíches?, Comida gourmet? Há uma grande
                      variedade de coisas que podem interessá-lo, decidir entre tantas ofertas
                      de produtos será a parte mais difícil.
                    </li>
                    <li>
                      Escolha o cupom de desconto on-line que você deseja usar em sua compra,
                      quando a promoção for escolhida, aponte para o código promocional ou
                      salve seu código QR (precisaremos mais tarde).
                    </li>
                    <li>
                      Faça a compra no local mostrando o código copiado ou o código QR. O
                      desconto será então aplicado.
                    </li>
                  </ul>
                </div>
              </div>
            
                   </div>  
               </div> 
    </section>
@endsection
