<template>

  <div class="animated fadeIn carousel-container">
                <spinner v-show="loading"></spinner>   
    <div class="carousel">
  
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
  </div>
</template>

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
$(document).ready(function() {
  createSlick();
});

export default {
  data() {
        return{
            posts:[
             
            ],
            loading: true
        }
  },
  mounted() {
    console.log("Monted");

  },
  created() {
    this.fetchPosts();
  },
  methods: {
    fetchPosts() {
      axios
        .get("/carousel")
        .then(res => {
          this.posts = res.data;
          this.loading = false;
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
