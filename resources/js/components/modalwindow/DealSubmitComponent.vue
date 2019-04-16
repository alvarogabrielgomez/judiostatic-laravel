<template>
  
<div id="dealsubmit">
              <div class="modal-header">
            <span class="close"></span>
            <h2 class = "titulomodal">Complete o pedido</h2>
          </div>
          
        <!-- AJAX content -->
<transition name="slide">
<div v-if="stepactual == 1" class="steps" id="step1">
        <div class="content-step">
          <div class="content-row row-linea">
            <div class="linea"></div>
            <div class="seleccion">1</div>
            <div class="opciones">2</div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[1] }}</h1>
                </div>
            

                <div class="deal-info">
                    <p>
                       <strong>PromoÃ§Ã£o de 600 gr de Brigadeiros</strong>
                       <span>50% de descuento</span>
                       <!-- <span style="display:none;">{{stepactual}}</span> -->
                    </p>
                </div>

                <div class="deal-info deal-white">
                    <p>
                        <strong>Verifique</strong> se tudo está em ordem e é a oferta que
                        você deseja. Se tudo estiver correto, você pode
                        <strong>continuar</strong>*
                    </p>
                    <p style="font-size: 13px; color: #9a9a9a; font-weight: 600;">
                        *Depois de continuar, você estará aceitando os termos e condições.
                    </p>
                </div>

                <div class="next-selection">
                <h2>{{steps.Next}}</h2>
                </div>
                </div>
          </div>

</div>
</transition>

<transition name="slide">
<div v-if="stepactual == 2" class="steps" id="step2">

        <div class="content-step">
          <div class="content-row row-linea">
            <div class="linea lineacont"></div>
            <div class="seleccion">2</div>
            <div class="opciones">3</div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[2] }}</h1>
                </div>
            

                <div class="deal-info">
                    <p>
                       <strong>PromoÃ§Ã£o de 600 gr de Brigadeiros</strong>
                       <span>50% de descuento</span>
                       <!-- <span style="display:none;">{{stepactual}}</span> -->
                    </p>
                </div>

                <div class="deal-info deal-white">
                    <p>
                        <strong>Verifique</strong> se tudo está em ordem e é a oferta que
                        você deseja. Se tudo estiver correto, você pode
                        <strong>continuar</strong>*
                    </p>
                    <p style="font-size: 13px; color: #9a9a9a; font-weight: 600;">
                        *Depois de continuar, você estará aceitando os termos e condições.
                    </p>
                </div>

                <div class="next-selection">
                <h2>{{steps.Next}}</h2>
                </div>
                </div>
          </div>

</div>
</transition>


<transition name="slide">
<div v-if="stepactual == 3" class="steps" id="step3">

        <div class="content-step">
          <div class="content-row row-linea">
            <div class="linea lineacont"></div>
            <div class="seleccion">3</div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[3] }}</h1>
                </div>
            

                <div class="deal-info">
                    <p>
                       <strong>PromoÃ§Ã£o de 600 gr de Brigadeiros</strong>
                       <span>50% de descuento</span>
                       <!-- <span style="display:none;">{{stepactual}}</span> -->
                    </p>
                </div>

                <div class="deal-info deal-white">
                    <p>
                        <strong>Verifique</strong> se tudo está em ordem e é a oferta que
                        você deseja. Se tudo estiver correto, você pode
                        <strong>continuar</strong>*
                    </p>
                    <p style="font-size: 13px; color: #9a9a9a; font-weight: 600;">
                        *Depois de continuar, você estará aceitando os termos e condições.
                    </p>
                </div>
                </div>
          </div>
  
</div>
</transition>


<!-- <div class="continue-btn">
<a class="button blue">▾</a>
</div> -->


<!-- <div class="modal-footer">
              
<div id="creditos"><div><a href="documents/terms.html">Condições de Uso</a> <a href="documents/privacy-policy.html">Privacidade</a><a href="https://ckj.one"> © Alvaro Gabriel Gomez</a>. <span id="rights">TODOS OS DIREITOS RESERVADOS</span></div></div>
      
</div> -->


<div class="modal-footer">
 <a v-on:click="stepactual += 1;" id="continue-btn" class="button footer-btn">Continuar</a>
</div>


</div> 
</template>

<style>
.steps{

    position: absolute;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    height: 100%;
    background-color: #FFF;
}
.slide-leave-active,
.slide-enter-active {
  transition: 1s;
}

.slide-enter {
  transform: translate(0, 100%);
}
.slide-leave-to {
  transform: translate(0, -100%);
}

.footer-btn{
    border-radius: 0px;
    width: 100%;
    height: 56px;
    line-height: 1.9em;
}

.footer-btn:hover{
    background: #21a961;
}
.footer-btn:active{
  	-webkit-transition: all .5s ease-in-out;
transition: all .5s ease-in-out;
background: #21a961;
    box-shadow: inset 0 0 0px 1px #32d07c;
}

.next-selection{
    z-index: 1000;
    width: 100%;
    position: absolute;
    height: 50px;
    bottom: 83px;

}
.next-selection h2{
    line-height: 1em;
    font-size: 1em;
    font-family: 'Oxygen', sans-serif;
    color: #484848;
    text-align: left;
    margin: 13px 1px!important;
    font-weight: 400;
}

.continue-btn{
    z-index: 10000;
    position: absolute;
    bottom: 56px;
    left: calc(50% - 50px);
}
.continue-btn a{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    padding: 13px 16px;
    text-decoration: none;
    font-size: 24px;
}
.continue-btn a:hover{
    text-decoration: none;
}

.modal, #modalwindow, #modal-content,{
	-webkit-transition: all .5s ease-in-out;
transition: transform .5s ease-in-out;

}

.linea{
    width: 58%;
    height: 100%;
    position: absolute;
    border-right: 1px solid #c7c7c7;
    top: 80px;
}

.lineacont{
  height: 120%;
  top: 0px;
}

.seleccion{
    position: absolute;
    width: 30px;
    height: 30px;
    margin-top: 71px;
    margin-left: 49px;
    background-color: #d6d6d6;
    display: block;
    border-radius: 50%;
    text-align: center;
    vertical-align: middle;
    line-height: 1.85em;
    border: 1px solid #d6d6d6;
    color: #fff;
    text-shadow: 1px 1px 5px #9a9a9a;
}

.opciones{
    position: absolute;
    width: 30px;
    height: 30px;
    bottom: 85px;
    margin-left: 49px;
    background-color: #ffffff;
    display: block;
    border-radius: 50%;
    text-align: center;
    vertical-align: middle;
    line-height: 1.85em;
    border: 1px solid #d6d6d6;
}

.title-step{
  width: 100%;
  height: 50px;
  margin-top: 64px;
}
.title-step h1{
    line-height: 1em;
    font-size: 1.2em;
    font-family: 'Oxygen', sans-serif;
    color: #292828;
    text-align: left;
    margin: 13px 1px!important;
    font-weight: 400;
}
.content-row{
    height: 100%;
    flex: 10;
}
.row-centered{
    display: flex;
    flex-direction: column;
}
.content-step{
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
}
.row-linea{
      flex: 2;
      position: relative;
}


#step1, #step2, #step3{
    display: flex;
    flex-direction: column;
}

#step1{
z-index: 10;
}
#step2{
  z-index: 9;
}

#step3{
  z-index: 8;
}



  #modalwindow{
    transition: all .2s ease-in-out;
  }

  
  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
  }
  
  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }
  
  /* The Close Button */
  .close {
    color: rgb(180, 27, 27);
    float: left;
    margin: 22px;
    font-size: 28px;
    font-weight: bold;
    width: 25px;
    height: 25px;
    background-color:antiquewhite;
    border-radius: 50%;
  }

  .close::before{
  content:"×";
    text-align: center;
    left: 25px;
    top: 20px;
    position: absolute;
    vertical-align: middle;
  }
  
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  
  .modal-header {
    
    color: #656565;
    position: absolute;
    width: 100%;
    z-index:1000;
    background: #fff;
    }
  
  .modal-body {
  
    overflow: auto;
    max-height: 523px;
    
    min-height: 355px;
  }
  
  .modal-footer {
    margin-top: 5px;
    position: absolute;
    bottom: 0px!important;
    width: 100%;
    z-index: 1000;
  }

  .modal-footer div{
    background-color: #efefef!important;
    color: #656565!important;
  }
  .modal-footer div a{
    color: #656565!important;
  }

  .titulomodal{
    font-size: 16px;
    padding: 14px;
  }
.modal-body{
  transition: all .2s ease-in-out;
}
  .modal-body img{
    transition: all .2s ease-in-out;
    overflow: hidden;
    width: 35%;
    height: 102px;
    max-width: 155px;
    max-height: 152px;
    min-width: 156px;
    float: left;

  }
  .buss-info-container{
    display: block;
    max-width: 467px;
    padding: 15px;
    margin: auto;
    background-color: #fbfbf2;
    min-height: 101px;
    overflow: auto;
    display: flex;
}
  
.deal-submit{
  width: 100%;
  height: 100%;
}

  .buss-info-metadata{
    padding: 0px 10PX;
    float: right;
    BOX-SIZING: BORDER-BOX;
    WIDTH: 64%;
  }

  .buss-info-name{
    padding: 0px 18px;
    font-size: 18px;
    font-weight: 600;
    word-wrap: break-word;

  }
  .buss-info-dir{
    padding: 4px 18px;
    font-size: 14px;
    height: 70px;
    overflow-y: auto;
    word-wrap: break-word;
  }



  .modal-continue{
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 100%;
    max-width: 499px;
    margin: auto;
    margin-top: 18px;
    margin-bottom: 15px;
  }

  .modal-continue a {
    color: #FFF!important;
    text-decoration: none;
  }

  .deal-info-metadata{
    padding: 0px 10PX;
    float: right;
    BOX-SIZING: BORDER-BOX;
    WIDTH: 100%;
  }

  .deal-info-name{
    padding: 0px 18px;
    font-size: 18px;
    font-weight: 600;
    word-wrap: break-word;

  }
  .deal-info-box{
    padding: 4px 18px;
    font-size: 14px;
    height: 70px;
    overflow-y: auto;
    word-wrap: break-word;
  }

  .deal-info{
    display: block;
    max-width: 498px;
    padding: 2px 23px;
    background-color: #fbfbf2;
    overflow: auto;
    box-sizing: border-box;
  }

.deal-white{
background: #FFF;

}


.insert-page{
  MARGIN: AUTO;
  DISPLAY: BLOCK;
  width: 100%;
}

.codigo-final{
  text-align: center;
  box-sizing: border-box;
  background-color: #ffffd6;
  padding: 8px;
  font-size: 27px;
}

#dos-botones{
  width: 100%;
  display: flex;

  margin: auto;
  align-items: center;
}


</style>

<script>

export default {
  data(){
        return{
            next: 2,
            stepactual:1,
            loading: true,
            showing:false,
            response: "",
            deal:[],
            steps: { "step":{
                      "1":"Verifique los datos", 
                      "2":"Ingrese su nombre", 
                      "3":"Listo"
                      },
                      "Next":
                      "Next Step"
                    },
                    
        }
  },

  mounted(){
  // Get the modal
  var modal = document.getElementById('modalwindow');
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  var nextSelection = $(".next-selection")[0];
  var continueBtn = $("#continue-btn")[0];
  
  this.steps.Next = this.steps.step[this.next];
  },

  updated(){
      this.next = this.stepactual+1 
      this.steps.Next = this.steps.step[this.next];

      if(this.response == 'success'){
        this.showing = true;
      }else if(this.response == 'error'){
        this.showing = false;
      }

  },
  
  computed:{

    stepactuallimit : function (){
      if(this.stepactual > 3){
        return false;
      }
      return true;
    }
  }

};

</script>
