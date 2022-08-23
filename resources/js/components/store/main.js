import { createStore } from 'vuex'
import auth from './auth'
const store = createStore({
    modules:{
        authModule : auth
    }
})

export default store;
