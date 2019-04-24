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
.loader-small,
.loader-small:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
.loader-small-container{
    display: flex;
    padding-top: 0;
    height: 100%;
}
.loader-small {
  margin: auto;
  font-size: 4px;
  position: relative;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(15,23,43, 0.2);
  border-right: 1.1em solid rgba(15,23,43, 0.2);
  border-bottom: 1.1em solid rgba(15,23,43, 0.2);
  border-left: 1.1em solid #0f172b;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
