<template>
  <div id="login-form">


    <div id="pwd-form-container" class="admin-login" style="padding: 20px; position:relative;  transition: 0.7s;">
        
                        <div style="width: 95%;" class="shadow-light boxedtoast"  id="toastlogin">
                        <div class="toastprogressbar"></div>
                        <div class="title">Title</div>
                        <div class="content">Lorem ipsum dolor sit amet</div>
                        </div>

        <transition name="fade">
        <div id="loading-overlay" v-if="loadingMss" >
        <spinner-small ></spinner-small>
        </div>
         </transition>
        <div class="light-bar-t" id="nav-bar" style="position: absolute;top: 11px;margin-top:0px!important;z-index: 1000;">
          <div id="nav-bar-container">
            <nav>
              <ul class="light-bar-text">
                <li>
                  <a href="/">
                    <div id="home-icon"></div>
                  </a>
                </li>
                <li class="navbar-divisor">></li>
                <li>Iniciar Sesion</li>
              </ul>
            </nav>
          </div>
        </div>
      <transition name="slide-horizontal">
    <div v-if="stepactual == 1" class="stepslogin" id="step1">
      <div class="nav-login">

        <div id="logo-form">
          <div class="trans-black-logo-form"></div>
      <!-- <h1 class="title-login-center">Inicia sesion</h1> -->
        </div>
        <form id="emailform" action="#" @submit.prevent="formSubmit">
          <div class="group-input group-centrado">
            <input class="input-material" id="clientmail" type="email" name="email" required v-model="username" style="width:285px;">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label class="label-material">Email</label>
          </div>
          <div class="group-input" style="margin:13px auto 0px;;width: 85%;">          
            <a class="opcion-alt" href="/register">Crear una nueva cuenta</a>
            <a class="opcion-alt" href="iforgot/reset-password.php">Olvide el password</a>
            <span><i class="fab fa-google google-icon"></i><a v-on:click="loadingShow" class="opcion-alt" href="/login/google" style="display:inline-block;">Login with Google</a></span>
          </div>

        </form>
      </div>


                    
      </div>
      </transition>


      <transition name="slide-horizontal">
    <div v-if="stepactual == 2" class="stepslogin" id="step2">
      <div class="nav-login">
        <div id="logo-form">
          <div class="trans-black-logo-form"></div>
     <h1 class="title-login-center">Bienvenido de nuevo, {{this.$store.state.userdata.client_first}}</h1>
        </div>
        <form id="pwdform" action="#" @submit.prevent="login">
          <div class="group-input group-centrado">
                      <input class="input-material" id="clientpwd" type="password" name="password" required v-model="password" style="width:285px;">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="label-material">Password</label>
          </div>
          <div class="group-input" style="margin:13px auto 0px;width: 85%;">          
            <a class="opcion-alt" href="iforgot/reset-password.php">Olvide el password</a>
            <a class="opcion-alt" style="cursor:pointer;" v-on:click="stepactual = 1" >Volver</a>
      
          </div>

        </form>
      </div>
           

      </div>
      </transition>




      <transition name="slide-horizontal">
    <div v-if="stepactual == 3" class="stepslogin" id="step3">
      <div class="nav-login">
        <div id="logo-form">
          <div class="trans-black-logo-form"></div>
     <h1 class="title-login-center">Solo falta crear tu contraseña y todo estará listo, {{this.$store.state.userdata.client_first}}</h1>
        </div>
        <form style ="margin:0;" id="new-pwd-form" action="#" @submit.prevent="submitPwd">
          <div class="group-input group-centrado">
          <p style="padding: 0px 22px;">	Enviaremos un Email para que puedas crear tu nueva contraseña.</p>
          </div>

          <!-- <div class="group-input" style="margin:13px auto 0px;width: 85%;">          
            <a class="opcion-alt" style="cursor:pointer;" v-on:click="stepactual = 1" >Volver</a>
          </div> -->

        </form>
      </div>

      </div>
      </transition>


    <transition name="slide-horizontal">
        <button v-if="botoncontinuar" form="emailform" type="submit" class="button red login-submit" name="login-submit">Siguiente</button>
        <button v-if="botonsubmit" form="pwdform" type="submit" class="button red login-submit" name="login-submit">Login</button>
        <button v-if="botonPwd" form="new-pwd-form" type="submit" class="button red login-submit" name="login-submit">Crear Contraseña</button>
    </transition>
    </div>
  </div>
</template>

<style>


.slide-horizontal-leave-active,
.slide-horizontal-enter-active {
  transition: 0.7s;
}

.slide-horizontal-enter {
  transform: translate(100%, 0);
}
.slide-horizontal-leave-to {
  transform: translate(-100%, 0);
}

.nav-login {
  position: relative;
  display: flex;
  flex-direction: row;
  flex-flow: wrap;
  align-content: center;
  height: 420px;
}
.nav-login a {
  width: 100%;
  margin-top: 9px;
}
.nav-login form {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
    margin: 28px 0px 10px 0px;
}
</style>

<script>
export default {
name:'login',
data(){
    return{
        stepactual:1,
        next: 2,
        loading: false,
        loadingMss: false,
        botoncontinuar:true,
        botonsubmit:false,
        botonPwd:false,
        responseMss: "success",
        responseContent: "",
        username:'',
        password:'',
        steps: { "step":{
          "1":"Ingrese email", 
          "2":"Ingrese password", 
          "3":"Nueva Pwd"
          },
          "Next":
          "Next Step"
        },
        hasError:false,
        hasResponse:false,
        formselected:"emailform",
        hasPass:false
    }
},
mounted(){
const form = document.getElementById(this.formselected);
const emailInput  = form.querySelector('input[name=email]');
const pwdformContainer = document.getElementById('pwd-form-container');
pwdformContainer.style.height = "420px";
function selectEmail(){
  var clientmail = document.getElementById('clientmail');
  clientmail.focus();
  clientmail.select();
}
setTimeout(selectEmail, 300);

},
updated(){
// Swicher de Boton y demas

      this.next = this.stepactual+1 
      this.steps.Next = this.steps.step[this.next];
      const pwdformContainer = document.getElementById('pwd-form-container');
      if(this.stepactual == 1){
        pwdformContainer.style.height = "420px";          
        this.formselected = "emailform";
        this.botoncontinuar = true;
        this.botonsubmit = false;
        this.botonPwd = false;
      }else if(this.stepactual == 2){
        pwdformContainer.style.height = "400px";
        this.formselected = "pwdform";
        this.botoncontinuar = false;
        this.botonsubmit = true;
        this.botonPwd = false;
      }else if(this.stepactual == 3){
        this.formselected = "new-pwd-form";
        this.botoncontinuar = false;
        this.botonsubmit = false;
        this.botonPwd = true;
        pwdformContainer.style.height = "341px";  
      }
// Switcher de Spinner
      if(this.responseMss == 'success'){
        this.showing = true;
        this.loading = false;
      }else if(this.responseMss == 'successNotExists'){
        this.showing = false;
        this.loading = false;
      }else if(this.responseMss == 'error'){
        this.showing = false;
        this.loading = false;
      }else if(this.responseMss != 'success' && this.responseMss != 'error' && this.responseMss != 'successNotExists'){
        this.loading = true;
      }

},
methods:{
  login(){
    this.loadingMss = true;
    this.hasError = false;
    this.hasResponse = false;
    var clientpwd = document.getElementById('clientpwd');
    if(this.password == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
          this.loadingMss = false;
          clientpwd.className += " invalid-data";
          custom.boxmsg('Llene todos los campos', 2500, toastlogin);
    }else if(this.password.length < 8){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "La contraseña tiene que ser mayor a 8 caracteres";
          this.loadingMss = false;
          clientpwd.className += " invalid-data";
          custom.boxmsg('Es muy corto para ser una contraseña', 2700, toastlogin);
    }
    else{
    axios.post('/login',{
      email:this.$store.state.userdata.email,
      password:this.password,
    })
    .then((response) => {
      console.log(response);
      if(response.status == 200){
        this.hasResponse = true;
        this.hasError = false;
        this.loadingMss = true;
        this.responseContent = "Logued";
        window.location.href = '/home';
      }
    })
    .catch((error) => {
      var clientpwd = document.getElementById('clientpwd');
      clientpwd.className += " invalid-data";
      clientpwd.focus();
      clientpwd.select();
      console.log(error.response);
      this.hasError = true;
      this.loadingMss = false;

      if(error.response.status == 422){
        this.responseContent = "Contrasena Incorrecta";
        custom.boxmsg('Contrasena Incorrecta', 2500, toastlogin);
      }
      else if(error.response.status == 429){
        this.responseContent = "Has hecho muchos intentos seguidos en poco tiempo";
        custom.boxmsg('Oye, tranquilo viejo, has hecho muchos intentos seguidos', 60000, toastlogin);
      }
    })
  }
  },

  loadingShow: function loadingShow(){
      this.loading = true;
      this.loadingMss = true;
      this.hasResponse = false;  
  },

  formSubmit: function formSubmit(){
      this.loadingMss = true;
      this.hasResponse = false;
      this.loading = true;
      if(this.username == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
          custom.boxmsg('Llene todos los campos', 2500, toastlogin);
          this.loadingMss = false;
      }else{
        this.$store.state.userdata.email = this.username;
        this.hasError = false;
        var input = {'email':this.$store.state.userdata.email}
        axios.post('api/checkuser', input)
        .then((response) => {
          this.hasResponse = true;
          this.loadingMss = false;
          if(response.data.response == 'successNotExists'){
            this.hasError = true;
            this.responseMss = "successNotExists";
            this.responseContent = response.data.responseContent;
            this.loading = false;
            var clientmail = document.getElementById('clientmail');
            clientmail.className += " invalid-data";
            custom.boxtoast('Email no existe', "El email no esta registrado, <a href='/register' style='font-weight:800;color:var(--red);'>seguro que has venido por aca antes?</a>", 5500, toastlogin);
      
          }else if(response.data.response == 'successNoSession'){
            this.formselected = "pwd-form";
            this.hasError = false;
            this.responseMss = "success";
            this.loading = false;
            this.resume = true;
            this.showing = true;
            this.$store.state.userdata = response.data;
            this.responseContent = response.data.responseContent;

            if(this.$store.state.userdata.hasPass === false){
              this.hasPass = false;
            }else if(this.$store.state.userdata.hasPass === true){
              this.hasPass = true;
            }

            if(this.hasPass){
              this.passToNext();
              function selectpwd(){
                var inputpwd = document.getElementById('clientpwd');
              inputpwd.focus();
              inputpwd.select();
              }
              setTimeout(selectpwd, 1000);
            }else{
              this.passToNext(3);
            }

          }
        })
          .catch((error) => {
          this.hasError = true;
          var clientmail = document.getElementById('clientmail');
          clientmail.className += " invalid-data";
          if (error.response.data.error == "invalid_credentials"){
            this.responseContent = "Contrasena Incorrecta";
            custom.boxmsg('Contrasena Incorrecta', 2500, toastlogin);
          }
          else if(error.response.data.error == "invalid_request"){
            this.responseContent = "Hubo un problema en la respuesta";
            custom.boxmsg('Hubo un problema en la respuesta', 2500, toastlogin);
          }
          else{
            this.responseContent = error.response.data.message;
            custom.boxtoast('Error', this.responseContent, 2500, toastlogin);
          }
          this.loadingMss = false;
        })
      }

  },
  submitPwd: function submitPwd(){
    this.loadingMss = true;
    this.hasResponse = false;
    this.loading = true;
    var input = {'email':this.$store.state.userdata.email}
    
    axios.post('/newPwd', input)
      .then((response) => {
        if(response.data.response == 'success'){
          this.hasError = false;
          this.loadingMss = false;
          this.responseMss = "success";
          this.loading = false;
          this.resume = true;
          this.showing = true;
          this.responseContent = response.data.responseContent;
          this.passToNext(1);
          custom.boxmsg(this.responseContent, 3700, toastlogin);
        }
      })
      .catch((error) => {
        this.hasError = true;
        this.loadingMss = false;
        this.responseMss = "error";
        this.resume = false;
        this.loading = false;
      })
  },

  passToNext: function(step = 0){
    if(step === 0){
      this.stepactual += 1;
    }else{
      this.stepactual = step;
    }
  },
}
};
</script>


