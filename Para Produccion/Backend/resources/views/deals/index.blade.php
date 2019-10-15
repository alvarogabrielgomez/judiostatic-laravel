@extends('layouts.app')
@section('title', 'TODOS')
@section('content')


<div id="nav-bar">
        <div id="nav-bar-container">
                    <nav>
                        <ul>
                            <li><a href="/"><div id="home-icon"></div></a></li>
                            <li class="navbar-divisor">&gt;</li>
                            <li><a href="/deals" style="margin:0;padding:0;">{{ __('messages.deals') }}</a></li>
                            {{-- <li class="navbar-divisor">&gt;</li>
                            <li><span>{{ __('messages.promo_codes') }}<span></span></span></li> --}}
                        </ul>
                    </nav>
        </div>
        </div>

<section>

     <div id="app">
     
    <div id="main-container"style = "margin-top:0px;">
        <div id="main">
            <div id="main-items">
                
                @foreach($posts as $post)

            <a href="/deals/{{$post->post_id}}" class="main-box">

                        <div class="main-img">
                            <img src="{{ asset($post->post_hero_img_url) }}" alt="">
                        </div>
                    
                        <div class="buss-name"><span>{{$post->buss_name}}</span></div>
                        <clock-sm style="
                        float: right;
                        margin-top: -30px;
                        margin-bottom: -8px;" 
                        post_created_at="{{$post->created_at}}" post_offer_end_at="{{$post->offer_end_at}}" realtime = "false" small="true"></clock-sm>
                    
                        
                        <div class="box-title"><span>{{$post ->title}}</span></div>
                        <div class="price-box">
                        
                            <div class="price-new"> <abbr title="BRL">R$</abbr><span>{{$post->price_new}}</span>  </div>
                            <div class="price-from"> <abbr title="BRL">R$</abbr> <span>{{$post->price_from}}</span></div>
                    
                        </div>
                    
                        <p class="main-box-desc">
                        {{$post->description}}
                    
                        </p>
                    
                    </a> 

                @endforeach

            </div>

        </div>

        </div>
 </div> 
 <script src="{{ asset('js/app.js') }}" ></script>
</section>

@endsection