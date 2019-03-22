<template>
  <div class="row">
      <spinner v-show="loading"></spinner>      
    <div id ="pokemons-box" class="col-sm" v-for="pokemon in pokemons" :key = pokemon.id>
      <div class="card text-center" style="width: 18rem; margin-top:70px ">
        <img
          style="background-color:#efefef;border-radius:50%; height:120px; width:120px; margin: 10px auto;"
          class="card-img-top"
          src="/images/"
          alt="Card image cap"
        >
        <div class="card-body">
          <h5 class="card-title"></h5>

          <p class="card-text"></p>
          <a href="/trainers/" class="btn btn-primary">Ver mas..</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            pokemons:[],
            loading: true
        }
    },
    mounted(){
         axios
            .get('/pokemons')
            .then((res) => {
                this.pokemons = res.data
                this.loading = false
            })
        
        console.log("Monted");
    }
}
</script>
