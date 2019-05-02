<template>
  <div id="login-form">


    <div id="pwd-form-container" class="admin-login" style="padding: 20px; position:relative;  transition: 0.7s;">
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
          <div class="group" style="margin: auto;">
            <input id="clientmail" type="email" name="email" required v-model="username">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          </div>
          <div class="group" style="margin:13px auto 0px;;width: 81%;">          
            <a class="opcion-alt" href="iforgot/reset-password.php">Crear una nueva cuenta</a>
            <a class="opcion-alt" href="iforgot/reset-password.php">Olvide el password</a>
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
          <div class="group" style="margin: auto;">
                      <input id="clientpwd" type="password" name="password" required v-model="password">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Password</label>
          </div>
          <div class="group" style="margin:13px auto 0px;;width: 81%;">          
            <a class="opcion-alt" href="iforgot/reset-password.php">Olvide el password</a>
            <a class="opcion-alt" style="cursor:pointer;" v-on:click="stepactual = 1" >Volver</a>
      
          </div>

        </form>
      </div>
           

      </div>
      </transition>




        <button v-if="botoncontinuar" form="emailform" type="submit" class="button red login-submit" name="login-submit">Siguiente</button>
        <button v-if="botonsubmit" form="pwdform" type="submit" class="button red login-submit" name="login-submit">Login</button>
    </div>
  </div>
</template>

<style>



.stepslogin{
      position: absolute;
    width: 100%;
    height: 100%;
}
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

.title-login-center {
    padding: 1px 27px;
    text-align: center;
    font-size: 0.92em;
    font-weight: 600;
    color: #464646;
    margin-top: 30px!important;
}

#logo-form {
  width: 100%;
}
.trans-black-logo-form {
  width: 91px;
  height: 31px;
  margin: 10px auto 3px;
  background-image: url(/images/omeleth_trans_black.png);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}

.opcion-alt {
  font-size: 12px;
  display: table;
  transform: translate(2px);
  color: #bc2d19;
  width: auto !important;
}

.login-submit {
  position: absolute;
  border-radius: 0px;
  box-shadow: 0px 0px transparent !important;
  bottom: 0px;
  width: 100%;
      z-index: 10000;
}
.admin-login {
  min-width: 377px !important;
  max-width: 1000px !important;
  width: min-content;
  width: moz-min-content;
  padding: 0px !important;
  background-color: #fff;
  margin: 86px auto !important;
  border-radius: 5px !important;
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
        responseMss: "success",
        responseContent: "",
        username:'',
        password:'',
        steps: { "step":{
          "1":"Ingrese email", 
          "2":"Ingrese password", 
          "3":"Registrar"
          },
          "Next":
          "Next Step"
        },
        hasError:false,
        hasResponse:false,
        formselected:"emailform"
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
          this.formselected = "emailform";
          pwdformContainer.style.height = "420px";          
        this.botoncontinuar = true;
        this.botonsubmit = false;
      }else if(this.stepactual == 2){
        pwdformContainer.style.height = "400px";
        this.formselected = "pwdform";
        this.botoncontinuar = false;
        this.botonsubmit = true;
      }
// Switcher de Spinner
      if(this.responseMss == 'success'){
        this.showing = true;
        this.loading = false;
      }else if(this.responseMss == 'error'){
        this.showing = false;
        this.loading = false;
      }else if(this.responseMss != 'success' || this.responseMss != 'error'){
        this.loading = true;
      }

},
methods:{
  login(){
    this.loadingMss = true;
    this.hasError = false;
    this.hasResponse = false;
    if(this.password == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
          this.loadingMss = false;
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
      clientpwd.className = "invalid-data";
      clientpwd.focus();
      clientpwd.select();
      console.log(error.response);
      this.hasError = true;
      this.loadingMss = false;

      if(error.response.status == 422){
        this.responseContent = "Contrasena Incorrecta";
      }
    })
  }
  },

  formSubmit: function formSubmit(){
      this.loadingMss = true;
      this.hasResponse = false;
      this.loading = true;
      if(this.username == ''){
          this.hasError = true;
          this.hasResponse = false;
          this.responseContent = "Llene todos los campos";
          this.loadingMss = false;
      }else{
        this.$store.state.userdata.email = this.username;
        this.hasError = false;
        var input = {'email':this.$store.state.userdata.email}
        axios.post('api/checkuser', input)
        .then((response) => {
          this.hasResponse = true;
          this.loadingMss = false;
          if(response.data.response == 'error'){
            this.hasError = true;
            this.responseMss = "error";
            this.responseContent = response.data.responseContent;
            this.loading = false;
            var clientmail = document.getElementById('clientmail');
            clientmail.className = "invalid-data";

          }else if(response.data.response == 'successNoSession'){
            this.formselected = "pwd-form";
            this.hasError = false;
            this.responseMss = "success";
            this.$store.state.userdata = response.data;
            this.responseContent = response.data.responseContent;
            this.resume = true;
            this.showing = true;
            this.loading = false;
            this.passToNext();
            function selectpwd(){
            var inputpwd = document.getElementById('clientpwd');
            inputpwd.focus();
            inputpwd.select();
            }
            setTimeout(selectpwd, 1000);

          }
        })
          .catch((error) => {
          this.hasError = true;
          var clientmail = document.getElementById('clientmail');
          clientmail.className = "invalid-data";
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

  passToNext: function(){
    this.stepactual += 1;
  },
}
};
</script>


