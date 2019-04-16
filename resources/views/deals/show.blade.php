@extends('layouts.app')
@section('title',  $posts->title)
@section('id',  $posts->post_id)
@section('description',  $posts->description)
@section('heroimage',  $posts->post_hero_img_url)
@section('content')
<div id="nav-bar">
        <div id="nav-bar-container">
                    <nav>
                        <ul>
                            <li><a href="index.php"><div id="home-icon"></div></a></li>
                            <li class="navbar-divisor">&gt;</li>
                            <li><a href="deals.php" style="margin:0;padding:0;">Deals</a></li>
                            <li class="navbar-divisor">&gt;</li>
                            <li><span>Códigos Promocionais<span></span></span></li>
                        </ul>
                    </nav>
        </div>
        </div>
<div id="time-bar">
        <div id="time-bar-container">
                <nav>
                    <ul>
                        <li><div class="clock-time-deals clock-15"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>
                        
                    </ul>
                </nav>
        </div>
</div>

<section>
    <div id="main-container"style = "margin-top:0px;">
        <div id="main">
            <div id="hero-deals-container">
                <div class="hero-deals-color">
                </div>
                <div id="hero-deals">
                    <div class="col1">
                    <div class="title-hero-deals">{{$posts->title}}</div>
                        <div class="buss-title-hero-deals">{{$posts->buss_name}}</div>
                        <div class="desc-art">
                            <p class="description-text">
                                    Aproveite nossos cupons especiais (disponíveis por tempo limitado) para nossos clientes mais fiéis, não perca a oportunidade, você pode comprar em <strong>{{$posts->buss_name}}</strong> pagando menos, sabendo que o mais importante é a sua satisfação.<br></p>
                            <div class="buss-dir">
                                <i class="fas fa-map-marker-alt" style="margin-right:16px;"></i>{{$posts->buss_dir}}
                            </div>
                            <div class="buss-phone">
                                <i class="fas fa-phone" style="margin-right:11px;"></i>{{$posts->buss_phone}}</div>
                            <p></p>
                            <div id="b-hero-buss">
                                <div class="buss-button button l-grey"><a href="{{$posts->buss_dir}}">Ver en Maps</a></div>
                                <div class="buss-button-o button red"><a href="#main-posts-container">Ver Oferta</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="image-hero-container">
                            <img src="{{ asset($posts->post_hero_img_url) }}" alt="image deals">
                        </div>
                    </div>
                </div>

            <div id="share-bar">
                    <div id="share-bar-container">
                       <nav>
                           <ul> 
                               <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="fas fa-share-alt"></i></li>
                               <li>Compartilhar</li>
                           </ul>
                       </nav>
                   </div>
            </div>

            <div id="main-posts-container">
                <div class="main-post">
<!-- The Modal -->


<div id="modalwindow" class="modal">

        <!-- Modal content -->
        <div id="modal-content">
          <div class="modal-body">

        </div>
      </div>
      </div>

                    </div>
                
                    <div id="principal-small" style="display: none;" class="cupon-std-small-vertical">
                        <div class="cupon-col1-small-vertical">
                            <div>VÁLIDO PARA UMA VEZ</div>
                        </div>
                        <div class="cupon-col2-small-vertical">
                            <div class="cupon-titulo-small-vertical"><span>{{$posts->title}}</span></div>
                        <div class="cupon-desc-small-vertical"><span>{{$posts->description}}</span>
                            </div>
                        </div>
                        <div class="cupon-col3-small-vertical">
                
                            <button class="cupon-boton-small-vertical button red modaltrigger"><span>TOMAR OFERTA</span></button>
                
                            <div class="cupon-descuento-small-vertical">
                                <span class="s-porcentaje-small-vertical">SALVE!</span>
                                <div class="porcentaje-small-vertical"><span>8%</span></div>
                
                            </div>
                        </div>
                    </div>
                
                
                    <div id="principal-std" class="cupon-std" style="display: flex; transform: scale(1);">
                        <div class="cupon-col1">
                            <div>VÁLIDO PARA UMA VEZ</div>
                        </div>
                        <div class="cupon-col2">
                            <div class="cupon-titulo"><span>{{$posts->title}}</span></div>
                            <div class="cupon-desc"><span>{{$posts->description}}</span>
                            </div>
                            <button class="cupon-boton button red modaltrigger"><span>TOMAR OFERTA</span></button>
                        </div>
                        <div class="cupon-col3">
                            <div class="cupon-descuento">
                                <div class="porcentaje"><span>{{abs(round((($posts->price_new/$posts->price_from)*100)-100))}}%</span></div>
                                <span class="s-porcentaje">SALVE!</span>
                            </div>
                        </div>
                    </div>
                
                
                
                    <div id="related-cupons"></div>
                    <div>
                        <h3 style="margin-top:56px!important;">Ofertas Relacionadas</h3>
                    </div>
                
                
                    <div id="time-bar">
                        <div id="time-bar-container">
                            <nav>
                                <ul>
                                    <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 8px 0px;" class="far fa-clock"></i></li>
                                    <li>2019-03-29 11:04:55</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                
                    <div id="principal-small" style="display: none;" class="cupon-std-small-vertical">
                        <div class="cupon-col1-small-vertical">
                            <div>VÁLIDO PARA UMA VEZ</div>
                        </div>
                        <div class="cupon-col2-small-vertical">
                            <div class="cupon-titulo-small-vertical"><span>ghfhfgh</span></div>
                            <div class="cupon-desc-small-vertical"><span>fhfggfhf</span>
                            </div>
                        </div>
                        <div class="cupon-col3-small-vertical">
                
                            <div class="cupon-boton-small-vertical button l-grey"><a href="deals.php?id=23">VER OFERTA</a></div>
                
                
                            <div class="cupon-descuento-small-vertical">
                                <span class="s-porcentaje-small-vertical">SALVE!</span>
                                <div class="porcentaje-small-vertical"><span>50%</span></div>
                
                            </div>
                        </div>
                    </div>
                
                    <div class="cupon-std" style="display: flex; transform: scale(1);">
                        <div class="cupon-col1">
                            <div>VÁLIDO PARA UMA VEZ</div>
                        </div>
                        <div class="cupon-col2">
                            <div class="cupon-titulo"><span><a href="deals.php?id='.$row['post_id'].'">ghfhfgh</a></span></div>
                            <div class="cupon-desc"><span>fhfggfhf</span>
                            </div>
                            <div class="cupon-boton button l-grey"><a href="deals.php?id=23">VER OFERTA</a></div>
                        </div>
                        <div class="cupon-col3">
                            <div class="cupon-descuento">
                                <div class="porcentaje"><span>50%</span></div>
                                <span class="s-porcentaje">SALVE!</span>
                            </div>
                        </div>
                    </div>
                
                </div>


            </div>

        
        
    </div>
</section>
</div>
<script>
var isMobile;
        function widthpx(){
            if($(document).width() <= 600){
              isMobile = true;
              $(".cupon-std-small-vertical").css("display", "flex");
              $(".cupon-std").css("display", "none");
        
            }else if($(document).width() >= 601){
              isMobile = false;
              $(".cupon-std-small-vertical").css("display", "none");
              $(".cupon-std").css("display", "flex");
            }
            var isSmallScreen;
            if($(document).width() <= 800){
                isSmallScreen = true;
                var Screen = $(document).width();
                var boxWidth = 728.6;
                var translatevar = (Screen/2) - (Screen*0.080) - (boxWidth/2);
              $(".cupon-std").css("transform", "scale(0.8) translate("+translatevar+"px)");
        
            }else if($(document).width() >= 801){
                isSmallScreen = false;
              $(".cupon-std").css("transform", "scale(1)");
            }
        
          }
        widthpx();

        window.onload = function() {
            //funciones a ejecutar
            
            window.addEventListener('resize', widthpx);
                // cargamos el icono en el div donde ira el contenido
                $(".modal-body").html("<img src='{{ asset('images/icons/loading.svg') }}' class='loadermodal' border='0' />");
                // cargamos la pagina en el div capa
                $(".modal-body").load('{{ asset('modalwindow/deals/'.$posts->post_id) }}');
                
        };
          function cargarContenido(pagina)
            {
                // cargamos el icono en el div donde ira el contenido
                $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='{{ asset('images/icons/loading.svg') }}' class='loadermodal' border='0' />");
                // cargamos la pagina en el div capa
                $(".modal-body").load(pagina);
            }
</script>

@endsection