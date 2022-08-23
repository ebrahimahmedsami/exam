import { createStore } from 'vuex'
const authStore = createStore({
    state () {
        return {
            token : localStorage.getItem('token') || 0
        }
    },
    getters:{
        // GET_TOKEN(state,payload){
        //     state.token = payload
        // }
    },
    mutations: {
        UPDATE_TOKEN(state){
            return state.token
        }
    },
    actions:{
        set_token(context,payload){
            localStorage.setItem('token',payload)
            localStorage.setItem('authenticated','true')
            context.commit('UPDATE_TOKEN',payload)
        }
    },
})

export default authStore;
