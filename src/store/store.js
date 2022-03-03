import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);

var store = new Vuex.Store({
    state : {
        isLogged : false,
        cookie : true
    },
    mutations : {
        log_user(state){
            state.isLogged = true;
        },
        isToken(state) {
            if(sessionStorage.getItem('token')){
                state.isLogged = true;
            }
        },
        isCookie(state){
          state.cookie = false
        }
    }
})

export default store;
