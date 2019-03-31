window.axios = require('axios');

window.Vue = require('vue');

Vue.component('Spinner', require('./components/Spinner.vue').default);
Vue.component('carousel-component', require('./components/carousel/CarouselComponent.vue').default);

const app = new Vue({
    el: '#onload-carousel'
});


