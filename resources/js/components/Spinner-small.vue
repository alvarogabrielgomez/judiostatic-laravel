<template>
<div class="loader-small-container">
   <div class="loader-small">Loading...</div>
</div>
   
</template>

<script>
export default {
    name: 'spinner-small',
    props: ['size'],
    data(){
      return{
        sizing: this.size+"px"
      };
    },
    mounted(){
    $(".loader-small")[0].style.fontSize = this.sizing+'!important';
    }
}
</script>

<style>

</style>
