<template>
  <div class="carousel-container">
    <spinner v-show="loading"></spinner>
<transition name="fade" mode="out-in">
<div id="empty-state-container" v-show="empty">

<div id="empty-state-message">
<div id="empty-state-message-img">
</div>
<span><h1>Oh, oh!. </h1><br>
Aparentemente não há nada para mostrar aqui, e se você tentar depois? ;)
</span>

</div>

</div>
</transition>
<transition name="fade" mode="out-in">
    <div class="carousel" v-if="showing" >
      <a v-bind:href="'deals/'+post.post_id" class="main-box" v-for="post in posts" ref="card" v-bind:key="post.post_id">
        <div class="main-img">
          <img v-bind:src="post.post_hero_img_url" alt>
        </div>
        <div class="buss-name">
          <span>{{post.buss_name}}</span>
        </div>

         <clock-sm ref="badge" style="float: right;margin-top: -30px;margin-bottom: -8px;" v-bind:post_created_at = post.created_at v-bind:post_offer_end_at = post.offer_end_at realtime = "false"></clock-sm>
        
        <div class="badge">
          <span>OFERTA DESTA SEMANA</span>
        </div>
        <div class="box-title">
          <span>{{post.title}}</span>
        </div>
        <div class="price-box">
          <div class="price-new">
            <abbr title="BRL">R$</abbr>
            <span>{{post.price_from}}</span>
          </div>
          <div class="price-from">
            <abbr title="BRL">R$</abbr>
            <span>{{post.price_new}}</span>
          </div>
        </div>
        <p class="main-box-desc">{{post.description}}</p>
      </a>
    </div>
</transition>
  </div>
</template>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .7s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>


<script>
function createSlick() {
  $(".carousel")
    .not(".slick-initialized")
    .slick({
      dots: true,
      infinite: true,
      variableWidth: true,
      dragable: true,
      mobileFirst: true,
      autoplay: false,
      accessibility: true,
      pauseOnFocus: true,
      pauseOnHover: false,
      arrows: false,
      centerMode: true,

      responsive: [
        {
          breakpoint: 800,
          settings: {
            arrows: true,
            centerMode: false
          }
        }
      ]
    });
}
function cargado(){

  $("#onload-carousel").css("background","rgba(255,255,255,0.01)");
    
}
export default {
  name:'carousel',
  data() {
    return {
      posts: [],
      loading: true,
      showing:false,
      empty:false,
      response: "",
      clock:0,
      badge:true,
    };
  },

  mounted() {

      axios
        .get("/carousel")
        .then(res => {
          this.posts = res.data.data;
          this.loading = false;
          this.response = res.data.response
          this.empty = false;
        })
        .catch(err => {
          console.log(err);
        });
      return this.posts;



  },
  updated(){
    if(this.response == 'success'){
      createSlick();
      cargado();
      this.showing = true;
    }else if(this.response == 'error'){
      this.showing = false;
      this.empty = true;
      cargado();
    }

  }
};
</script>
