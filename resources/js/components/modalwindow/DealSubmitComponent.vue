<template>
  
<div id="dealsubmit">
              <div class="modal-header">
            <span v-on:click="stepactual = 1, hasError = false, hasResponse = false" class="close"></span>
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
                       <strong>{{deal.title}}</strong>
                       <span>{{this.descuento}}% de descuento</span>
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
                    <p style="line-height: 20px;">Su cupon es para <strong>{{this.bussname}}</strong>
                       <span></span>
                       
                    </p>
                </div>

                <div v-if="resume" id="continuar-anterior">
                  <a style="cursor:pointer;" v-on:click="stepactual = 4" >Continuar Anterior Operacion.</a>
                </div>

                <div class="deal-info deal-white" style="padding: 0px; overflow: hidden;">

                  <form id="insert-form">

                    <div class="group">
                      <input id="clientfirst" type="text" name="client_first" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Nombre</label>
                    </div>
                    <div class="group">
                      <input id="clientlast" type="text" name="client_last" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Apellido</label>
                    </div>
                    <div class="group">
                      <input id="clientemail" type="email" name="email" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Email</label>
                    </div>
                    <transition name="fade" mode="out-in">
                    <spinner-small v-if="loadingMss"></spinner-small>
                    <p class="alert alert-danger" v-if = hasError>{{responseContent}}</p>
                    <p class="alert alert-normal" v-if = hasResponse>{{responseContent}}</p>
                    </transition>
                </form>
                </div>

                <div class="next-selection">
                <h2>{{steps.Next}}</h2>
                </div>
                </div>
          </div>

</div>
</transition>
<!-- 
https://medium.com/justlaravel/vuejs-crud-operations-in-laravel-a5e0be901247 -->

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
            <div id="resultados">
                <spinner-small size="48" v-show="loading"></spinner-small>
                <div v-if="showing" class="deal-info">
                    <p>
                       <strong>PromoÃ§Ã£o de 600 gr de Brigadeiros</strong>
                       <span>50% de descuento</span>
                       <!-- <span style="display:none;">{{stepactual}}</span> -->
                    </p>
                </div>
            </div>
                </div>
          </div>
  
</div>
</transition>


<transition name="slide">
<div v-if="stepactual == 4" class="steps" id="step3">

        <div class="content-step">
          <div class="content-row row-linea">
            <div class="linea lineacont"></div>
            <div class="seleccion">!</div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[4] }}</h1>
                </div>
            <div id="resultados">
                <spinner-small size="48" v-show="loading"></spinner-small>
                <div v-if="showing" class="deal-info">
                    <p>
                       <strong>Bienvenido de nuevo, {{$store.state.userdata.client_first}}!</strong>
                    </p>
                </div>
                <div id="pwd-form-container">
                  <form id="pwd-form">

                    <div class="group" style="margin: auto;">
                      <input id="clientpwd" type="password" name="password" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Password</label>
                    </div>
                  
                    <transition name="fade" mode="out-in">
                    <spinner-small style = "margin-top:30px;" v-if="loadingMss"></spinner-small>
                    <p style="top:44px;" class="alert alert-danger" v-if = hasError>{{responseContent}}</p>
                    <p style="top:44px;" class="alert alert-normal" v-if = hasResponse>{{responseContent}}</p>
                    </transition>
                </form>
                </div>
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
<transition name="fade" >
 <a v-if="botoncontinuar" id="continue-btn" v-on:click="passToNext"  class="button footer-btn">Continuar</a>
<button v-if="botonsubmit" id="continue-btn" @click.prevent="formSubmit()" class="button footer-btn">MALDITO MADURO</button>
<a v-if="botonterminar" id="continue-btn" class="button footer-btn">Terminar</a>
</transition>
</div>


</div> 
</template>

<style>
#pwd-form-container{
    margin: 17px 21px 0;
    padding: 42px 42px 36px;
    border: 1px solid #eaeced;
    max-width: 377px;
    overflow: hidden;
    min-height: 109px;
}
#continuar-anterior{
    position: absolute;
    right: 13px;
    bottom: 68px;
    font-size: 12px;
}
#continuar-anterior a{
      color: #ba2d2b;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .26s!important;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.alert{
    position: relative;
    top: -5px;
    float: right;
    margin: auto;
    background-color: transparent;
    padding: 5px 17px;
 
}
.alert-normal {
border-bottom: 2px solid #22ba6a;
   border-bottom: 2px solid #22ba6a;
}

.alert-danger{
  color:#ff3d61;
     border-bottom: 2px solid #e61e1e;
}
#resultados{
    height: 100%;
    max-height: 300px;
}
/* form starting stylings ------------------------------- */
.group { 
  position:relative; 
  margin-bottom:17px; 
}

#insert-form, #pwd-form{
display: flex;
    width: 100%;
    box-sizing: border-box;
    height: 100%;
    flex-direction: column;
    padding: 26px 0px 8px 1px;
}

input{
  border-radius: 4px;
  font-size:15px;
  padding: 14px 10px 14px 14px;
  display:block;
  width:285px;
  border:1px solid #cacaca;
    border-bottom: 1px solid rgb(210, 210, 210);
      transition:0.2s ease all; 
}
/* LABEL ======================================= */
label{
  padding: 0px 5px;
  color:#999; 
  font-size:15px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:10px;
  top:11px;
  transition:0.15s ease all; 
  -moz-transition:0.15s ease all; 
  -webkit-transition:0.15s ease all;
      background-color:#fff;
}
/* active state */
input:focus{
    border: 1px solid var(--highlight-input);
    transition: 0.2s ease all;
    box-shadow: inset 0px 0 0 1px var(--highlight-input);
  outline:none; 
}
input:focus ~ label, input:valid ~ label {
    top: -12px;
    left: 8px;
    font-size: 11.5px;
}
input:focus ~ label{
    color: var(--highlight-input);

}

/* BOTTOM BARS ================================= */
/* .bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
} */
/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}
/* HIGHLIGHTER ================================== */
.highlight {
    position: absolute;
    height: 60%;
    width: 100px;
    border-radius: 2px;
    top: 19%;
    left: 11px;
    pointer-events: none;
    opacity: 0.5;
    z-index: 10;
}
/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}
/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}

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
    position: absolute;
    border-radius: 0px;
    width: 100%;
    height: 56px;
    line-height: 1.9em;
    bottom: 0px;
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
    height: 56px;
    background:#fff;
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
  name:'dealsubmit',
  props: ["title", "descuento", "bussname", "user"],
  data(){
        return{
            spinnersize:48,
            next: 2,
            stepactual:1,
            loading: false,
            loadingMss: false,
            showing:false,
            botoncontinuar:true,
            botonsubmit:false,
            botonterminar:false,
            responseMss: "success",
            responseContent: "",
            deal:{"title":this.title},
            steps: { "step":{
                      "1":"Verifique los datos", 
                      "2":"Ingrese su nombre", 
                      "3":"Listo",
                      "4":"Inicia Sesion"
                      },
                      "Next":
                      "Next Step"
                    },
            
            resume:false,
            hasError:false,
            hasResponse:false,
            newUser:{'client_first':'', 'client_last':'', 'email':''},
            formselected:"insert-form"
                    
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


// Swicher de Boton y demas
      this.next = this.stepactual+1 
      this.steps.Next = this.steps.step[this.next];
      if(this.stepactual == 2 || this.stepactual == 4){
        if(this.stepactual == 2){
          this.formselected = "insert-form";
          function selectname(){
            var inputfirst = document.getElementById('clientfirst');
            inputfirst.focus();
            inputfirst.select();
          }
          setTimeout(selectname, 1000);
        }else if (this.stepactual == 4){
          this.formselected = "pwd-form";
          function selectPwd(){
            var inputpwd = document.getElementById('clientpwd');
            inputpwd.focus();
            inputpwd.select();
          }
          setTimeout(selectPwd, 1000);
        }
        this.botoncontinuar = false;
        this.botonsubmit = true;
        this.botonterminar = false;
      }else if(this.stepactual == 3){
        this.botoncontinuar = false;
        this.botonsubmit = false;
        this.botonterminar = true;
      }
        else{
        this.botoncontinuar = true;
        this.botonsubmit = false;
        this.botonterminar = false;
      }
// Switcher de Spinner
      if(this.responseMss == 'success'){
        this.showing = true;
        this.loading = false;
      }else if(this.responseMss == 'error'){
        this.showing = false;
        this.loading = false;
      }else if(this.responseMss != 'success' || this.responseMss != 'error' || this.responseMss != 'successNoSession'){
        this.loading = true;
      }

  },
  
  computed:{

    stepactuallimit : function (){
      if(this.stepactual > 3){
        return false;
      }
      return true;
    }
  },
  methods:{
    passToNext: function(){
      this.stepactual += 1;
    },
    passToPWD: function(){
      this.stepactual = 4;
    },

    formSubmit: function formSubmit(){
      if(this.formselected == "pwd-form"){
        this.formPwdSubmit();
      }
      else if(this.formselected == "insert-form"){
      const form = document.getElementById(this.formselected);
      const firstInput  = form.querySelector('input[name=client_first]');
      const lastInput  = form.querySelector('input[name=client_last]');
      const emailInput  = form.querySelector('input[name=email]');
      this.newUser = {'client_first':firstInput.value, 'client_last':lastInput.value, 'email':emailInput.value};
      

      this.loadingMss = true;
      this.hasResponse = false;
      var input = this.newUser;

      if(input['client_first'] == '' || input['client_last'] == '' || input['email'] == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
           this.loadingMss = false;
      }else{
        this.hasError = false;
        axios.post('/dealsubmit', input) 
        .then((response) => {
          this.hasResponse = true;
          this.loadingMss = false;
          this.newUser = {};
          if(response.data.response == 'error'){
            this.hasError = true;
            this.responseMss = "error";
            this.responseContent = response.data.responseContent;

          }else if(response.data.response == 'success'){
            this.hasError = false;
            this.responseMss = "success";
            this.$store.state.userdata = response.data;
            this.responseContent = response.data.responseContent;
            this.passToNext();

          }else if(response.data.response == 'successNoSession'){
            this.formselected = "pwd-form";
            this.hasError = false;
            this.responseMss = "success";
            this.$store.state.userdata = response.data;
            this.responseContent = response.data.responseContent;
            this.resume = true;
            this.showing = true;
            this.loading = false;
            this.passToPWD();

            console.log(this.$store.state.userdata);
          }
        })
        .catch((error) => {
          this.hasError = true;
          if(error.response.data.errors.email != ""){
            this.responseContent = "Tiene que introducir un Email válido";
          }else{
            this.responseContent = error.response.data.message;
          }
          this.loadingMss = false;
        })

      }

    } 
    },

    formPwdSubmit: function formPwdSubmit(){
      const form = document.getElementById(this.formselected);
      var pwdInput  = form.querySelector('input[name=password]');
      //El resto de los datos ya estan en memoria en userdata.
      this.loadingMss = true;
      this.hasResponse = false;
      var input = {'client_first':this.$store.state.userdata.client_first, 'client_last':this.$store.state.userdata.client_last, 'email':this.$store.state.userdata.email, 'password': pwdInput.value};

      if(input['client_first'] == '' || input['client_last'] == '' || input['email'] == '' || input['password'] == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
           this.loadingMss = false;
      }else{
        this.hasError = false;

      let axiosConfig = {
        headers: {
          'Content-Type': 'application/json;charset=UTF-8',
          "X-Requested-With": "XMLHttpRequest",
        }
      };

        axios.post(process.env.MIX_APP_URL + ':8000' + '/api/login',{
          username: this.$store.state.userdata.email,
          password: pwdInput.value,
        }) 
        .then((response) => {
          this.hasResponse = true;
          this.loadingMss = false;
          this.newUser = {};
          if(response.data.access_token != ''){
            this.hasError = false;
            this.responseMss = "success";
            var response = response.data;
            this.responseContent = "Token Listo";
            //this.storeAccessToken(response.data.access_token);
           // this.passToNext();


          }
        })
        .catch((error) => {
          this.hasError = true;
          if (error.response.data.error == "invalid_credentials"){
            this.responseContent = "Contrasena Incorrecta";
          }
          else if(error.response.data.error == "invalid_request"){
            this.responseContent = "Hubo un problema en la respuesta";
          }
          else{
            this.responseContent = error.response.data.message;
          }
          this.loadingMss = false;
        })

      }

    
    },
    storeAccessToken: function storeAccessToken(token){
      
    },

    // formSubmit: function formSubmit(){
      
    //   let currentObj = this;
    //   this.axios.get('/dealsubmit', {
    //         first: this.first,
    //         last: this.last,
    //         email: this.email
    //   })
    //   .then(function (response) {
    //         currentObj.output = response.data;
    //         passToNext();
    //   })
    //   .catch(function (error) {
    //         currentObj.output = error;
    //   });
    // }
  }


};

</script>
