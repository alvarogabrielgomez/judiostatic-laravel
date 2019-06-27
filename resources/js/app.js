
window.Vuex = require('vuex');
window.Vue = require('vue');
window.axios = require('axios');
import {store} from './store/store'

window.Laravel = {
    csrfToken: document.head.querySelector("meta[name='csrf-token']").getAttribute('content')
}
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With' : 'XMLHttpRequest',
    'Accept': 'application/json',
    'Content-Type':'application/json'
}




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('dealsubmit-component', require('./components/modalwindow/DealSubmitComponent.vue').default);
Vue.component('Spinner', require('./components/Spinner.vue').default);
Vue.component('spinner-small', require('./components/Spinner-small.vue').default);
Vue.component('carousel-component', require('./components/carousel/CarouselComponent.vue').default);
Vue.component('login-form-component', require('./components/auth/LoginFormComponent.vue').default);
Vue.component('clock-sm', require('./components/commons/Clock-sm.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




const app = new Vue({
    el: '#app',
    store: store,
});


