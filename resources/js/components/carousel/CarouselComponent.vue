<template>
  <div class="carousel-container">
    <spinner v-show="loading"></spinner>
<transition name="fade" mode="out-in">
    <div class="carousel" v-if="showing" >
      <a href="#" class="main-box" v-for="post in posts" v-bind:key="post.id">
        <div class="main-img">
          <img src alt>
        </div>
        <div class="buss-name">
          <span>{{post.buss_name}}</span>
        </div>
        <div class="badge">
          <span>OFERTA DESTA SEMANA</span>
        </div>
        <div class="box-title">
          <span>{{post.title}}</span>
        </div>
        <div class="price-box">
          <div class="price-new">
            <abbr title="BRL">R$</abbr>
            <span>50</span>
          </div>
          <div class="price-from">
            <abbr title="BRL">R$</abbr>
            <span>100</span>
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
  data() {
    return {
      posts: [],
      loading: true,
      showing:false
    };
  },

  mounted() {
    console.log("Monted");

      axios
        .get("/carousel")
        .then(res => {
          this.posts = res.data;
          this.loading = false;

        })
        .catch(err => {
          console.log(err);
        });
      return this.posts;
  },
  updated(){
    createSlick();
    cargado();
    this.showing = true;
  }
};
</script>
