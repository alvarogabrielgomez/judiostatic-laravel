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
            <div class="linea">
            <div class="seleccion">1</div>
            <div class="opciones">2</div>
            </div>
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
            <div class="linea lineacont">
            <div class="seleccion">2</div>
            <div class="opciones">3</div>
            </div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[2] }}</h1>
                </div>
            

                <div class="deal-info">
                    <p style="line-height: 20px;">Su cupon es para <strong>{{this.deal.buss_name}}</strong>
                       <span></span>
                       
                    </p>
                    <p v-if="loged == false">
                      Su cuenta sera creada automaticamente.
                    </p>
                </div>

                <div v-if="resume" id="continuar-anterior">
                  <a style="cursor:pointer;" v-on:click="stepactual = 4" >Continuar Anterior Operacion.</a>
                </div>

                <div class="deal-info deal-white" style="padding: 0px; overflow: hidden;">

                  <form @submit.prevent="formSubmit" id="insert-form">
                    <!-- FORM MOSTRADO SI NO ESTA INICIADA LA SESION -->
                    <div id="new-user-form" v-if="this.$store.state.userdata.email == '' ">

                    <div class="group-input">
                      <input class="input-material" id="clientfirst" type="text" name="client_first" required style="width:285px;">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="label-material">Nombre</label>
                    </div>
                    <div class="group-input">
                      <input class="input-material" id="clientlast" type="text" name="client_last" required style="width:285px;">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="label-material">Apellido</label>
                    </div>
                    <div class="group-input">
                      <input class="input-material" id="clientemail" type="email" name="email" required style="width:285px;">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="label-material">Email</label>
                    </div>
                    </div>
                    <!-- FORM MOSTRADO SI LA SESION ESTA INICIADA -->
                    <div id="user-form" v-if="this.$store.state.userdata.email != ''">

                  <div id="clientfirst" class="selecting-user" style="width:99%;">
    
                    <div id="whoisyou" style="background-color:transparent;">
                    <div id="whoisyou-img">
                    <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="fas fa-user"></i>
                    </div>
                    <div id="whoisyou-name"><span>
                      {{this.$store.state.userdata.client_first + " " + this.$store.state.userdata.client_last}}
                    </span>
                    <div id="whoisyou-email"><span>
                      {{this.$store.state.userdata.email}}
                    </span>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div id="user-data" style="display:none;">
                    <input disabled=disabled id="clientfirst" type="text" name="client_first" v-bind:value="this.$store.state.userdata.client_first" required>
                    <input disabled=disabled id="clientlast" type="text" name="client_last" v-bind:value="this.$store.state.userdata.client_last" required>
                    <input disabled=disabled id="clientemail" type="email" name="email" v-bind:value="this.$store.state.userdata.email" required>
                    </div>
                    <div id="logout" style="margin-top:10px;margin-bottom: 13px;">
                      <a class="opcion-alt" style="cursor:pointer;" v-on:click="logout()" >No soy yo.</a>
                    </div>
                    </div>


                    <transition name="fade" mode="out-in">
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
            <div class="linea lineacont">
            <div class="seleccion">3</div>
            </div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[3] }}</h1>
                </div>
            <div id="resultados">
               
                <div v-if="showing" class="deal-info">
                    
<p> <i style="font-size: 1.5em;color: #7fbf4e;margin-right: 10px;" class="fas fa-check-circle"></i> Oi, {{this.$store.state.userdata.client_first + " " + this.$store.state.userdata.client_last}}!.</p>

                      <div id = "qr">

                      </div>
                      <p>Aqui está o seu código:</p>
                       <!-- <span style="display:none;">{{stepactual}}</span> -->
                       <p class="codigo-final" id="transqr">{{this.transqr}}</p>
                        <p>Pronto, seu código será enviado por <strong>Email</strong> também, mostre este código ao fazer sua compra em <strong>{{this.deal.buss_name}}</strong> </p>
                   
                </div>
            </div>
                </div>
          </div>
  
</div>
</transition>


<transition name="slide">
<div v-if="stepactual == 4" class="steps" id="steplogin">

        <div class="content-step">
          <div class="content-row row-linea">
            <div class="linea lineacont">
            <div class="seleccion">!</div>
            </div>
          </div>
                    <div class="content-row row-centered">
                <div class="title-step">
                  <h1>{{ steps.step[4] }}</h1>
                </div>
            <div id="resultados">

                <div v-if="showing" class="deal-info">
                    <p>
                       <strong>Bienvenido de nuevo, {{$store.state.userdata.client_first}}!</strong>
                    </p>
                </div>
                <div id="pwd-form-container">
                  <form @submit.prevent="formSubmit" id="pwd-form">

                    <div v-if="hasPass == true" class="group-input" style="margin: auto;">
                      <input  class="input-material" id="clientpwd" type="password" name="password" required v-model="password" style="width:285px;">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="label-material">Password</label>
                    </div>

                    <div>
                      <p style="margin-top: 0px;">
                        Oops, aun <strong>no tienes contraseña</strong>, {{$store.state.userdata.client_first}}. Ve a <strong><a style="color: var(--red);" href="/login">Login</a></strong> y crea tu contraseña.
                      </p>
                    </div>
                  
                    <transition name="fade" mode="out-in">
                      <div v-if="hasPass == true">
                    <p style="top:44px;" class="alert alert-danger" v-if = hasError>{{responseContent}}</p>
                    <p style="top:44px;" class="alert alert-normal" v-if = hasResponse>{{responseContent}}</p>
                      </div>
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
<transition name="fade" >
<div id="loading-overlay" v-if="loadingMss" >
        <spinner-small ></spinner-small>
</div>
</transition>

<div class="modal-footer">
<transition name="fade" >
 <a v-if="botoncontinuar" id="continue-btn" v-on:click="passToInsert"  class="button footer-btn">Continuar</a>
<button v-if="botonsubmit" id="continue-btn" v-bind:form="this.formselected" class="button footer-btn">Pedir</button>
<a v-if="botonterminar" id="terminar-btn" class="button footer-btn" v-on:click="stepactual = 1, hasError = false, hasResponse = false">Terminar</a>
</transition>
</div>


</div> 
</template>

<style>
#qr{
    position: absolute;
    width: 80px;
    height: 80px;
    top: 14px;
    background-color: #ababab;
    right: 23px;
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

#resultados{
    height: 100%;
    max-height: 300px;
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


.modal, #modalwindow, #modal-content{

transition: all .5s ease-in-out;

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
.lineacont > .seleccion{
 top: 70px;
}
.lineacont > .opciones{
 bottom: 186px;
}

.seleccion{
    position: absolute;
    width: 30px;
    height: 30px;
    right: -17px;
    top: -9px;
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
    bottom: 165px;
    right: -17px;
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


#step1, #step2, #step3, #steplogin{
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
    position: relative;
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
  props: ["descuento", "postdata", "userdata", "buylimits"],
  data(){
        return{
            deal:{},
            activelimits:0,
            spinnersize:48,
            next: 2,
            loged:false,
            stepactual:1,
            loading: false,
            loadingMss: false,
            showing:true,
            botoncontinuar:true,
            botonsubmit:false,
            botonterminar:false,
            responseMss: "success",
            responseContent: "",
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
            hasPass:false,
            password:'',
            newUser:{'client_first':'', 'client_last':'', 'email':''},
            formselected:"insert-form",
            transqr: "0000000",
            
                    
        }
  },
  mounted(){
  this.$store.state.userdata = JSON.parse(this.userdata);
  
  this.deal = JSON.parse(this.postdata);
  const buylimit = JSON.parse(this.buylimits);
  if(buylimit.length >= 1){
    var limit_count = parseInt(buylimit[0].limit_count);
    var date_limit = parseInt((new Date(buylimit[0].created_at).getTime() / 1000).toFixed(0));
    var now = Math.round(Date.now() / 1000)
    if((date_limit + 86400) > now){
      this.activelimits = limit_count;
    }else{
       this.activelimits = 0;
    }
  }else{
    this.activelimits = 0;

  }

      if(this.$store.state.userdata.email != ""){
        this.steps.step[2] = "Confirme";
        this.loged = true;
      }
      if(this.$store.state.userdata.client_last == null){
        this.$store.state.userdata.client_last = " ";
      }


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
      var modal = document.getElementById('modal-content');
      this.next = this.stepactual+1 
      this.steps.Next = this.steps.step[this.next];
      if(this.stepactual == 1){
        this.botoncontinuar = true;
        this.botonsubmit = false;
        this.botonterminar = false;
      }
      if(this.stepactual == 2 || this.stepactual == 4){
        
        if(this.stepactual == 2){
          this.formselected = "insert-form";
        }else if (this.stepactual == 4){
          this.formselected = "pwd-form";
          modal.removeAttribute("style");
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

      if(this.$store.state.userdata.client_last == null){
        this.$store.state.userdata.client_last = " ";
      }
     // Modifica tamaño de la ventana si es step2
      if(this.stepactual == 2 && this.loged == false){
          modal.style.minHeight = '580px';
      }else{
          modal.removeAttribute("style");
      }

// Switcher de Spinner
      if(this.responseMss == 'success'){
        //this.showing = true;
        this.loading = false;
      }else if(this.responseMss == 'error'){
        //this.showing = false;
        this.loading = false;
      }else if(this.responseMss != 'success' && this.responseMss != 'error' && this.responseMss != 'successNoSession'){
        this.loading = true;
      }else if(this.hasError == true){
        //this.showing = false;
        this.loading = false;
      }

  },
  
  computed:{

    stepactuallimit : function (){
      return this.stepactual;
    },

    activelimitsbool: function(){
      if (this.activelimits >= this.deal.buss_limits){
          return false;
      }
      return true;
    }

  },
  methods:{

    refreshCsrfToken(){
      const URL = "/refreshCsrfToken";
      return axios(URL, {
        method: 'GET',
        headers: {'content-type': 'application/json'}
        }
      )
    },


    passToNext: function(){
      this.stepactual += 1;
    },

    passToInsert: function(){
      this.stepactual = 2;
      //function selectname(){
      // var inputfirst = document.getElementById('clientfirst');
      // inputfirst.focus();
      // inputfirst.select();
      // }
      // setTimeout(selectname, 1000);
    },


    passToPWD: function(){
      this.stepactual = 4;
      // function selectPwd(){
      //   var inputpwd = document.getElementById('clientpwd');
      //   inputpwd.focus();
      //   inputpwd.select();
      // }
      // setTimeout(selectPwd, 1000);
    },

    passToCupon: function(newUser = false){
      if(newUser){
        this.hasResponse = false;
        this.loadingMss = true;

        this.newUserRegister().then(response => {
          if(response.data.response == 'success'){
          //console.log(response);
            this.password = "secret";
            this.hasError = false;
            this.loadingMss = false;
            this.hasResponse = true;
            this.responseContent = response.data.responseContent;
            this.$store.state.userdata.client_id = response.data.client_id;
            axios.post('/login',{
              email: this.$store.state.userdata.email,
              password: this.password,
            }) 
            .then((response) => {
              this.password = "";
              if(response.status == 200){
                this.hasError = false;
                this.responseMss = "success";
                var response = response.data;
                this.responseContent = "Token Listo";
                this.insertTransaction();
              }else{
                this.hasError = true;
                this.responseContent = "No fue posible iniciar tu cuenta";
              }

            })
            .catch((error) => {
              this.password = "";
              this.responseMss = "error";
              this.hasError = true;
              if (error.response.status == 422){
                this.responseContent = "Contrasena Incorrecta";
              }
              else if(error.response.data.error == "invalid_request"){
                this.responseContent = "Hubo un problema en la respuesta";
              }
              else if (error.response.state == 419){
                this.responseContent = "Reload Page";
              }

              else{
                this.responseContent = error.response.data.message;
              }
            })
          }
          else if(response.data.response == 'error'){
            this.hasError = true;
          }
        })
        .catch((error) => {
          console.log(error);
          this.loadingMss = false;
          this.hasError = true;
          this.hasResponse = true;
          this.responseContent = error;
        })
      }else{
        this.insertTransaction();
      }
    },

    logout:function logout(){
      this.loadingMss = true;
      this.hasResponse = false;
      this.hasError = false;
      axios.post('/logout')
        .then((response) => {
          this.refreshCsrfToken().then(response => {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrfToken;
            this.loadingMss = false;
            this.hasResponse = true;
            this.responseContent = "Sesion cerrada";
            this.loged = false;
            this.$store.state.userdata = {'client_id':'', 'email':'', 'client_first':'', 'client_last':''};
            this.resume = false;
            this.activelimits = 0;
            this.steps.step[2] = "Ingrese su nombre"

            // function selectname(){
            //   var inputfirst = document.getElementById('clientfirst');
            //   inputfirst.focus();
            //   inputfirst.select();
            // }
            // setTimeout(selectname, 700);
          })
          .catch((error) => {
            console.log(error);
          })
        })
        .catch((error) => {
          this.loadingMss = false;
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = error;
        })
    },
    newUserRegister(){
      const URL = "/registerStateless";
      this.$store.state.userdata
      var input = this.$store.state.userdata;
      return axios.post(URL, input)
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

      if(input['client_first'] == '' || input['email'] == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
           this.loadingMss = false;
      }
      else if(!this.activelimitsbool){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Você pediu muitos cupons do mesmo lugar, tente outro dia.";
          this.loadingMss = false;
          this.resume = false;
      }
      
      else{
      // this.refreshCsrfToken().then(response => {
      //   window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrfToken;
        
        this.hasError = false;
        axios.post('/checkuser', input) 
        .then((response) => {
          this.hasResponse = true;
          this.loadingMss = false;
          this.newUser = {};
          if(response.data.response == 'error'){
            this.loged = false;
            this.hasError = true;
            this.responseMss = "error";
            this.responseContent = response.data.responseContent;
            this.loading = false;

          }else if(response.data.response == 'successNotExists'){
            this.loged = true;
            this.hasError = false;
            this.responseMss = "successNotExists";
            this.responseContent = response.data.responseContent;
            this.loading = false;

            this.$store.state.userdata = response.data;

            console.log(this.$store.state.userdata);
            this.passToCupon(true);

          }else if(response.data.response == 'success'){
            this.loged = true;
            this.hasError = false;
            this.responseMss = "success";
            this.responseContent = response.data.responseContent;
            this.loading = false;

            this.$store.state.userdata = response.data;

            //console.log(this.$store.state.userdata);
            this.passToCupon();

          }else if(response.data.response == 'successNoSession'){
            this.loged = true;
            this.hasError = false;
            this.responseMss = "successNoSession";
            this.responseContent = response.data.responseContent;
            this.loading = false;
            
            this.$store.state.userdata = response.data;

            if(this.$store.state.userdata.hasPass === false){
              this.hasPass = false;
            }else if(this.$store.state.userdata.hasPass === true){
              this.hasPass = true;
            }

            this.formselected = "pwd-form";
            this.resume = true;
            //this.showing = true; // Muestra el nombre encima
            this.passToPWD();
            //console.log(this.$store.state.userdata);
          }

       // })
        
        })
        .catch((error) => {
          this.hasError = true;
          if(error.response.data.errors.email != ""){
            this.responseContent = "Tiene que introducir un Email válido";
            var inputemail = document.getElementById('clientemail');
            inputemail.className += " invalid-data"
            inputemail.focus();
            inputemail.select();
            console.log(error);

          }
          else if (error.response.state == 419){
            this.responseContent = "Reload Page";
            var inputemail = document.getElementById('clientemail');
            inputemail.className += " invalid-data"
            inputemail.focus();
            inputemail.select();
            //console.log(error);

           }
  

          else{
            this.responseContent = error.response.data.message;
          }
          this.loadingMss = false;
        })



      }

    } 
    },

    formPwdSubmit: function formPwdSubmit(){
      //El resto de los datos ya estan en memoria en userdata.
      this.loadingMss = true;
      this.hasResponse = false;
      this.responseMss = "";
      var input = {'client_first':this.$store.state.userdata.client_first, 'client_last':this.$store.state.userdata.client_last, 'email':this.$store.state.userdata.email, 'password': this.password};

      if(input['client_first'] == '' || input['client_last'] == '' || input['email'] == '' || input['password'] == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseMss = "error";
          this.responseContent = "Llene todos los campos";
          this.loadingMss = false;
      }else if(this.password.length < 8){
          this.hasError = true;
          this.hasResponse = false; 
          this.responseMss = "error";
          this.responseContent = "La contraseña tiene que ser mayor a 8 caracteres";
          this.loadingMss = false;

          this.password = "";
          var inputpwd = document.getElementById('clientpwd');
          inputpwd.className += " invalid-data";
      }else{
        this.hasError = false;
        axios.post('/login',{
          email: this.$store.state.userdata.email,
          password: this.password,
        }) 
        .then((response) => {
          this.password = "";
          this.hasResponse = true;
          this.loadingMss = false;
          this.newUser = {};
          if(response.status == 200){
            this.hasError = false;
            this.responseMss = "success";
            var response = response.data;
            this.responseContent = "Token Listo";
           if(this.$store.state.userdata.email != ""){
              this.steps.step[2] = "Confirme"
              this.resume = false;
              this.loged = true;
            }
            this.passToCupon();
          }
        })
        .catch((error) => {
          this.password = "";
          this.responseMss = "error";
          this.hasError = true;
          if (error.response.status == 422){
            this.responseContent = "Contrasena Incorrecta";
            var inputpwd = document.getElementById('clientpwd');
            inputpwd.focus();
            inputpwd.select();
            inputpwd.className += " invalid-data"
          }
          else if(error.response.data.error == "invalid_request"){
            this.responseContent = "Hubo un problema en la respuesta";
          }

          else if (error.response.state == 419){
            this.responseContent = "Reload Page";
            var inputemail = document.getElementById('clientemail');
            inputemail.className += " invalid-data"
            inputemail.focus();
            inputemail.select();
            //console.log(error);

           }

          else{
            this.responseMss = "error";
            this.responseContent = error.response.data.message;
          }
          this.loadingMss = false;
        })
      }
    },

    insertTransaction: function insertTransaction(){
        this.loadingMss = true;
        this.hasResponse = false;

        this.refreshCsrfToken().then(response => {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrfToken;

          axios.post('/api/v1/inserttrans',
          {
            post_id: this.deal.post_id,
            client_id: this.$store.state.userdata.client_id,
            buss_id: this.deal.buss_id,
            app_id: process.env.MIX_APP_ID,
          }) 
          .then((response) => {
            this.hasResponse = true;
            this.hasError = false;
            this.loadingMss = false;
          
            if(response.data.response == "success"){
              //this.showing = true;
              this.stepactual = 3;
              this.responseMss = "success";
              this.responseContent = "TransQR returned";
              this.activelimits++;
              this.transqr = response.data.data.transqr;
              this.enviaremail();
            }
            else if(response.data.response == "error"){
              this.hasResponse = false;
              this.hasError = true;
              
              this.responseMss = "error";
              this.responseContent = response.data.data.message;
            }
          })
          .catch((error) =>{
            this.hasResponse = false;
            this.hasError = true;
            this.responseContent = error;
            this.loadingMss = false;
            console.log(error);
          })
        })
      .catch( error => {
          /** handle error **/
          console.log(error);
      });
 
    },

     enviaremail: function enviaremail(){
      
       
       axios.post('/enviaremail', {
             name: this.$store.state.userdata.client_first,
             last: this.$store.state.userdata.client_last,
             transqr: this.transqr,
             post_buss_name : this.deal.buss_name,
             post_title: this.deal.title,
             post_desc: this.deal.description,
             post_buss_dir: this.deal.buss_dir,
             email: this.$store.state.userdata.email
       })
        .then((response) => {
             //currentObj.output = response.data;
             if(response.data.response == "success"){
               this.responseMss = "success";
               this.responseContent = "Email Enviado";
               custom.toast('Listo!', 'Email Enviado', 4000);

             }
             else if(response.data.response == "error"){
                this.responseMss = "error";
                this.responseContent = "Error al enviar Email";
                custom.toast('Error', 'Error al enviar Email', 4000);
                
             }
       })
        .catch((error) =>{
             //currentObj.output = error;
             this.responseMss = "error";
             this.responseContent = error;
       });
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
