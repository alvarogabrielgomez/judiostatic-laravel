<script src="{{ asset('js/app.js') }}" defer></script>

<div id="app"> 
<dealsubmit-component postdata="{{$posts}}" descuento="{{abs(round((($posts->price_new/$posts->price_from)*100)-100))}}" userdata="{{$userdata}}">
    </dealsubmit-component>
</div>


{{-- <template>
        
        
        <div id="top" class="animated fadeIn continue">
                <div class="buss-info-container">
                    <div class="deal-info-metadata">
                        <div class="deal-info-name">{{}}</div>
                        <div class="deal-info-box">{{}}</div>
                    </div>
                </div>
            
                <div class="deal-info2">
                    <p>
                        <strong>Verifique</strong> se tudo está em ordem e é a oferta que
                        você deseja. Se tudo estiver correto, você pode
                        <strong>continuar</strong>*
                    </p>
                    <p style="font-size: 13px; color: #9a9a9a; font-weight: 600;">
                        *Depois de continuar, você estará aceitando os termos e condições.
                    </p>
                </div>
                <div>
                <div><a class="button blue modal-continue">Vou continuar</a></div>
                </div>
            </div>
        
      
        
        <div id="top" class="animated fadeIn continue">
            <div class="buss-info-container">
                <div class="deal-info-metadata">
                    <div class="deal-info-name">{{}}</div>
                    <div class="deal-info-box">{{}}</div>
                </div>
            </div>
        
            <div class="deal-info1">
                <p>Anote bem ou <strong>salve o lugar</strong> onde você tem que ir depois de ter seu código</p>
                <p>Se você tem tudo pronto, você pode <strong>continuar</strong></p>
            </div>
            <div>
            <div><a class="button blue modal-continue">Vou continuar</a></div>
            </div>
        </div>
        
       
        
        <div class="header-insert">Em nome de quem este cupom incrível vai?</div>
        <div class="main-box admin-signup main-box-simple">
        <div class="nav-signup">
        
        </div>
        </div>
        <p>Seus dados estão seguros conosco e nós mesmos não temos acesso a eles.</p>
        
        </template> --}}