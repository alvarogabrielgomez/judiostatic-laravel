<template>
  
<div id="dealsubmit">
              <div class="modal-header">
            <span class="close"></span>
            <h2 class = "titulomodal">Complete o pedido</h2>
          </div>
          
        <!-- AJAX content -->

<div class="steps" id="step1">

        <div class="animated fadeIn content-step">
          <div class="content-row row-linea">
            <div class="linea"></div>
            <div class="seleccion">1</div>
            <div class="opciones">2</div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>Verifique los datos:</h1>
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
           
        
</div>
</div>


<div class="steps" id="step2">
            <div class="buss-info-container">
                <div class="deal-info-metadata">
                    <div class="deal-info-name"></div>
                    <div class="deal-info-box"></div>
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
        
<div class="steps" id="step3">

<div class="header-insert">Em nome de quem este cupom incrível vai?</div>

<div class="main-box admin-signup main-box-simple">

<div class="nav-signup">

<form method="POST" id="insert-form" action="./includes/insert-inc.php?id=<?php echo $post_url_id;?>" >
    <input id="first" type="text" name="first"  placeholder="Nome" autofocus>
    <input id="first" type="text" name="last"  placeholder="Apelido">
    <input id="first" type="email" name="email"  placeholder="E-mail">
    <button id="btn_send" type="submit" class="button red" name="signup-submit">Ordem completa</button>
    <span style='' class="response"></span>
    <div><a class="cancelar">Cancelar</a></div>
<div><a class="volver">Voltar</a></div>

</form>

<canvas id="qr" style="margin: auto;display:none;"></canvas>

</div> 
<div>
</div>      
</div>

<p style="font-size: 12px;color: #a0a0a0;font-weight: 600;text-align: center;">Seus dados estão seguros conosco e nós mesmos não temos acesso a eles.</p>

        
</div>





<div class="modal-footer">
              
<div id="creditos"><div><a href="documents/terms.html">Condições de Uso</a> <a href="documents/privacy-policy.html">Privacidade</a><a href="https://ckj.one"> © Alvaro Gabriel Gomez</a>. <span id="rights">TODOS OS DIREITOS RESERVADOS</span></div></div>
      
</div>





</div> 
</template>

<style>
.modal, #modalwindow, .modal-content{
	-webkit-transition: all .5s ease-in-out;
transition: transform .5s ease-in-out;

}

.linea{
    width: 58%;
    height: 100%;
    position: absolute;
    border-right: 1px solid #c7c7c7;
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
.steps{
    position: absolute;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    height: 100%;
    background-color: #FFF;
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


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 100000; /* Sit on top */
    padding-top: 28px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.18);  
    transition: all .2s ease-in-out;
  }
  #modalwindow{
    transition: all .2s ease-in-out;
  }
  /* Modal Content */
  .modal-content {
    transition: all .2s ease-in-out;
    position: relative;
    background-color: #fffefe;
    margin: auto;
    margin-bottom: 59px;
    padding: 0;
    border: 1px solid rgba(151, 37, 21, 0.45);
    border-top: 0px;
    width: 80%;
    max-width: 677px;
    min-height: 527px;
    border-radius: 10px 10px 0px 0px;
    box-shadow: 3px 3px 8px 1px rgba(0, 0, 0, 0.16), 1px 10px 20px 0px rgba(0, 0, 0, 0.1), 0px -3px 0px 0px #BC2D19;    animation-name: animatetop;
    animation-duration: 0.4s;
    overflow:hidden;
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
    bottom: 0px;
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

  .deal-info1{
    display: block;
    max-width: 467px;
    padding: 15px;
    margin: auto;
    margin-top: 18px;
    background-color: #fbfbf2;
    min-height: 101px;
    overflow: auto;
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

  .deal-info2{
    display: block;
    max-width: 498px;
    padding: 7px 27px;
    margin: auto;
    margin-top: 12px;
    background-color: #fbfbf2;
    min-height: 101px;
    overflow: auto;
    box-sizing: border-box;
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
    created(){

    },
//     data(){
//         return{
//             loading: true,
//             showing:false,
//             response: ""
//         }
//     },
//     mounted(){
//         axios
//         .post("/dealsubmit", {
//             data: from
//         })
//         .then(res =>{
//             this.loading = false;
//             this.response = res.data.response
//         })
//     },
//     updated(){
//     if(this.response == 'success'){
//       this.showing = true;
//     }else if(this.response == 'error'){
//       this.showing = false;
//     }

//   }


mounted(){
        // Get the modal
var modal = document.getElementById('modalwindow');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
},
updated(){

}
};
</script>
