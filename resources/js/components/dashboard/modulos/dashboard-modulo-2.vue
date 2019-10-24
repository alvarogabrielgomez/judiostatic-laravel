<template>
    <div class="content-modulo">
      Test 2
  </div>
</template>

<script>
export default {
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