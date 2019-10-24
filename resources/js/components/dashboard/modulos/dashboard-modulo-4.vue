<template>
    <div class="content-modulo">
      Test 4
  </div>
</template>

<script>
export default {
    name:'dashboard-module-4',
    props:{
        configmodule:{
            required: true
        }
    },
    data(){
        return{
            loading: false,
            loadingMss: false,
            responseMss: "success",
            responseContent: "",
            userdata:{},
        }
    },
    mounted(){
       this.userdata = this.$store.state.userdata;
    },
}
</script>

<style>

</style>