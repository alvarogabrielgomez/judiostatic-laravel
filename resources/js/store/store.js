import Vue from 'vue'  
import Vuex from 'vuex'
import Axios from 'axios';

Vue.use(Vuex)

export const store =  new Vuex.Store({
    getters:{
        retrieveToken(state, token){
            state.token = token
        }
    },
    state:{
        userdata:{},
       // token:null
    },
    actions:{
        retrieveToken(context, credentials){
            axios.post('/login',{
                email:credentials.email,
                password:credentials.password,
            })
            .then(response => {
                const token = response.data.access_token;
               // localStorage.setItem('access_token', token);
                context.commit('retrieveToken', token)
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
})