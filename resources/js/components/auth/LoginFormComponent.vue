<template>
  <div id="login-form">
    <div id="pwd-form-container" class="admin-login" style="padding: 20spx;">
      <div class="nav-login">
        <div
          class="light-bar-t"
          id="nav-bar"
          style="position: absolute;top: 11px;margin-top:0px!important;"
        >
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
        <div id="logo-form">
          <div class="trans-black-logo-form"></div>
        </div>
        <!-- <h1 class="title-login-center">Inicia sesion</h1> -->
        <form action="#" @submit.prevent="login">
          <div class="group" style="margin: auto;">
            <input id="clientemail" type="email" name="email" required v-model="username">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          <div class="group" style="margin: auto;">
                      <input id="clientpwd" type="password" name="password" required v-model="password">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Password</label>
          </div>
            <a class="opcion-alt" href="iforgot/reset-password.php">Crear una nueva cuenta</a>
            <a class="opcion-alt" href="iforgot/reset-password.php">Olvide el password</a>
          </div>

        </form>

        <button type="submit" class="button red login-submit" name="login-submit">Login</button>
      </div>
    </div>
  </div>
</template>

<style>
.title-login-center {
  margin-bottom: 28px !important;
  padding: 1px 28px;
  text-align: center;
  font-size: 2em;
  margin-top: 8px !important;
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
  height: 390px;
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
  margin: 42px 0px;
}
</style>

<script>
export default {
name:'login',
data(){
    return{
        username:'',
        password:''
    }
},
methods(){

},
};
</script>


